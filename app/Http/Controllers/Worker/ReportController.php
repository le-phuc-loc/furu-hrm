<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use \App\Report;
use \App\ProjectUser;
use \App\User;
use Auth;

use \Carbon\Carbon;

class ReportController extends Controller
{
    //
    public function index() {
        $reports = User::find(Auth::user()->id)->reports()->get();
        $user = User::with(['reports', 'projects'])->find(Auth::user()->id);
        // dd($user);
        return view('role/worker/report/index', [
            'user' => $user,
        ]);
    }

    public function store(Request $request) {
        // dd($request->input());
        //check report is already exist
        // dd(User::find(Auth::user()->id)->reports()->whereDate('reports.created_at', "=", Carbon::now())->get());
        if (count(User::find(Auth::user()->id)
            ->reports()
            ->whereDate('reports.created_at', "=", Carbon::now())
            ->get()
            ) <= 0) {
            if(isset($request->project_id)) {
                $report = new Report();
                $report->project_user_id = ProjectUser::where('user_id', Auth::user()->id)
                    ->where('project_id', $request->project_id)->first()->id;
                $report->state = Report::getReportDraw();
                $report->save();
            }
        }


        return redirect()->route('worker.report.index');
    }

    public function show($id) {
        $report = Report::find($id);

        return view('role/worker/report/detail', [
            'report' => $report,
        ]);
    }

    public function draw(Request $request, $id)
    {
        //
        $report = Report::find($id);
        $report->content = $request->content;
        $report->state = Report::getReportDraw();
        $report->save();

        return redirect()->route('worker.report.index');
    }

    public function send(Request $request, $id)
    {
        $report = Report::find($id);
        $report->content = $request->content;
        $report->state = Report::getReportWaitting();
        $report->save();
        return redirect()->route('worker.report.index');

    }

    public function checkin(Request $request, $id) {
        // dd($request->input());
        $report = Report::find($id);

        $obj->time_checkin = Carbon::now()->format('H:i');

        $location = Location::create([
            'location_name' => $request->location_name,
            'lat' => $request->lat,
            'lng' => $request->lng,
        ]);

        $obj->location_check_in = $location->id;
        // $obj->state = Report::getReportCheckin();

        $obj->save();

    }

}
