<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Role as Middleware;

class Role
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        return collect($roles)->contains(auth()->user()->role) ? $next($request) : back();
    }
}
