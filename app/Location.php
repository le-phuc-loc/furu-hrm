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
        return $this->hasOne('App\Project');
    }
}
