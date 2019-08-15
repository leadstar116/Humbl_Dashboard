<?php

namespace App\Http\Middleware;

use Closure;

class ProfileComplete
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
        if ($request->user() && $request->user()->profile_completed == 0)
        {
            return redirect('/profile-complete');
        }
        return $next($request);
    }
}
