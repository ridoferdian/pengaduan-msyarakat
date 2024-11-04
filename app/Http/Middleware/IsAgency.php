<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAgency
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('people')->check() && Auth::guard('people')->user()->role === 'super_admin') {
            return $next($request);
        }

        return redirect()->route('admin_instansi.index')->with('error', 'anda tidak memiliki akses');
    }
}
