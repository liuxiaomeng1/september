<?php

namespace App\Http\Middleware;

use Closure;

class Login
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
        $u_id=session('u_id');
        if(empty($u_id)){
            echo "<script>alert('请登录后再试呦');location.href='/login/login';</script>";
        }
        return $next($request);
    }
}
