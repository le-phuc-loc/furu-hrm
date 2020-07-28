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
use Mail;
use \App\Mail\ReportMail;
use \App\Jobs\ProcessReportMail;


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
        $project_user = ProjectUser::where('user_id', Auth::user()->id)
            ->where('project_id', $id)->first();
        // dd($project_user->project);

        //check report is already exist
        if (count(Report::whereDate('created_at', '=', Carbon::now())
                ->where('project_user_id', $project_user->id)->get()) > 0) {
            $report = Report::whereDate('created_at', '=', Carbon::now())
                ->where('project_user_id', $project_user->id)->first();
        }
        else {
            $report = new Report();
            $report->project_user_id = $project_user->id;
            $report->save();
        }
        // dd($report->state);
        // dd( ProjectUser::all()->first()->reports());
        // var_dump(ProjectUser::all()->first()->reports()->first());
        // return Report::all()->first()->project_user()->first()->project;
        return view('/report/index', [
            'project' => $project_user->project,
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


        $project_user = ProjectUser::where('user_id', Auth::user()->id)
            ->where('project_id', $id)->first();
        $obj = Report::whereDate('created_at', '=', Carbon::now())
        ->where('project_user_id', $project_user->id)->first();
        // dd($obj);
        $validatedData = $request->validate([
            'time_checkin' => 'date_format:H:i|after:'.$project_user->project->time_checkin,
            'time_checkin' => 'date_format:H:i|before:'.$project_user->project->time_checkout,
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
        $project_user = ProjectUser::where('user_id', Auth::user()->id)
            ->where('project_id', $id)->first();
        $obj = Report::whereDate('created_at', '=', Carbon::now())
        ->where('project_user_id', $project_user->id)->first();


        $validatedData = $request->validate([
            'time_checkout' => 'date_format:H:i|after:'.$project_user->project->time_checkin,
            'time_checkout' => 'date_format:H:i|before:'.$project_user->project->time_checkout,
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
    public function create($id, $report_id)
    {
        $project = Project::find($id);
        $obj = Report::with('project_user')->find($report_id);
        return view('/report/create', [
            'report' => $obj,
            'project' => $project,
        ]);
    }

    public function store(Request $request, $id, $report_id) {
        switch ($request->input('action')) {
            case 'store':
                $report = Report::find($report_id);
                $report->content = $request->content;
                $report->state = Report::getReportDraw();
                $report->save();
                return redirect(route('report.draw', [
                    'id' => $id,
                ]));
            break;

            case 'review':
                $report = Report::find($report_id);
                $report->content = $request->content;
                $report->state = Report::getReportWaitting();
                $report->save();
                return 'review';
            break;
        }
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
        $project_user = ProjectUser::where('user_id', Auth::user()->id)
            ->where('project_id', $id)->first();
        $reports = Report::where('project_user_id', $project_user->id)
            ->where('state', Report::getReportDraw())
            ->get();
        return view('report/draw', [
            'reports' => $reports,

        ]);
    }

    public function send(Request $request, $id)
    {
        //
        $receivers = ['loclion17@gmail.com', 'locb1605396@student.ctu.edu.vn'];
        foreach ($receivers as $receiver) {
            dispatch(new ProcessReportMail($receiver));
        }

        return "mail sent";
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
    public function edit($report_id)
    {
        //
        $obj = Report::find($report_id);
        // dd($obj);
        return view('report.update', [
            'report' => $obj,
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
