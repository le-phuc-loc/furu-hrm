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
        // dd($request);
        if (!isset($request->user_id)) {
            return redirect()->route('admin.absent.index');
        }
        else {
            $user = User::find($request->user_id);
            dispatch(new ProcessReportMail(Auth::user(), $user, "absent-allow"));
            $absent = AbsentApplication::find($id);
            $absent->state = AbsentApplication::getAbsentAllow();
            $absent->save();
        }

        return redirect()->route('admin.absent.index');
    }



    public function reject(Request $request, $id) {
        $validatedData = $request->validate(
            [
                'content'=>'required',
            ]);

        if (!isset($request->user_id)) {
            return redirect()->route('admin.absent.index');
        }
        else {
            $user = User::find($request->user_id);
            dispatch(new ProcessReportMail(Auth::user(), $user, "absent-reject", $request->content));
            $absent = AbsentApplication::find($id);
            $absent->state = AbsentApplication::getAbsentDraw();
            $absent->save();
        }

        return redirect()->route('admin.absent.index');
    }
}
