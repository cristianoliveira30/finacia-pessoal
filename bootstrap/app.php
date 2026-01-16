<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        channels: __DIR__.'/../routes/channels.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        // Tratamento global de erros
        $exceptions->render(function (\Throwable $e, $request) {
            // Em ambiente de dev (APP_DEBUG=true), deixa o erro padrão
            if (config('app.debug')) {
                return null;
            }

            // Para requisições API/JSON, mantém o padrão também
            if ($request->expectsJson()) {
                return null;
            }

            // Descobre o status HTTP (404, 500, 403, etc)
            $status = 500;
            if ($e instanceof HttpExceptionInterface) {
                $status = $e->getStatusCode();
            }

            // Usa a tua view resources/views/page/erro.blade.php
            return response()->view('page.erro', [
                'status' => $status,
            ], $status);
        });
    })
    ->create();
