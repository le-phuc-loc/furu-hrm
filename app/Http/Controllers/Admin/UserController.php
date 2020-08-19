<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
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
    public function create(){
        return view('role/admin/user/create');
    }

    public function show($id) {
        return redirect()->route('admin.user.index');
    }

    public function store(Request $request) {
        // dd($req->input());
        $request->validate(
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

        return redirect()->route('admin.user.index');
    }

    public function edit($id) {
        $user = User::find($id);
        return view('role/admin/user/edit',[
            'user'=>$user,
        ]);
    }

    public function update(Request $request, $id) {
        // dd($request->input());
        $request->validate(
            [
                'name' => ['required', 'string', 'max:255', 'unique:users,name,'.$id],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id],
                'role'=>['required',Rule::in(['worker','manager'])]
            ],

        );

        $user = User::find($id);
        $user->name = $request->name;
        $user->email=$request->email;
        $user->role = $request->role;
        $user->save();
        // dd($user);
        return redirect()->route('admin.user.index');
    }

    public function destroy($id) {
        User::find($id)->delete();
        return redirect()->route('admin.user.index');
    }


}
