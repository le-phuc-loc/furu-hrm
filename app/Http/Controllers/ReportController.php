<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Report;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('report/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkin(Request $request)
    {
        //
        $obj = new Report();

        $obj->time_checkin = $req->time_checkin;
        $location = Location::create([
            'location_name' => $req->location_name,
            'lat' => $req->lat,
            'lng' => $req->lng,
        ]);
        // var_dump($location);
        $obj->state = $request->state;
        $obj->location_check_in = $location->id;
        $obj->save;
        dd($obj);
    }


    public function checkout(Request $request) {
        $obj = Report::all()->lastest();
        $obj->time_checkout = $request->time_checkout;
        $location = Location::create([
            'location_name' => $req->location_name,
            'lat' => $req->lat,
            'lng' => $req->lng,
        ]);
        $obj->location_check_out = $location->id;
        $obj->content = $request->content;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
