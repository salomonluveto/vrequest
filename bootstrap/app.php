<?php


use App\Http\Middleware\CheckRole;
use Illuminate\Foundation\Application;
use App\Http\Middleware\EditPermission;
use App\Http\Middleware\SavePermission;
use App\Http\Middleware\DeletePermission;
use App\Http\Middleware\CheckModelPermission;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
        $middleware->alias([
            'role'=> \App\Http\Middleware\AgentRole::class,
            'check'=> CheckModelPermission::class,
            
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
