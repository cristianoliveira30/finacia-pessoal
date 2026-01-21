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

        # Finanças
        'Receitas x Despesas (R$ mi)' => "Tarefa: comparar receitas e despesas por setor no período informado.",
        'Composição de Receita (%)' => "Tarefa: analisar a distribuição percentual das fontes de receita no período informado.",
        'Empenhos / Liquidações / Pagamentos (Comparativo)' => "Tarefa: comparar o fluxo de empenhos, liquidações e pagamentos no período informado.",
        'Execução por Função (Previsto x Realizado)' => "Tarefa: analisar o desempenho de execução orçamentária por função comparando previsto versus realizado.",
        'Compliance (Uso do limite %)' => "Tarefa: analisar o uso percentual dos limites de compliance por setor no período informado.",

        # Educação
        'Frequência Média por Distrito (%)' => "Tarefa: analisar a frequência escolar média por distrito no período informado.",
        'Fluxo de Matrículas (Entradas x Saídas)' => "Tarefa: analisar o fluxo de matrículas com comparação entre entradas e saídas.",
        'Aprendizagem por Etapa (0-10)' => "Tarefa: analisar o desempenho de aprendizagem por etapa educacional no período informado.",
        'Motivos de Evasão (%)' => "Tarefa: analisar os principais motivos e percentuais de evasão escolar.",
        'Fila de Creche (Top 8 Bairros)' => "Tarefa: analisar as filas de creche nos 8 principais bairros com maior demanda.",
        'Merenda: Itens em Nível Crítico (%)' => "Tarefa: analisar o percentual de itens de merenda em nível crítico de estoque.",
        'Transporte: Rotas com Atraso (%)' => "Tarefa: analisar o percentual de rotas de transporte escolar com atraso.",
        'FUNDEB (Resumo Simulado)' => "Tarefa: analisar o resumo simulado de FUNDEB e sua distribuição no período informado.",
        'Metas do Mês (Atingimento %)' => "Tarefa: analisar o percentual de atingimento das metas mensais de educação.",
        
        # Saúde
        'Atendimentos por Dia (APS x Urgência)' => "Tarefa: analisar o volume diário de atendimentos comparando APS e urgência.",
        'Tempo Médio de Espera por Unidade (min)' => "Tarefa: analisar o tempo médio de espera em minutos por unidade de saúde.",
        'Classificação de Risco (Urgência)' => "Tarefa: analisar a distribuição de casos por classificação de risco em urgência.",
        'Fila da Regulação (Consultas x Exames)' => "Tarefa: analisar a fila da regulação comparando consultas e exames pendentes.",
        'Cobertura Vacinal por Campanha (%)' => "Tarefa: analisar o percentual de cobertura vacinal por campanha de vacinação.",
        'Disponibilidade por Categoria de Medicamentos (%)' => "Tarefa: analisar o percentual de disponibilidade de medicamentos por categoria.",
        'No-show (Faltas em Consultas) (%)' => "Tarefa: analisar o percentual de no-shows (faltas em consultas) no período.",
        'Metas do Mês (Atingimento %)' => "Tarefa: analisar o percentual de atingimento das metas mensais de saúde.",
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
