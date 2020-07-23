<?php

namespace App\Http\Controllers;
use \App\Project;
use \App\Location;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //
    public function index() {
        $objs = Project::all();
        return view('project/index', [
            'users' => $objs,
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
        $obj = new Project();
        $obj->project_name = $req->project_name;
        $obj->from_date = $req->from_date;
        $obj->to_date = $req->to_date;
        $location = Location::create([
            'lat' => $req->lat_check_in,
            'lng' => $req->lng_check_in
        ]);

        $obj->location()->save($location);
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
}
