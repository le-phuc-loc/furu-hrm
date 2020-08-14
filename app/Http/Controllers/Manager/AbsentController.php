<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use \App\AbsentApplication;
use \App\User;
use \App\Project;
use \App\ProjectUser;
use Auth;
use Illuminate\Support\Facades\DB;
use Mail;
use \App\Jobs\ProcessReportMail;

class AbsentController extends Controller
{
    //
    public function index(Request $request) {
        $absents=AbsentApplication::with('User')
            ->join('project_user', 'absent_applications.user_id', "=", "project_user.user_id")
            ->join('projects','projects.id','=','project_user.project_id')
            ->where('managed',Auth::user()->id)
            ->where('state', AbsentApplication::getAbsentWaitting())
            // ->select('User.name')
            ->get();
        // dd($absents);
       return view('role.manager.absent.index',compact('absents'));

        $manage=Project::with(['users','project_user'])
            ->where('managed',Auth::user()->id)->get();

        $absents=DB::table('absent_applications')
            ->join('project_user','project_user.user_id','absent_applications.user_id')
            ->where('state', AbsentApplication::getAbsentWaitting())->get();
        // $result = array_diff( $manage , $absents);

        // dd($result);
        // dd($manage1);
        // dd($absents);
        // foreach($manage as $m){
        //     echo $m->project_name;
        // }
        // return $manage[1]->project_name;

        // // $absents = AbsentApplication::whereIn('user_id',
        //         User::whereIn('id',
        //         ProjectUser::whereIn('project_id',
        //         Project::where('managed',
        //         Auth::user()->id)->get()->pluck('id'))
        //             ->get()->pluck('user_id'))
        //             ->get()->pluck('id'))
        //         ->where('state', AbsentApplication::getAbsentWaitting())->get();



        // return view('role/manager/absent/index', [
        //     'absents' => $absents,
        // ]);
    }

    public function approve(Request $request, $id) {
        // dd($request);
        if (!isset($request->user_id)) {
            return redirect()->route('manager.absent.index');
        }
        else {
            $user = User::find($request->user_id);
            dispatch(new ProcessReportMail(Auth::user(), $user, "absent-allow"));
            $absent = AbsentApplication::find($id);
            $absent->state = AbsentApplication::getAbsentAllow();
            $absent->save();
        }
        return redirect()->route('manager.absent.index');
    }



    public function reject(Request $request, $id) {
        $validatedData = $request->validate(
            [
                'content'=>'required',
            ]);
        if (!isset($request->user_id)) {
            return redirect()->route('manager.absent.index');
        }
        else {
            $user = User::find($request->user_id);
            dispatch(new ProcessReportMail(Auth::user(), $user, "absent-reject", $request->content));
            $absent = AbsentApplication::find($id);
            $absent->state = AbsentApplication::getAbsentDraw();
            $absent->save();
        }

        return redirect()->route('manager.absent.index');
    }

    public function store(Request $request) {
        $absent = new AbsentApplication();
        $absent->content = $request->content;
        $absent->date_off = $request->date_off;
        $absent->number_off = $request->number_off;
        $absent->user_id = Auth::user()->id;
        $absent->state = AbsentApplication::getAbsentWaitting();

        $absent->save();
        return redirect()->route('manager.absent.index');
    }



}
