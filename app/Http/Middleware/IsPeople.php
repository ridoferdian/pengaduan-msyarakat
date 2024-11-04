<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsPeople
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('people')->check()) {
            return redirect()->back()->with(['error' => 'Login Terlebih Dahulu ']);
        }

        $user = Auth::guard('people')->user();

        // Memeriksa apakah pengguna memiliki peran 'user'
        if ($user->role != 'user') {
            return redirect()->back()->with(['error' => 'Anda tidak memiliki akses.']);
        }

        return $next($request);

    }
}