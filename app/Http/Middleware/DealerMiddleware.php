<?php

namespace App\Http\Middleware;

use Closure;

class DealerMiddleware
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
        if($request->user()->type!='dealer')
            return redirect()->back();
        return $next($request);
    }
}
