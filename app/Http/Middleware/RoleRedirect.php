<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleRedirect
{
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();

        if ($user) {
            if ($user->role === 'admin') {
                return redirect()->route('dashboard');
            }

            // default → student
            return redirect()->route('labs.index');
        }

        return $next($request);
    }
}
