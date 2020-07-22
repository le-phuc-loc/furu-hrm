<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckRole
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
        if (Auth::check()) {
            if (Auth::user()->role == "admin") {
                session([
                    'role' => Auth::user()->role,
                ]);
                echo(Auth::user()->role);
            }
            else if (Auth::user()->role == "manager"){
                session([
                    'role' => Auth::user()->role,
                ]);
                echo(Auth::user()->role);
            }
            else if (Auth::user()->role == "worker") {
                session([
                    'role' => Auth::user()->role,
                ]);
                echo(Auth::user()->role);
            }

        }

        return $next($request);

    }
}
