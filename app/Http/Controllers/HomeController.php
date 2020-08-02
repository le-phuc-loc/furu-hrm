<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    // public function redirectByRole($role, $path = "index") {
    //     // dd($role);

    //     $pathView = "role/".$role."/".$path;
    //     return $pathView;

    // }

    // /**
    //  * Show the application dashboard.
    //  *
    //  * @return \Illuminate\Contracts\Support\Renderable
    //  */
    // public function index()
    // {
    //     return view($this->redirectByRole(Auth::user()->role));
    // }
    public function index()
    {
        return view('home');
    }

}

