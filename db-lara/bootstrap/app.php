<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\Admin_postmiddleware;
use App\Http\Middleware\Adminmiddleware;
use App\Http\Middleware\Usermiddleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
'Admin_postmiddleware'=>Admin_postmiddleware::class,
'Adminmiddleware'=>Adminmiddleware::class,
'Usermiddleware'=>Usermiddleware::class,

        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
