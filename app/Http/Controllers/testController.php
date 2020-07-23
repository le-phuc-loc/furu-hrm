<?php

namespace App\Http\Controllers;
use App\User;
use App\Project;
use App\AbsentApplication;
use Illuminate\Http\Request;

class testController extends Controller
{
    public function index($id){
    $User= User::with('AbsentApplication')->find($id);
        echo $User;
    }

}
