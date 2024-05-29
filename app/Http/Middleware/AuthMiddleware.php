<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->session()->get('token');
        if (!$token) {
            return $next($request);
        }

        $explodedToken = explode('.', Crypt::decryptString($token));

        if ($explodedToken[1] == 'ADMIN') {
            return redirect('/dashboard/admin');
        }

        if ($explodedToken[1] == 'DOKTER') {
            return redirect('/dashboard/dokter');
        }

        if ($explodedToken[1] == 'PASIEN') {
            return redirect('/dashboard');
        }

        return $next($request);
    }
}
