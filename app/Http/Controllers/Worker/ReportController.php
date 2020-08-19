<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use \App\Report;
use \App\ProjectUser;
use \App\User;
use \App\Location;


use Auth;

use \Carbon\Carbon;

class ReportController extends Controller
{
    //
    public function index() {
        // dd(User::all()->reports()->get());
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
            ->whereDate('reports.created_at', "=", Carbon::now('Asia/Ho_Chi_Minh'))
            ->get()
            ) <= 0) {
            if(isset($request->project_id)) {
                $report = new Report();
                $report->project_user_id = ProjectUser::where('user_id', Auth::user()->id)
                    ->where('project_id', $request->project_id)->first()->id;
                $report->state = Report::getReportCreated();
                $report->save();
            }
        }


        return redirect()->route('worker.report.index');
    }

    public function show($id) {
        $report = Report::find($id);
        if (!Auth::user()->can('view', $report)) {
            // dd($user);
            return redirect()->route('home');
        }
        return view('role/worker/report/detail', [
            'report' => $report,
        ]);
    }



    public function sendOrDraw(Request $request, $id)
    {
        $report = Report::find($id);
        if (!Auth::user()->can('update', $report)) {
            // dd($user);
            return redirect()->route('home');
        }
        switch ($request->input('action')) {
            case 'draw':

                $report->content = $request->content;
                $report->state = Report::getReportDraw();


            break;

            case 'send':
                $report->content = $request->content;
                $report->state = Report::getReportWaitting();

            break;
        }
        $report->save();
        return redirect()->route('worker.report.index');

    }

    public function checkin(Request $request, $id) {
        // dd(Carbon::now()->format('H:i'));
        $report = Report::find($id);
        $this->authorize('update', $report);


        $report->time_checkin = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i');
        $location_name = Auth::user()->name."-checkin";
        $location = Location::create([
            'location_name' => $location_name,
            'lat' => $request->lat,
            'lng' => $request->lng,
        ]);

        $report->location_check_in = $location->id;
        $report->state = Report::getReportCheckin();

        $report->save();
        return response()->json(['success'=>'Checkin successful!!']);
    }

    public function checkout(Request $request, $id) {
        // dd(Carbon::now()->format('H:i'));
        $report = Report::find($id);

        $this->authorize('update', $report);


        $time_checkout = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i');
        $report->time_checkout = $time_checkout;
        $location_name = Auth::user()->name."-checkout";
        $location = Location::create([
            'location_name' => $location_name,
            'lat' => $request->lat,
            'lng' => $request->lng,
        ]);

        $report->location_check_out = $location->id;
        $report->state = Report::getReportDraw();
        $report->time_working = Carbon::parse($time_checkout)->diffInHours(Carbon::parse($report->time_checkin));
        $report->save();
        return response()->json(['success'=>'Checkout successful!!']);
    }

}
