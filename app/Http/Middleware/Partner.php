<?php

namespace App\Http\Middleware;

use Closure;

class Partner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)    {

        if (auth()->user()->partner) {
            return redirect('/partner'.'/'.auth()->user()->id);
        }

        return $next($request);
    }
}
