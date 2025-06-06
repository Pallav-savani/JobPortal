<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->guard()->check() && auth()->guard()->user()->is_admin) {
            return $next($request);
        }

        abort(403, 'Unauthorized - Admins only');
    }
}