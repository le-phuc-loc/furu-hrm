<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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



}
