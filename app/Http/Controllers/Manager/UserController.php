<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use \App\User;
use \App\Project;
use \App\ProjectUser;

class UserController extends Controller
{
    //
    public function index(Request $request) {
        // dd(Auth::user()->manage()->get()->pluck('id'));
        if(!isset($request->project_id)) {
            $users = User::whereIn('id',
                ProjectUser::whereIn('project_id',
                Auth::user()->manage()->get()->pluck('id'))
                ->get()->pluck('user_id'))->get();
        }
        else {

            $users = User::whereIn('id', ProjectUser::select('user_id')
                ->where('project_id', $request->project_id)
                ->get()
                ->pluck('user_id'))->get();

            // dd($users);
        }
        $projects = Project::where('managed', Auth::user()->id)->get();
        return view('role/manager/user/index', [
            'users' => $users,
            'projects' => $projects,
        ]);
    }

}
