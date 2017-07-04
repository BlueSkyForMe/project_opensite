<?php

namespace App\Http\Middleware;

use Closure;

class AdminLoginMiddleware
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
        if(!session('master'))
        {
            return redirect('/admin/login')->with(['info' => '请先登录']);
        }

        return $next($request);
    }
}
