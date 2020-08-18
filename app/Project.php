<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;


class Project extends Model
{
    public function users(){

        return $this->belongsToMany('App\User')->withTimestamps()->using('App\ProjectUser');
    }

    public function manager(){
        return $this->belongsTo('App\User', 'managed', 'id');
    }

    public function location()
    {
        return $this->BelongsTo('App\Location');
    }

    public function reports() {
        return $this->hasManyThrough(
            '\App\Report',
            '\App\ProjectUser',
            'project_id',
            'project_user_id',
            'id',
            'id'
        );
    }

    public function project_user() {
        return $this->hasMany('\App\ProjectUser');
    }

    // public function absentApplication(){
    //     return $this->hasManyThrough(
    //         '\App\AbsentApplication',
    //         '\App\User',
    //         'i',
    //         'project_user_id',
    //         'id',
    //         'id'
    //     );
    // }

    public function getFromDateAttribute($value) {
        return \Carbon\Carbon::parse($this->attributes['from_date'])->format('Y-m-d');
    }

    public function getToDateAttribute($value) {
        return \Carbon\Carbon::parse($this->attributes['to_date'])->format('Y-m-d');
    }

    public function getTimeToCheckinAttribute($value) {
        return \Carbon\Carbon::parse($this->attributes['time_to_checkin'])->format('H:i:s');
    }

    public function getTimeToCheckOutAttribute($value) {
        return \Carbon\Carbon::parse($this->attributes['time_to_checkout'])->format('H:i:s');
    }

    // protected $casts = [
    //     'time_to_checkin' => 'date:hh:mm',
    //     'time_to_checkout' => 'date:hh:mm',
    // ];

    function time_working($user_id = null) {

        if($user_id != null) {
            $time = 0;
            $project_user_id = DB::table('project_user')
                ->where('project_id', $this->id)
                ->where('user_id', $user_id)
                ->first();


            // dd($project_user_id);
            if ($project_user_id) {

                $time = DB::table('reports')
                ->where('project_user_id', $project_user_id->id)
                ->get()
                ->pluck('time_working')
                ->sum();
                // echo "  meo   ".$project_user_id->id;
                return $time;
            }
            return $time;
            // dd($time);
        }


        return $this->reports->pluck('time_working')->sum();
    }


}
