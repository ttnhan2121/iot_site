<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Login
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $isLogin = $request->session()->exists('islogin');
        if ($isLogin) {
            return $next($request);
        } else {
            return redirect()->action('App\Http\Controllers\LoginController@getView');
        }
    }


}
