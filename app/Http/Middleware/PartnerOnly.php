<?php

namespace App\Http\Middleware;

use Closure;

class PartnerOnly
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {

        if (!auth()->user()->partner) {
            return redirect('/home');
        }

        return $next($request);
    }
}
