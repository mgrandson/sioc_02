<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;

use Closure;

class ProviderRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $userRole = null;

        if (Auth::check()) {
            $userRole = Auth::user()->role['role_name'];
            if (Auth::check() && $userRole === 'proveedor' || $userRole === 'administrador') {
                return $next($request);
            }
            return redirect('/home');
        }
        return redirect('/login');
    }
}
