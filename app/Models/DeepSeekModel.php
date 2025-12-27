<?php

declare(strict_types=1);

namespace App\Models;

use RuntimeException;

class DeepSeekException extends RuntimeException {}

final class DeepSeekModel
{
    private string $apiKey;
    private string $baseUrl;
    private string $endpointPath = '/chat/completions';
    private string $model = 'deepseek-chat';

    private ?string $system = null;          // mensagem de sistema opcional
    private array $messages = [];            // [{role, content}]
    private array $params = [];              // temperature, max_tokens, etc.

    // rede
    private int $timeout = 30;
    private int $connectTimeout = 10;

    public function __construct()
    {
        $this->apiKey  = $_ENV['DEEPSEEK_API_KEY'] ?? '';
        if ($this->apiKey === '') {
            throw new DeepSeekException('Informe DEEPSEEK_API_KEY (env)');
        }

        $this->baseUrl = $_ENV['DEEPSEEK_BASE_URL'] ?? '/';
    }

    // ========= API fluente =========

    /** Define o modelo (ex.: deepseek-chat, deepseek-reasoner) */
    public function model(string $model): self
    {
        $this->model = $model;
        return $this;
    }

    /** Define/atualiza a mensagem de sistema */
    public function system(string $content): self
    {
        $this->system = $content;
        return $this;
    }

    /** Adiciona mensagem de usuário */
    public function user(string $content): self
    {
        $this->messages[] = ['role' => 'user', 'content' => $content];
        return $this;
    }

    /** Adiciona mensagem do assistente (útil para reencenar contexto) */
    public function assistant(string $content): self
    {
        $this->messages[] = ['role' => 'assistant', 'content' => $content];
        return $this;
    }

    /** Parâmetros opcionais (temperature, max_tokens, top_p, response_format, etc.) */
    public function params(array $params): self
    {
        // remove nulls
        $this->params = array_filter($params, static fn($v) => $v !== null);
        return $this;
    }

    /** Ajuste simples de timeouts */
    public function timeouts(int $timeout, ?int $connectTimeout = null): self
    {
        $this->timeout = $timeout;
        if ($connectTimeout !== null) {
            $this->connectTimeout = $connectTimeout;
        }
        return $this;
    }

    /** Limpa histórico; por padrão preserva a system */
    public function clear(bool $keepSystem = true): self
    {
        $this->messages = [];
        if (!$keepSystem) {
            $this->system = null;
        }
        return $this;
    }

    // ========= Envios =========

    /** Envia e retorna o objeto decodificado da API (compat OpenAI) */
    public function send(): array
    {
        $msgs = $this->messages;
        if ($this->system !== null) {
            array_unshift($msgs, ['role' => 'system', 'content' => $this->system]);
        }
        if (empty($msgs)) {
            throw new DeepSeekException('Nenhuma mensagem. Use ->user() ou ->system().');
        }

        $payload = [
            'model'    => $this->model,
            'messages' => $msgs,
        ] + $this->params;

        $url = $this->baseUrl . $this->endpointPath;

        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
            CURLOPT_HTTPHEADER     => [
                'Content-Type: application/json',
                'Authorization: Bearer ' . $this->apiKey,
            ],
            CURLOPT_CONNECTTIMEOUT => $this->connectTimeout,
            CURLOPT_TIMEOUT        => $this->timeout,
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_CAINFO         => $_ENV['SSL_CERT_PATH'] ?: null,
        ]);

        $raw = curl_exec($ch);
        $err = curl_error($ch);
        $code = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($err) {
            throw new DeepSeekException('Erro cURL: ' . $err);
        }
        if ($raw === false || $raw === '') {
            throw new DeepSeekException('Resposta vazia da API.', $code);
        }

        $json = json_decode($raw, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new DeepSeekException('JSON inválido: ' . json_last_error_msg(), $code);
        }

        if (isset($json['error'])) {
            $msg  = $json['error']['message'] ?? 'Erro na API DeepSeek.';
            $ec   = (int)($json['error']['code'] ?? $code);
            throw new DeepSeekException($msg, $ec);
        }

        return $json;
    }

    /** Envia e retorna só o primeiro texto do assistant (ou null) */
    public function text(): ?string
    {
        $res = $this->send();
        return $res['choices'][0]['message']['content'] ?? null;
    }

    /**
     * Atalho prático para turno único:
     * ->ask("sua pergunta", system: "instruções", params: [...])
     */
    public function ask(string $prompt, ?string $system = null, array $params = []): ?string
    {
        $this->clear(keepSystem: false);
        if ($system !== null) {
            $this->system($system);
        }
        if ($params) {
            $this->params($params);
        }
        return $this->user($prompt)->text();
    }
}
