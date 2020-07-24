<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public function report()
    {
        return $this->hasOne('App\Report');
    }
    public function project()
    {
        return $this->HasOne('App\Project');
    }


    protected $fillable = ['location_name', 'lat', 'lng'];
}
