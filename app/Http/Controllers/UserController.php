<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
    //
    public function index() {
        if (Auth::user()->role == 'admin') {
            $users = User::all();
        }
        else if (Auth::user()->role == 'manager'){
            $users = User::where('manager', Auth::user()->id)->get();
        }

        return view('user/index', [
            'users' => $users,
        ]);
    }

    public function show($id) {
        $user = User::find($id);
        // return view('user/'.$id, [
        //     'user' => $user,
        // ]);

        return view('user/info', [
            'user' => $user,
        ]);
    }



    public function store(Request $req) {
        // dd($req->input());
        $user = new User();
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = bcrypt($req->name) ;
        $user->role = $req->role;
        $user->manager = $req->manager;
        $user->save();

        return redirect(route('user.index'));
    }

    public function edit($id) {
        $user = User::find($id);


        return response()->json(['user' => $user], 200);
    }

    public function update(Request $req, $id) {

        $user = User::find($id);
        $user->name = $req->name;
        $user->role = $req->role;
        $user->manager = $req->manager;
        $user->save();
        // dd($user);
        return redirect(route('user.index'));
    }

    public function delete($id) {
        User::find($id)->delete();
        return redirect(route('user.index'));
    }




}
