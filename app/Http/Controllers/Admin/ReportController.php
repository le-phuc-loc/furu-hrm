<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use \App\User;
use \App\Project;

class ReportController extends Controller
{
    //
    public function index(Request $request) {

        // dd(User::with(['absentApplication', 'reports'])->get());
        if (!isset($request->project_id)) {
            $users = User::with(['absentApplication'])->get();
        }
        else {

        }
        $projects = Project::all();

        // dd(
        //     DB::table('reports')
        //     ->join('project_user', 'reports.project_user_id', "=", "project_user.id")
        //     ->whereNull('reports.project_user_id')
        //     ->selectRaw('users.*, sum(TIMESTAMPDIFF(hour, time_checkin, time_checkout)) as time_working')
        //     ->groupBy('users.id')

        //     ->get()

        // );

        // dd(
        //     DB::table('project_user')
        //         ->
        // );
        // $time_working =
        // dd($reports);
        return view('role/admin/report/index', [
            'users' => $users,
            'projects' => $projects,
        ]);
    }
}
