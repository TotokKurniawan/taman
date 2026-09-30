<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if (Auth::check()) {
            dd('User is logged in: ', Auth::user()->email);
        }

        if (Auth::check() && Auth::user()->role === $role) {
            return $next($request);
        }

        return redirect('/home')->with('error', 'You do not have access to this page.');
    }
}
