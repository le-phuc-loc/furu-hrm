<?php

namespace App\Http\Middleware;
use Auth;
use App\User;
use Closure;

class Manager
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
        if (Auth::user()->role != 'manager'){
            return redirect('/');
        }
        return $next($request);
    }
}
