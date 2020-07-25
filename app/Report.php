<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    public function project_user(){
        return $this->belongsTo('App\Project_User');
    }
    public function location_check_in()
    {
        return $this->belongsTo('App\Location','location_check_in');
    }
    public function location_check_out()
    {
        return $this->belongsTo('App\Location','location_check_out');
    }
}
