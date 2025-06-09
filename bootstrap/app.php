<?php

use App\Http\Middleware\auth\CheckSystemUserLoginMiddleware;
use App\Http\Middleware\auth\CheckSystemUserLogoutMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Important: Register Middleware
        $middleware->alias([
            'SystemUserLogoutAuth' => CheckSystemUserLogoutMiddleware::class,
            'SystemUserLoginAuth' => CheckSystemUserLoginMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
