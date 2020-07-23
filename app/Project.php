<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function user(){
        return $this->belongsToMany('App\User');
    }
    public function location()
    {
        return $this->hasOne('App\Location');
    }
}
