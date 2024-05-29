<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class AuthorizationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        $token = $request->session()->get('token');
        if (!$token) {
            return redirect('/');
        }

        $explodedToken = explode('.', Crypt::decryptString($token));
        if (!$explodedToken[1] == strtoupper($role)) {
            abort(401);
        }

        return $next($request);
    }
}
