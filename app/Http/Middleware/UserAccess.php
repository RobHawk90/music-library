<?php

namespace App\Http\Middleware;

use Closure;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $level = auth()->user()->access;
        if ($level === 'User' || $level === 'Admin') {
            return $next($request);
        }
        return redirect('/permission');
    }
}
