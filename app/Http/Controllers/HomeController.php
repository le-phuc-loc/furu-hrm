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

    public function redirectByRole($role, $path) {
        // dd($role);

        $pathView = "role/".$role."/".$path;
        return $pathView;

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (!Auth::check()) {
            return view('/login');
        }

        if (Auth::user()->role == null) {
            Auth::user()->role = "worker";
            Auth::user()->save();
        }

        return view($this->redirectByRole(Auth::user()->role, 'index'));

    }

}

