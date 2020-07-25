<?php

namespace App\Http\Controllers;
use \App\Project;
use \App\Location;
use \App\User;
use Auth;
use Illuminate\Database\Eloquent\Collection;
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

    public function createPost(Request $req) {
        // dd($req->input());
        $obj = new Project();
        $obj->project_name = $req->project_name;
        $obj->number_worker = $req->number_worker;
        $obj->from_date = $req->project_from_date;
        $obj->to_date = $req->project_to_date;
        $obj->time_to_checkin = $req->time_check_in;
        $obj->time_to_checkout = $req->time_check_out;
        $location = Location::create([
            'location_name' => $req->location_name,
            'lat' => $req->lat,
            'lng' => $req->lng,
        ]);
        // var_dump($location);
        $obj->location_id = $location->id;
        $obj->users()->attach($req->user_id);
        $obj->save();

        return redirect(route('project_index'));
    }

    public function update($id) {
        $obj = Project::with(['location', 'managed', 'users'])->find($id);


        return view('project/update', [
            'project' => $obj,
        ]);
    }

    public function updatePost(Request $req, $id) {
        // dd($req->input());
        $obj = Project::find($id);
        $obj->project_name = $req->project_name;
        $obj->number_worker = $req->number_worker;
        $obj->from_date = $req->project_from_date;
        $obj->to_date = $req->project_to_date;
        $obj->time_to_checkin = $req->time_check_in;
        $obj->time_to_checkout = $req->time_check_out;
        $obj->location->update([
            'location_name' => $req->location_name,
            'lat' => $req->lat,
            'lng' => $req->lng,
        ]);
        $obj->users()->attach($req->user_id);
        $obj->save();
        // dd($user);
        return redirect(route('project_index'));
    }

    public function delete($id) {
        Project::find($id)->delete();
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

    public function assignPost(Request $req, $id) {

        // dd($req->input());
        $obj = Project::find($id);
        $obj->managed = $req->manager;
        foreach ($req->workers as $worker) {
            $obj->users()->attach($worker);
        }


        $obj->save();
        // dd($obj);
        // dd($user);
        return redirect(route('project_info', ['id' => $id]) );
    }

}
