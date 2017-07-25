<?php

namespace App\Http\Middleware;

use Closure;

class TenantLoginMiddleware
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
        // 判断session
        if(!session('hmer'))
        {
            return redirect('/home/index');
        }

        return $next($request);
    }
}
