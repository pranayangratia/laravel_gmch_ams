<?php

use App\Http\Middleware\GuestMiddleware;
use App\Http\Middleware\ProfessorMiddleware;
use App\Http\Middleware\StudentMiddleware;
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


        $middleware->alias([
            'guest' => GuestMiddleware::class
        ]);

        $middleware->alias([
            'professor' => ProfessorMiddleware::class
        ]);

        $middleware->alias([
           'student' =>StudentMiddleware::class
        ]);

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
