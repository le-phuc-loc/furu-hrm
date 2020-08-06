<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use \App\User;

class UserController extends Controller
{
    //
    public function index() {
        $users = User::all();
        return view('role/admin/user/index', [
            'users' => $users,
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
        $user->password = bcrypt($request->name) ;
        $user->role = $request->role;
        $user->save();

        return redirect()->route('admin.user.index');
    }

    public function edit($id) {
        $user = User::find($id);
        return response()->json(['user' => $user], 200);
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
        $user->role = $request->role;
        $user->save();
        // dd($user);
        return redirect()->route('admin.user.index');
    }

    public function delete($id) {
        User::find($id)->delete();
        return redirect()->route('admin.user.index');
    }


}
