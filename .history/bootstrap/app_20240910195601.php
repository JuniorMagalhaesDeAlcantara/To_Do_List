<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Configuração de exceções para o middleware de CSRF
        $middleware->withoutMiddleware([
            \Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class => [
                'except' => [
                    'tasks',
                    'tasks/*',
                ],
            ],
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Configurações de exceções, se necessário
    })
    ->create();
