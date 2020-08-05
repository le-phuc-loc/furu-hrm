<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use \App\AbsentApplication;
use \App\User;
use \App\ProjectUser;
use \App\Project;
use Auth;

class AbsentController extends Controller
{
    //
    public function index(Request $request) {

        $absents = User::find(Auth::user()->id)->absentApplication()->get();
        // dd($absents);

        return view('role/worker/absent/index', [
            'absents' => $absents,
        ]);
        // return view("role/manager/report/index");
    }

    public function store(Request $request) {



        $absent = new AbsentApplication();
        $absent->content = $request->content;
        $absent->date_off = $request->date_off;
        $absent->number_off = $request->number_off;
        $absent->user_id = Auth::user()->id;
        $absent->state = AbsentApplication::getAbsentWaitting();

        $absent->save();
        return redirect()->route('worker.absent.index');
    }

    public function edit($id) {
        $obj = AbsentApplication::with(['user'])->find($id);
        return response()->json(['absent' => $obj], 200);
    }

    public function update(Request $request, $id) {
        // dd($request->input());
        $validatedData = $request->validate( [
            'project_name' => 'required',
            'project_from_date' => 'date',
            'project_to_date' => 'date|after:project_from_date',
            'time_checkin' => 'date_format:H:i',
            'time_checkout' => 'date_format:H:i|after:time_checkin',
        ]);

        $absent = AbsentApplication::find($id);
        $absent->content = $request->content;
        $absent->date_off = $request->date_off;
        $absent->number_off = $request->number_off;
        $absent->user_id = Auth::user()->id;
        $absent->state = AbsentApplication::getAbsentWaitting();
        $absent->save();
        // dd($user);
        return redirect()->route('worker.absent.index');
    }

    public function delete($id) {
        AbsentApplication::find($id)->delete();
        return redirect()->route('worker.absent.index');
    }


}
