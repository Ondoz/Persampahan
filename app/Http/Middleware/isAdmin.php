<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isAdmin
{
    public function handle(Request $request, Closure $next)
    {

        if (auth()->check() && auth()->user()->is_admin == 1) {
            return $next($request);
        } else {
            abort(404);
        }
    }
}
