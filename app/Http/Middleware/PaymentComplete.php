<?php

namespace App\Http\Middleware;

use Closure;

class PaymentComplete
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
        if ($request->user() && $request->user()->payment_completed == 0)
        {
            return redirect('/payment-complete');
        }
        return $next($request);
    }
}
