<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;   
use \App\User;

class UserController extends Controller
{
    //
    public function index() {
        $user = Auth::user();
        return view('role/worker/user/index', [
            'user' => $user,
        ]);
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
        $user->role = $request->role;
        $user->save();

        return redirect()->route('worker.user.index');
    }

    public function edit($id) {
        $user = User::find($id);
        return view('role/worker/user/edit',[
            'user'=>$user,
        ]);
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
        $user->password = bcrypt($request->password) ;
        $user->save();
        // dd($user);
        return redirect()->route('worker.user.index');
    }
}
