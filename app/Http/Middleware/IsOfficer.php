<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsOfficer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::guard('officer')->check()) {
            if(Auth::guard('officer')->user()->level == 'officer') {
                return $next($request);
            } elseif (Auth::guard('officer')->user()->level == 'admin'){
                return $next($request);
            }
        }
        
        return redirect()->route('admin.formLogin');
    }
}