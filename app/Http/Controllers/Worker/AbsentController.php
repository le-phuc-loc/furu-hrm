<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

use \App\AbsentApplication;
use \App\User;
use \App\ProjectUser;
use \App\Project;
use Auth;
use Carbon\Carbon;

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
    public function create(){
        return view('role/worker/absent/create');
    }
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'content' => 'required',
            'date_off_start' => 'required|date|after:'.Carbon::now()->addDays(14),
            'date_off_end' => 'required|date|after:date_off_start',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 404);
        }

        $absent = new AbsentApplication();
        $absent->content = $request->content;
        $absent->date_off_start = $request->date_off_start;
        $absent->date_off_end = $request->date_off_end;
        $absent->number_off= Carbon::parse($request->date_off_end)
            ->diffInDays(Carbon::parse($request->date_off_start));
        $absent->user_id = Auth::user()->id;
        $absent->state = AbsentApplication::getAbsentWaitting();

        $absent->save();
        return redirect()->route('worker.absent.index');
    }

    public function edit($id) {
        $absent = AbsentApplication::with(['user'])->find($id);
        return view('role.worker.absent.edit',[
            'absent'=>$absent,
        ]);
    }

    public function update(Request $request, $id) {
        // dd($request->input());
        $validatedData = $request->validate( [
            'date_off_start' => ['required','date'],
            'date_off_end' => ['required','date','after:date_off_start'],
            'content' => ['required'],

        ]);
        $absent = AbsentApplication::find($id);
        $absent->user_id = Auth::user()->id;
        $absent->date_off_start = $request->date_off_start;
        $absent->date_off_start = $request->date_off_start;
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
