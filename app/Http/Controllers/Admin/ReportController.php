<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Report;
use \App\User;
use \App\Project;
class ReportController extends Controller
{

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
    public function datatables()
    {
        $users = User::select('name', 'email', 'role')->get();
        return Datatables::of($users)
        ->addColumn('action', function ($user) {
            $deletebtn = '<a class="btn btn-secondary btn-sm" href=""><i class="fa fa-trash-o"></i></a>';

            return $deletebtn;
        })
        ->removeColumn('id')
        ->rawColumns(['action'])
        ->make(true);
   }
}
