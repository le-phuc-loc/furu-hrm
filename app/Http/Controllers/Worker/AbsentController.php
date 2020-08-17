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
            'date_off' => ['required'],
            'content' => ['required'],

        ]);
        $absent = AbsentApplication::find($id);
        $absent->user_id = Auth::user()->id;
        $absent->date_off = $request->date_off;
        $absent->number_off = $request->number_off;
        $absent->content = $request->content;
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
