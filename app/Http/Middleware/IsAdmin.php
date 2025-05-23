<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user() && Auth::user()->role === 'admin') {
            return $next($request);
        }

        return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
    }
} 