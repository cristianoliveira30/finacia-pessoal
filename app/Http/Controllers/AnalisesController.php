<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;
use App\Models\DeepSeekModel;

class AnalisesController extends Controller
{
    public function __construct(private readonly DeepSeekModel $ds) {}

    private const TASKS = [
        'Evolução da Gestão Fiscal (R$ mi)' => "Tarefa: analisar métricas de evolucao de índice no período informado.",
        'Demandas por Secretaria' => "Tarefa: analisar métricas de distribuição de demandas por setor no período informado.",
        'Controle Interno (Conformidade %)' => "Tarefa: analisar pendencias abertas e venciadas por setor no período informado.",
        'Execução Orçamentária (R$ mi)' => "Tarefa: analisar as previsões e realizações por setor no período informado.",
        'Performance Setorial (0-100)' => "Tarefa: analisar o score de cada setor no período informado.",
    ];

    public function analise(Request $request)
    {
        $data = $request->validate([
            'nome' => ['required', 'string'],
            'payload' => ['required', 'array'],
            'comando' => ['nullable', 'string'],
        ]);

        $nome = $data['nome'];

        if (!isset(self::TASKS[$nome])) {
            return response()->json([
                'error' => 'Nome de análise inválido.',
                'permitidos' => array_keys(self::TASKS),
            ], 422);
        }

        return $this->handleGenericAnalysis(
            payload: $data['payload'],
            comando: $data['comando'] ?? 'Analise os dados e gere insights.',
            taskLine: self::TASKS[$nome],
        );
    }

    private function handleGenericAnalysis(array $payload, string $comando, string $taskLine)
    {
        if ($payload === []) {
            return response()->json(['message' => 'dados insuficientes'], 422);
        }

        try {
            $json = json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_THROW_ON_ERROR);

            $system = implode("\n", [
                "Você é um analista de BI.",
                "Responda em português, apenas sobre esse contexto; não invente dados.",
                "Entregue de 3 a 5 insights numerados, com percentuais sempre que possível, e finalize com 1 recomendação prática.",
                $taskLine,
                "Dados JSON fornecidos:",
                $json,
            ]);

            $res = $this->ds
                ->params(['temperature' => 0.5, 'max_tokens' => 1000])
                ->system($system)
                ->user($comando)
                ->send();

            if (isset($res['error'])) {
                $msg = $res['error']['message'] ?? 'Erro ao consultar IA.';
                return response()->json(['error' => $msg], 502);
            }

            $content = $res['choices'][0]['message']['content'] ?? '';
            $content = is_string($content) ? trim($content) : '';

            if ($content === '') {
                return response()->json(['error' => 'Resposta vazia da IA.'], 502);
            }

            $content = $this->stripFences($content);

            // alinhar com o front: devolve "answer"
            return response()->json(['answer' => $content], 200);
        } catch (Throwable $e) {
            Log::error('Falha ao gerar análise IA', [
                'error' => $e->getMessage(),
            ]);

            return response()->json([
                'error' => 'Falha ao gerar análise.',
                'details' => $e->getMessage(),
            ], 500);
        }
    }

    private function stripFences(string $txt): string
    {
        $t = trim($txt);
        if (preg_match('/^```[a-zA-Z0-9]*\s*(.*?)\s*```$/s', $t, $m)) {
            return trim($m[1]);
        }
        return $t;
    }
}
