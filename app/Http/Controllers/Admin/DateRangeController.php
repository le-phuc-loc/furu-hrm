<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DateRangeController extends Controller
{
    function index(Request $request)
    {
        if(request()->ajax())
        {
            if(!empty($request->from_date))
            {
                $data = DB::table('absent_applications')
                ->where('number_off',array($request->from_day))
                ->get();
            }
        }
        return view('index');
}
}