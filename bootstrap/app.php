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
        // 🔥 TRIK SAKTI NGGO PRESENTASI: MATENI TAMENG CSRF SUPAYA ANTI EROR 419
        $middleware->validateCsrfTokens(except: [
            'login',
            'register',
            'dashboard',
            'jalankan-migrasi-rahasia',
            '*' // Mateni kabeh jalur khusus wektu demo, dijamin plung-plung mlebu!
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();