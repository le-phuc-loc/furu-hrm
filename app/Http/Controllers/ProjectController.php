<?php

namespace App\Http\Controllers;
use \App\Project;
use \App\Location;
use \App\User;
use Illuminate\Database\Eloquent\Collection;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //
    public function index() {
        $objs = Project::all();
        // dd($objs);
        return view('project/index', [
            'projects' => $objs,
        ]);
    }

    public function show($id) {
        $obj = Project::find($id);
        // return view('user/'.$id, [
        //     'user' => $user,
        // ]);

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
        $obj->from_date = $req->project_from_date;
        $obj->to_date = $req->project_to_date;
        $location = Location::create([
            'location_name' => $req->location_name,
            'lat' => $req->lat,
            'lng' => $req->lng,
        ]);
        // var_dump($location);
        $obj->location_id = $location->id;
        $obj->managed = 1;
        $obj->refresh();
        $obj->users()->attach($req->user_id);
        $obj->save();

        return redirect(route('project_index'));
    }

    public function update($id) {
        $obj = Project::find($id);


        return view('project/update', [
            'user' => $obj,
        ]);
    }

    public function updatePost(Request $req, $id) {

        $obj = Project::find($id);
        $obj->name = $req->name;
        $obj->role = $req->role;
        $obj->managed = $req->managed;
        $obj->save();
        // dd($user);
        return redirect(route('project_index'));
    }

    public function delete($id) {
        Project::find($id)->delete();
    }

    public function assign($id) {
        $project = Project::find($id);
        $managers = User::where('role', 'manager')->get();
        $workers = User::where('role', 'worker')->get();

        return view('project/assign')->with([
            'project' => $project,
            'managers' => $managers,
            'workers' => $workers,
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
