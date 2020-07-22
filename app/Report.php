<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    public function project_user(){
        return $this->belongsTo('App\Project_User');
    }
}
