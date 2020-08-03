<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;
use App\Http\Middleware\DB;
use App\Http\Middleware\first;

class Admin
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
        if(Auth::user()->role != 'admin')
            {
                return redirect('/');
            }
        return $next($request);
    }
}
