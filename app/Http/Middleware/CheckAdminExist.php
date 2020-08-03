<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
class CheckAdminExist
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
        $user = User::where('role','admin')->get();

        // dd($user);
        if(count($user)<=0){
            return redirect()->route('register');
        }
        return $next($request);
    }
}
