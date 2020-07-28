<?php

namespace App\Http\Controllers;
use \App\Project;
use \App\Location;
use \App\User;
use Auth;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //
    public function index() {
        if(Auth::user()->role == 'admin') {
            $objs = Project::all();
        }
        else if (Auth::user()->role == 'manager') {
            $objs = Project::where('managed', Auth::user()->id)
                ->where('to_date', '<=', Carbon::now())
                ->get();
        }
        else if (Auth::user()->role == 'worker') {
            $objs = User::find(Auth::user()->id)
                ->projects()
                ->where('to_date', '<=', Carbon::now())
                ->get();
        }

        // dd($objs);
        return view('project/index', [
            'projects' => $objs,
        ]);
    }

    public function show($id) {
        $obj = Project::find($id);


        return view('project/info', [
            'project' => $obj,
        ]);
    }

    public function create() {
        return view('project/create');
    }

    public function store(Request $request) {
        // dd($req->input());

        $validatedData = $request->validate( [
            'project_name' => 'required',
            'project_from_date' => 'date',
            'project_to_date' => 'date|after:project_from_date',
            'time_checkin' => 'date_format:H:i',
            'time_checkout' => 'date_format:H:i|after:time_checkin',
        ]);

        $obj = new Project();
        $obj->project_name = $request->project_name;
        $obj->number_worker = $request->number_worker;
        $obj->from_date = $request->project_from_date;
        $obj->to_date = $request->project_to_date;
        $obj->time_checkin = $request->time_check_in;
        $obj->time_checkout = $request->time_check_out;
        $location = Location::create([
            'location_name' => $request->location_name,
            'lat' => $request->lat,
            'lng' => $request->lng,
        ]);
        // var_dump($location);
        $obj->location_id = $location->id;
        $obj->users()->attach($request->user_id);
        $obj->save();

        return redirect(route('project_index'));
    }

    public function edit($id) {
        $obj = Project::with(['location', 'managed', 'users'])->find($id);


        return response()->json(['project' => $obj], 200);
    }

    public function update(Request $request, $id) {
        // dd($req->input());
        $validatedData = $request->validate( [
            'project_name' => 'required',
            'project_from_date' => 'date',
            'project_to_date' => 'date|after:project_from_date',
            'time_checkin' => 'date_format:H:i',
            'time_checkout' => 'date_format:H:i|after:time_checkin',
        ]);

        $obj = Project::find($id);
        $obj->project_name = $request->project_name;
        $obj->number_worker = $request->number_worker;
        $obj->from_date = $request->from_date;
        $obj->to_date = $request->to_date;
        $obj->time_checkin = $request->time_checkin;
        $obj->time_checkout = $request->time_checkout;
        $obj->location->update([
            'location_name' => $request->location_name,
            'lat' => $request->lat,
            'lng' => $request->lng,
        ]);
        $obj->users()->attach($request->user_id);
        $obj->save();
        // dd($user);
        return redirect(route('project.index'));
    }

    public function delete($id) {
        Project::find($id)->delete();
        return redirect(route('project.index'));
    }

    public function assign($id) {
        $project = Project::with(['location', 'managed', 'users'])->find($id);
        $managers = User::where('role', 'manager')->get();
        $workers = User::where('role', 'worker')->get();
        $admin = User::where('role', 'admin')->first();

        return view('project/assign')->with([
            'project' => $project,
            'managers' => $managers,
            'workers' => $workers,
            'admin' => $admin,
        ]);
    }

    public function assignPost(Request $request, $id) {

        // dd($req->input());
        $obj = Project::find($id);
        $obj->managed = $req->manager;
        foreach ($request->workers as $worker) {
            $obj->users()->attach($worker);
        }


        $obj->save();
        // dd($obj);
        // dd($user);
        return redirect(route('project_info', ['id' => $id]));
    }

}
