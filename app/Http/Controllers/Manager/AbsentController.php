<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use \App\AbsentApplication;
use \App\User;
use \App\Project;
use \App\ProjectUser;
use Auth;

class AbsentController extends Controller
{
    //
    public function index(Request $request) {

        $absents = AbsentApplication::whereIn('user_id',
                User::whereIn('id',
                ProjectUser::whereIn('project_id',
                Project::where('managed',
                Auth::user()->id)->get()->pluck('id'))
                    ->get()->pluck('user_id'))
                    ->get()->pluck('id'))->get();


        return view('role/manager/absent/index', [
            'absents' => $absents,
        ]);
        // return view("role/manager/report/index");
    }

    public function approve(Request $request, $id) {
        if (!isset($request->user_id)) {
            return redirect()->route('manager.report.index');
        }
        else {
            $user = User::find($request->user_id);
            dispatch(new ProcessReportMail(Auth::user(), $user, "report-allow"));
            $report = Report::find($id);
            $report->state = Report::getReportAllow();
            $report->save();
        }

        return redirect()->route('manager.report.index');
    }



    public function reject(Request $request, $id) {
        if (!isset($request->user_id)) {
            return redirect()->route('manager.report.index');
        }
        else {
            $user = User::find($request->user_id);
            dispatch(new ProcessReportMail(Auth::user(), $user, "report-reject", $request->content));
            $report = Report::find($id);
            $report->state = Report::getReportDraw();
            $report->save();
        }

        return redirect()->route('manager.report.index');
    }
}
