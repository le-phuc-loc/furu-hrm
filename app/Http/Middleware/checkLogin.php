<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class checkLogin
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
        if(\Auth::check()&& \Auth::user()->role=="admin"){
            return $next($request)->with('error',"You have admin access.");
        }else{
            return redirect('/')->with('error',"You don't have admin access.");
        }

    }
}
