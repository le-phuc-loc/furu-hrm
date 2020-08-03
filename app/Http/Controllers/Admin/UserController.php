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

    public function store(Request $req) {
        // dd($req->input());
        $user = new User();
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = bcrypt($req->name) ;
        $user->role = $req->role;
        $user->save();

        return redirect()->route('admin.user.index');
    }

    public function edit($id) {
        $user = User::find($id);
        return response()->json(['user' => $user], 200);
    }

    public function update(Request $req, $id) {

        $user = User::find($id);
        $user->name = $req->name;
        $user->role = $req->role;
        $user->save();
        // dd($user);
        return redirect()->route('admin.user.index');
    }

    public function delete($id) {
        User::find($id)->delete();
        return redirect()->route('admin.user.index');
    }
    public function history($id) {
    $customerhistory = Customerhistory::where('customer_id', 1)
            ->select('freetext', 'created_at')
            ->get();

    dd($customerhistory[0]->created_at->toDateString());
    }
}
