<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use \App\Project;
use Auth;

use \Carbon\Carbon;

class ProjectController extends Controller
{
    //
    //
    public function index() {

        $objs = Project::where('managed', Auth::user()->id)
            ->where('to_date', '<=', Carbon::now())
            ->get();
        // dd(Auth::user()->id);
        return view('role/manager/project/index', [
            'projects' => $objs,
        ]);
    }


    public function edit($id) {
        $obj = Project::with(['location', 'managed', 'users'])->find($id);
        return response()->json(['project' => $obj], 200);
    }

    public function update(Request $request, $id) {
        // dd($request->input());
        // $validatedData = $request->validate( [
        //     'project_name' => 'required',
        //     'project_from_date' => 'date',
        //     'project_to_date' => 'date|after:project_from_date',
        //     'time_checkin' => 'date_format:H:i',
        //     'time_checkout' => 'date_format:H:i|after:time_checkin',
        // ]);

        $obj = Project::find($id);
        $obj->project_name = $request->project_name;
        $obj->number_worker = $request->number_worker;
        $obj->from_date = $request->from_date;
        $obj->to_date = $request->to_date;
        $obj->time_checkin = $request->time_checkin;
        $obj->time_checkout = $request->time_checkout;

        // $obj->location
        $obj->location->update([
            'location_name' => $request->location_name,
            'lat' => $request->lat,
            'lng' => $request->lng,
            'place_id' => $request->place_id,
        ]);

        $obj->users()->attach($request->user_id);
        $obj->save();
        // dd($obj->location->location_name);
        // dd($obj);
        return redirect()->route('manager.project.index');
    }

}
