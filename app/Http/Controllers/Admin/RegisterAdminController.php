<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use \App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class RegisterAdminController extends Controller
{
    //
    protected function create(array $data)
{
    return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'api_token' => Str::random(60),
    ]);
}

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index() {
        return view('role/admin/register');
    }

    public function register(Request $request) {

        $validatedData = $request->validate( [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        // dd($request->input());
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = Hash::make($request->passwork);
        $user->save();

        return redirect()->route('login');
    }


}
