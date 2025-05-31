<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response|SymfonyResponse
    {
        if (!Auth::check() || !Auth::user()->isAdmin()) {
            return redirect()->route('dashboard')->with('error', 'Akses ditolak! Anda tidak memiliki hak akses admin.');
        }

        return $next($request);
    }
} 