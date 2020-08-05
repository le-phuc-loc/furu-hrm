<?php

namespace App\Http\Middleware;
use Illuminate\Http\Request;

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
            // $default_code =$this->secret('What is the password?');
            // return redirect()->route('register.admin');
            return redirect()->route('register.admin');

        }
        return $next($request);
    }
}
