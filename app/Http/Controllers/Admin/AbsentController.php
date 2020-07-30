<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\AbsentApplication;

class AbsentController extends Controller
{
    //
    public function index() {
        $objs = AbsentApplication::all();
        return view('role/admin/absent/index', [
            'absents' => $objs,
        ]);
    }
}
