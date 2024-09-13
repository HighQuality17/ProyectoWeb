<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $roleId)
    {
        // Si el usuario no está autenticado o su role_id no coincide, se bloquea el acceso
        if (!Auth::check() || Auth::user()->role_id != $roleId) {
            abort(403, 'Acceso denegado.');
        }

        return $next($request);
    }
}
