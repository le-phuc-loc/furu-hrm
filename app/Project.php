<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function users(){
        return $this->belongsToMany('App\User')->withTimestamps();
    }

    public function managed(){
        return $this->belongsTo('App\User');
    }

    public function location()
    {
        return $this->BelongsTo('App\Location');
    }

    public function getFromDateAttribute($value) {
        return \Carbon\Carbon::parse($this->attributes['from_date'])->format('Y-m-d');
    }



}
