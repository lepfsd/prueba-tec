<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        if ($request->user()->roles()->where('name', '=', $role)->exists()) {
            return $next($request);
        }

        return redirect('home')->with('error', "You don't have access.");
    }
}
