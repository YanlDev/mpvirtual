<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        //Verificar si el usuario está autenticado
        if(!auth()->check()){
            return redirect()->route('login');
        }

        //Verificar si el usuario tiene el rol requerido
        if(!auth()->user()->isUser()){
            abort(403, 'No tienes permiso para acceder a esta página.');
        }

        return $next($request);
    }
}
