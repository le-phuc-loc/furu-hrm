<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use \App\Project;
use \App\User;

class DashboardController extends Controller
{
    //
    public function timeWorking(Request $request) {

        $projects = Project::all();
        $users = User::all();
        $project_id = null;

        if (isset($request->project_id)) {
            $project_id = $request->project_id;
        }

        return view('role/admin/dashboard/timeWorking', [
            'projects' => $projects,
            'users' => $users,
            'project_id' => $project_id,
        ]);
    }

    public function timeAbsent(Request $request) {
        $users = User::all();
        $month = null;
        $session = null;


        if (isset($request->month)) {
            $month = $request->month;
        }

        if (isset($request->session)) {
            $session = $request->session;
            // dd($request->session);
        }

        return view('role/admin/dashboard/timeAbsent', [
            'users' => $users,
            'month' => $month,
            'session' => $session,
        ]);
    }
}
