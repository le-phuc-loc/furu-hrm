<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use \App\AbsentApplication;
use \App\User;
use \App\Project;
use \App\ProjectUser;
use Auth;


use Mail;
use \App\Jobs\ProcessReportMail;

class AbsentController extends Controller
{
    //
    public function index() {
        $objs = AbsentApplication::all();
        return view('role/admin/absent/index', [
            'absents' => $objs,
        ]);
    }

    public function approve(Request $request, $id) {
        // $user = User::find($request->user_id);
        $absent = AbsentApplication::find($id);


        if (!Auth::user()->can('approve', $absent)) {
            return redirect()->route('home');
        }
        dispatch(new ProcessReportMail(Auth::user(), $absent->user, "absent-allow"));
        $absent->state = AbsentApplication::getAbsentAllow();
        $absent->save();

        return redirect()->route('admin.absent.index');
    }



    public function reject(Request $request, $id) {
        $absent = AbsentApplication::find($id);

        if (!Auth::user()->can('reject', $absent)) {
            return redirect()->route('home');
        }

        dispatch(new ProcessReportMail(Auth::user(), $absent->user, "absent-reject", $request->content));

        $absent->state = AbsentApplication::getAbsentDraw();
        $absent->save();

        return redirect()->route('admin.absent.index');
    }
}
