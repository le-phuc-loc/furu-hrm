<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Report;
use \App\Project;
use \App\ProjectUser;
use \App\User;
use \App\Location;
use Auth;
use \Carbon\Carbon;


class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
        //
        // dd(Report::getReportAllow());
        $project = Project::find($id);
        if (count(Report::whereDate('created_at', '=', Carbon::now())->get() ) > 0) {
            $report = Report::whereDate('created_at', '=', Carbon::now())->first();
        }
        else {
            $report = new Report();
            $project_user = ProjectUser::where('project_id', $project->id)
            ->where('user_id', Auth::user()->id)
            ->get()->first()->id;

            $report->project_user_id = $project_user;
            $report->save();
        }
        // dd($report->state);
        // dd( ProjectUser::all()->first()->reports());
        // var_dump(ProjectUser::all()->first()->reports()->first());
        // return Report::all()->first()->project_user()->first()->project;
        return view('/report/index', [
            'project' => $project,
            'report' => $report,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkin(Request $request, $id)
    {
        //


        $project = Project::find($request->id);
        $obj = Report::whereDate('created_at', '=', Carbon::now())->first();
        // dd($obj);
        $validatedData = $request->validate([
            'time_checkin' => 'date_format:H:i|after:'.$project->time_checkin,
            'time_checkin' => 'date_format:H:i|before:'.$project->time_checkout,
        ]);


        // $obj = Report::find($id);



        $obj->time_checkin = Carbon::now()->format('H:i');

        $location = Location::create([
            'location_name' => $request->location_name,
            'lat' => $request->lat,
            'lng' => $request->lng,
        ]);
        $obj->location_check_in = $location->id;
        $obj->state = Report::getReportCheckin();
        // dd($obj);
        $obj->save();
        return redirect(route('report.index', ['id' => $id]));
    }


    public function checkout(Request $request, $id) {

        $obj = Report::whereDate('created_at', '=', Carbon::now())->first();
        $project = Project::find($id);

        $validatedData = $request->validate([
            'time_checkout' => 'date_format:H:i|after:'.$project->time_checkin,
            'time_checkout' => 'date_format:H:i|before:'.$project->time_checkout,
            'time_checkout' => 'date_format:H:i|after:'.$obj->time_checkin,
        ]);
        $obj->time_checkout = Carbon::now()->format('H:i');
        $location = Location::create([
            'location_name' => $request->location_name,
            'lat' => $request->lat,
            'lng' => $request->lng,
        ]);
        $obj->location_check_out = $location->id;
        $obj->state = Report::getReportDraw();
        // dd($obj);
        $obj->save();
        return redirect(route('report.index', ['id' => $id]));

    }
    public function create($id)
    {
        $project = Project::find($id);
        $obj = Report::with('project_user')->find($id);
        return view('/report/create', [
            'report' => $obj,
            'project_user' => $project_user,
            'project' => $project,
        ]);
    }

    public function store(Request $request, $id) {
        $obj = Report::whereDate('created_at', '=', Carbon::now())->first();
        $obj->content = $request->content;
        $obj->state = Report::getReportDraw();
        $obj->save();
        return redirect(route('report.index', ['id' => $id]));
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
    public function show($id, $report_id)
    {
        //
        // dd($report_id);
        $obj = Report::with('project_user')->find($report_id);
        // return view('report/show', [
        //     'report' => $obj,
        //     'project_user' => $project_user,
        //     'project' => $project,
        // ]);
        return $obj;
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
