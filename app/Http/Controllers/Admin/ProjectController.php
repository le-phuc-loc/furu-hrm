<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;




use \App\Project;
use \App\Location;
use \App\User;
use \App\ProjectUser;

class ProjectController extends Controller
{
    //
    public function index() {
        $objs = Project::all();
        return view('role/admin/project/index', [
            'projects' => $objs,
        ]);
    }
    public function create(){
        return view('role/admin/project/create');
    }


    public function store(Request $request) {
        // dd($request->input());
        $validator = Validator::make($request->all(), [
            'project_name' => 'required',
            'number_worker' => 'required',
            'from_date' => 'required|date',
            'managed' => 'required',
            'to_date' => 'required|after:from_date',
            'time_checkin' => 'required',
            'time_checkout' => 'required|after:time_checkin',
            'location_name' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 404);
        }

        $obj = new Project();
        $obj->project_name = $request->project_name;
        $obj->managed=$request->managed;
        $obj->number_worker = $request->number_worker;
        $obj->from_date = $request->from_date;
        $obj->to_date = $request->to_date;
        $obj->time_checkin = $request->time_checkin;
        $obj->time_checkout = $request->time_checkout;
        //create location
        $location = new Location();
        $location->location_name = $request->location_name;
        $location->lat = $request->lat;
        $location->lng = $request->lng;
        $location->place_id = $request->place_id;
        $location->save();

        $obj->location_id = $location->id;
        $obj->users()->attach($request->user_id);
        $obj->save();

        return redirect()->route('admin.project.index');
    }

    public function edit($id) {
        $project = Project::with(['location', 'manager', 'users'])->find($id);
        return view('role/admin/project/edit',[
            'project'=>$project,
        ]);
    }

    public function update(Request $request, $id) {
        // dd($request->input());
        $validatedData = $request->validate(
            [
            'project_name' => 'required',
            'from_date' => 'date',
            'to_date' => 'date|after:from_date',
            'time_checkin' => '',
            'time_checkout' => 'after:time_checkin',
            ],

        );
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
            'place_id' => $request->place_id,
        ]);
        $obj->users()->attach($request->user_id);
        $obj->save();
        // dd($obj);
        return redirect()->route('admin.project.index');
    }

    public function delete($id) {
        Project::find($id)->delete();
        return redirect()->route('admin.project.index');
    }

    public function assign($id) {
        $project = Project::with(['location', 'manager', 'users'])->find($id);
        $managers = User::where('role', 'manager')->get();
        $workers = User::with('projects')
            ->where('role', 'worker')
            ->whereNotIn('id', ProjectUser::select('user_id')
                ->where('project_id', $id)
                ->get()
                ->pluck('user_id'))
            ->get();
        $admin = User::where('role', 'admin')->first();
        // dd(ProjectUser::select('user_id')->where('project_id', $id)->get()->pluck('user_id'));
        return view('role/admin/project/assign')->with([
            'project' => $project,
            'managers' => $managers,
            'workers' => $workers,
            'admin' => $admin,
        ]);
    }

    public function assigned($id) {
        $project = Project::with(['location', 'manager', 'users'])->find($id);
        $managers = User::where('role', 'manager')->get();
        $workers = User::with('projects')
            ->where('role', 'worker')
            ->whereIn('id', ProjectUser::select('user_id')
                ->where('project_id', $id)
                ->get()
                ->pluck('user_id'))
            ->get();
        $admin = User::where('role', 'admin')->first();
        // dd(ProjectUser::select('user_id')->where('project_id', $id)->get()->pluck('user_id'));
        return view('role/admin/project/assigned')->with([
            'project' => $project,
            'workers' => $workers,
            'admin' => $admin,
        ]);
    }

    public function assignPost(Request $request, $id) {

        // dd($req->input());
        $obj = Project::find($id);
        $obj->managed = $request->manager;
        $obj->users()->attach($request->workers);

        $obj->save();
        // dd($obj);
        // dd($user);
        return redirect()->route('admin.project.assigned',['id'=>$id]);
    }

    public function deleteAssigned(Request $request, $id) {
        // $project_id = $request->project_id;
        $user_id = $request->user_id;
        ProjectUser::where('user_id', $user_id)
            ->where('project_id', $id)
            ->get()
            ->first()
            ->delete();
            return redirect()->route('admin.project.assigned',['id' => $id] );
    }

}
