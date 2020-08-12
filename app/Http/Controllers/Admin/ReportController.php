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
    public function totalTime(){
        $data = DB::table('reports')->get()->toArray();
       
        $time_checkout= hour('H:i:s', $date) ;
        $time_checkin = hour('H:i:s') ; 
                    
        echo $time_working = (strtotime($time_checkout) - strtotime($time_checkin)) / (60 * 60 * 24);
    
    }  
    public function index(Request $request) {

        // dd(User::with(['absentApplication', 'reports'])->get());
        // if(request()->ajax())
        // {\
            if(!empty($request->users )) {
                 $users = User::with(['reports','absent_applications'])->get();             
                //  Order::with(['reports.absent_applications'=> function($query){
                //     $query->groupBy('id');
                // }])->get();
            }
            else {
                
            }
            // if(!empty($request->to_date))
            // {
            //     $users = DB::table('absent_applications')
            //     ->whereMonth('created_at', '12')
            //     // ->groupBy('created_at')
            //     ->get();
            // }
            // else
            // {   
                // $projects = Project::all();
                // $users = DB::table('user')
                //     ->get();
            // }
        //     return databases()->of($data)->make(true);
        // }
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
        // return $users[1];
    }
}
