<?php

use App\Http\Middleware\CheckRole;
use App\Http\Middleware\EnsureAdminRole;
use App\Http\Middleware\EnsureUserRole;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        // 🚀 NUEVAS RUTAS PERSONALIZADAS
        then: function (){
            // Rutas de administrador
            Route::middleware(['web','auth', 'verified', 'admin'])
                ->prefix('admin')
                ->name('admin.')
                ->group(base_path('routes/admin.php'));

            // Rutas de usuario
            Route::middleware(['web','auth', 'verified', 'user'])
                ->prefix('user')
                ->name('user.')
                ->group(base_path('routes/user.php'));
        }
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Registrando middleware de roles
        $middleware->alias([
            'role' => CheckRole::class,
            'user' => EnsureUserRole::class,
            'admin' => EnsureAdminRole::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
