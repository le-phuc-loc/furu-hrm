<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use \App\Report;
use \App\Project;
use \App\ProjectUser;
use \App\User;
use Auth;

use Mail;
use \App\Jobs\ProcessReportMail;

class ReportController extends Controller
{
    //
    public function index(Request $request) {
        // Report::whereIn('project_user_id', ProjectUser::whereIn('project_id',
        // User::find(Auth::user()->id)
        //     ->projects()
        //     ->get()
        //     ->pluck('id'))
        //     ->get()->pluck('id'))
        //     ->get();
        // dd(Report::whereIn('project_user_id', ProjectUser::whereIn('project_id',
        // User::find(Auth::user()->id)
        //     ->projects()
        //     ->get()
        //     ->pluck('id'))
        //     ->get()->pluck('id'))
        //     ->get());
        // dd(Report::whereIn('id', User::find(Auth::user()->id)
        //     ));
        if(isset($request->project_id)) {
            $reports = Project::find($request->project_id)
                ->reports()
                ->get();
        }
        else if (isset($request->user_id)) {
            $reports = User::find($request->user_id)
                ->reports()
                ->get();
        }
        else {
            $reports =  Report::whereIn('project_user_id',
            ProjectUser::whereIn('project_id',
            User::find(Auth::user()->id)
                ->manage()
                ->get()
                ->pluck('id'))
                ->get()->pluck('id'))
                ->where('state', Report::getReportWaitting())
                ->get();
            // dd(Project::find($request->project_id)->reports()->get());

            // dd($reports->first()->project_user->user);
        }


        $projects = Project::where('managed', Auth::user()->id)->get();
        return view('role/manager/report/index', [
            'reports' => $reports,
            'projects' => $projects,
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

    public function show($id) {
        $report = Report::find($id);

        return view('role/manager/report/detail', [
            'report' => $report,
        ]);
    }


    public function reject(Request $request, $id) {
        $validatedData = $request->validate(
            [
                'content'=>'required',
            ]);
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
