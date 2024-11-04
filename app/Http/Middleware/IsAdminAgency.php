<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdminAgency
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
{
    // Pastikan pengguna sudah login
    if(Auth::guard('people')->check()) {
        if(Auth::guard('people')->user()->role == 'admin_agency') {
            return $next($request);
        } elseif (Auth::guard('people')->user()->role == 'super_admin'){
            return $next($request);
        }
    }

    // Jika pengguna tidak login atau tidak memiliki akses, arahkan kembali ke halaman awal admin instansi
    return redirect()->route('admin_instansi.index');
}

}