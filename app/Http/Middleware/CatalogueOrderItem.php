<?php

namespace App\Http\Middleware;

use App\CatalogueOrders;
use Closure;
use Exception;

class CatalogueOrderItem
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
        $item = $request->route('item');

        $item = CatalogueOrders::find($item);

        if (!$item) {
            throw new Exception('Item not found', 404);
        }

        $request->route()->setParameter('item', $item);

        return $next($request);
    }
}
