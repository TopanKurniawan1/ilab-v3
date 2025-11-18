<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * Pemakaian: ->middleware('role:admin') atau ->middleware('role:admin,student')
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Jika belum login → biarkan middleware 'auth' yang menangani,
        // tapi untuk jaga-jaga: redirect ke login.
        if (! auth()->check()) {
            return redirect()->route('login');
        }

        $userRole = auth()->user()->role ?? 'student';

        // Jika role user tidak ada di daftar role yang diizinkan → arahkan ke tujuan default
        if (! in_array($userRole, $roles, true)) {
            // Admin diarahkan ke dashboard, student ke halaman labs
            return redirect()->route(
                $userRole === 'admin'
                    ? 'dashboard'
                    : 'student.labs.index'
            );
        }

        return $next($request);
    }
}
