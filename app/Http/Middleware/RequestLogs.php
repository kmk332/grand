<?php

namespace App\Http\Middleware;

use Closure;

class RequestLogs
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
        dd($request->route()->parameters());
        return $next($request);
    }

}
