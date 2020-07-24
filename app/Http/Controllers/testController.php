<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Location;

class TestController extends Controller
{
    //
    public function index() {
        return view('welcome');
    }

    public function insert(Request $req) {
        // dd($req->input());
        $locate = new Location();

        $locate->lat = $req->lat;
        $locate->lng = $req->lng;
        $locate->save();
        dd($locate);

        return redirect('welcome');
    }
}
