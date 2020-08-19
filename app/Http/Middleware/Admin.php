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
        if (isset($ request->secret_key) && ($request->secret_key == config('key.default_code'))) {
            return redirect()->route('register.admin');
        }

        if (Auth::check()) {
            if(Auth::user()->role != 'admin')
            {
                return redirect('/');
            }
        }

        return $next($request);
    }
}
