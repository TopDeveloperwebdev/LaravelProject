<?php

namespace App\Http\Middleware;

use App\CatalogueOrders;
use Closure;
use Exception;

class CatalogueOrder
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
        $order = $request->route('order');

        if (auth()->user()->is_admin) {
            $order = CatalogueOrders::where('order_id', $order)->get()->groupBy('order_id');
        } else {
            $order = auth()->user()->catalogueOrders()->where('order_id', $order)->get()->groupBy('order_id');
        }

        if (!$order->count()) {
            throw new Exception('Order not found', 404);
        }

        $request->route()->setParameter('order', $order->first());

        return $next($request);
    }
}
