<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use \App\Project;
use \App\User;
use Auth;

use \Carbon\Carbon;
class UserController extends Controller
{
    //
    public function index() {
        $users = Auth::user();  
        return view('role/worker/user/index', [
            'user' => $users,
        ]);
    }
    public function edit($id) {
        $user = User::find($id);
        return response()->json(['user' => $user], 200);
    }
    public function store(Request $request) {
        // dd($req->input());
        $validatedData = $request->validate(
            [
                'name' => ['required', 'string', 'max:255', 'unique:users'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8'],
            ]
        );

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password) ;
        $user->save();

        return redirect()->route('worker.user.index');
    }
    public function update(Request $request, $id) {

        $validatedData = $request->validate(
            [
                'name' => ['required', 'string', 'max:255', 'unique:users,name,'.$id],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id],
            ]
        );
        // dd($request->input());
        $user = User::find($id);
        $user->name = $request->name;
        $user->email=$request->email;
        $user->save();
        // dd($user);
        return redirect()->route('worker.user.index');
    }
    public function history($id) {
        $customerhistory = Customerhistory::where('customer_id', 1)
                ->select('freetext', 'created_at')
                ->get();
                dd($customerhistory[0]->created_at->toDateString());
            }    
}
