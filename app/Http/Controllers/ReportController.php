<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Report;
use \App\Project;
use \App\ProjectUser;
use \App\User;


class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        // dd(Report::getReportAllow());
        $project = Project::find($request->project_id);
        // dd( ProjectUser::all()->first()->reports());
        // var_dump(ProjectUser::all()->first()->reports()->first());
        // return Report::all()->first()->project_user()->first()->project;
        return view('/report/index', [
            'project' => $project,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkin(Request $request)
    {
        //

        $obj = new Report();
        $project = Project::find($request->project_id);

        $validatedData = $request->validate([
            'time_checkin' => 'date_format:H:i|after:'.$project->time_to_checkin,
        ]);


        // $obj = Report::find($id);
        $obj->project_user_id = ProjectUser::where('project_id', $request->project_id)
                                            ->where('user_id', Auth::user()->id)
                                            ->get();
        $obj->time_checkin = $req->time_checkin;
        $location = Location::create([
            'location_name' => $req->location_name,
            'lat' => $req->lat,
            'lng' => $req->lng,
        ]);
        $obj->state = Report::getReportCheckin();
        $obj->location_check_in = $location->id;
        $obj->save;
        dd($obj);
    }


    public function checkout(Request $request, $id) {
        $obj = Report::find($id);
        $project = $obj->project_user()->first()->project;

        $validatedData = $request->validate([
            'time_checkout' => 'date_format:H:i',
            'time_checkout' => 'date_format:H:i|after:'.$obj->time_checkin,
        ]);
        $obj->time_checkout = $request->time_checkout;
        $location = Location::create([
            'location_name' => $req->location_name,
            'lat' => $req->lat,
            'lng' => $req->lng,
        ]);
        $obj->state = Report::getReportDraw();
        $obj->location_check_out = $location->id;
    }
    public function create($id)
    {
        //
        $obj = Report::with('project_user', 'project')->find($id);
        return view('/report/create', [
            'report' => $obj,
            'project_user' => $project_user,
            'project' => $project,
        ]);
    }

    public function store() {
        $obj = new Report();
        $obj->project_user_id = ProjectUser::where('project_id', $request->project_id)
                                            ->where('user_id', Auth::user()->id)
                                            ->get();
        $obj->state = Report::getReportDraw();
        $obj->save();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function draw(Request $request, $id)
    {
        //
        $obj = Report::find($id);
        $obj->content = $request->content;
        $obj->state = Report::getReportDraw();
    }

    public function send(Request $request, $id)
    {
        //
        $obj = Report::find($id);
        $obj->content = $request->content;
        $obj->state = Report::getReportWaitting();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $obj = Report::with('project_user', 'project')->find($id);
        return view('report/show', [
            'report' => $obj,
            'project_user' => $project_user,
            'project' => $project,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $obj = Report::with('project_user', 'project')->find($id);
        return view('report/edit', [
            'report' => $obj,
            'project_user' => $project_user,
            'project' => $project,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $obj = Report::find($id);
        $obj->content = $request->content;
        // $obj->satte
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Report::find($id)->delete();
    }
}
