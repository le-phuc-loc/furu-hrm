<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function user(){
        return $this->belongsToMany('App\User');
    }
    public function location_lat()
    {
        return $this->hasOne('App\Location','project_id','location_id');
    }
    public function location_long(){
        return $this->hasOne('App\Location','project_id','location_id');
    }
}
