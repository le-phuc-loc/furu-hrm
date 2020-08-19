<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use \App\User;
use \App\Project;
use \App\ProjectUser;
use Auth;
use Illuminate\Support\Facades\DB;
use Mail;
use \App\Jobs\ProcessReportMail;
use Carbon\Carbon;
use \App\AbsentApplication;


class AbsentController extends Controller
{
    public function mine(){
        $absents=Auth::user()->absentApplication()->get();
        // dd($absents);
        return view('role/manager/absent/mine',[
            'absents'=>$absents
        ]);
    }
    //
    public function index(Request $request) {
    //     // $absents=AbsentApplication::with('User')
    //     $absents=DB::table('absent_applications')
    //         ->join('users','users.id','=','absent_applications.user_id')
    //         ->join('project_user', 'absent_applications.user_id', "=", "project_user.user_id")
    //         ->join('projects','projects.id','=','project_user.project_id')
    //         ->where('managed',Auth::user()->id)
    //         ->where('state', AbsentApplication::getAbsentWaitting())
    //         ->select('users.name','absent_applications.date_off')->get();
    //         dd($absents);
    //    return view('role.manager.absent.index',compact('absents'));


    //     $absents=AbsentApplication::with('User')
    //         ->Join('project_user','absent_applications.user_id','=','project_user.user_id')
    //         // ->where('state', AbsentApplication::getAbsentWaitting())
    //         // ->whereIn('project_id',$test)
    //         ->distinct()
    //         ->get();
    //     dd($absents);
    //     return view('role.manager.absent.index',compact('absents'));

        $test=Auth::user()->manage->pluck('id');
        $test1=ProjectUser::whereIn('project_id',$test)->groupBy('user_id')->pluck('user_id');
        $absents=AbsentApplication::whereIn('user_id',$test1)
            ->where('state', AbsentApplication::getAbsentWaitting())->get();
            // dd($absents);
        return view('role.manager.absent.index',compact('absents'));

        // $absents = AbsentApplication::whereIn('user_id',
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
    public function create(){
        return view('role/manager/absent/create');
    }
    public function store(Request $request) {
        $validatedData = $request->validate( [
            'content' => 'required',
            'date_off_start' => 'required|date|after:'.Carbon::now()->addDays(14),
            'date_off_end' => 'required|date|after:date_off_start',
        ]);

        $absent = new AbsentApplication();
        $absent->content = $request->content;
        $absent->date_off_start = $request->date_off_start;
        $absent->date_off_end = $request->date_off_end;
        $absent->number_off= Carbon::parse($request->date_off_end)
        ->diffInDays(Carbon::parse($request->date_off_start));
        $absent->user_id = Auth::user()->id;
        $absent->state = AbsentApplication::getAbsentWaitting();

        $absent->save();
        return redirect()->route('manager.absent.mine');
    }



}
