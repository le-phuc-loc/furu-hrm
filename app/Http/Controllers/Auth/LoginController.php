<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Auth;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('adminExist');

    }

    public function username(){
        return 'name';
    }

    // public function login(Request $request){

    //     $validatedData = $request->validate( [
    //         'name' => ['required', 'string', 'max:255'],
    //         'password' => ['required', 'string', 'min:8'],
    //     ]);
    //     if (Auth::attempt(['name' => $name, 'password' => $password])) {
    //         // Success
    //         return redirect()->intended('/');
    //     } else {
    //         // Go back on error (or do what you want)
    //         return redirect()->back();
    //     }
    // }
}
