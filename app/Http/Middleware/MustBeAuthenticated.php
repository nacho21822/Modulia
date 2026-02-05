<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MustBeAuthenticated
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check()) {
            return redirect()
                ->route('login')
                ->with('auth_message', 'You must be registered to access products.');
        }

        return $next($request);
    }
}
