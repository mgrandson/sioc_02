<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ManagerRole
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
            if (Auth::check() && $userRole === 'gerente' || $userRole === 'administrador') {
                return $next($request);
            }
            return redirect('/home');
        }
        return redirect('/login');
    }
}
