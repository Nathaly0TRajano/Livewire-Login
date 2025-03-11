<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Se o lohin estiver correto, e o tipo de usuario, for o mesmo que estivermos passando(admin), ele vai continuar e levar pra proxima página.
        if(auth()->check() && auth()->user()->role === $role){
            return $next($request);
        }

        abort(403, 'Acesso não autorizado');
    }
}
