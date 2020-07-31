<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use \App\Project;
use Auth;

use \Carbon\Carbon;
class ProjectController extends Controller
{
    //
    public function index() {
        $objs = Project::where('managed', Auth::user()->id)
            ->where('to_date', '<=', Carbon::now())
            ->get();
        // dd($obj);
        return view('role/manager/project/index', [
            'projects' => $objs,
        ]);
    }
}
