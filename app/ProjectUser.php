<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ProjectUser extends Pivot
{
    public function reports(){
        return $this->hasMany('App\Report');
    }

    public function project() {
        return $this->belongsTo('\App\Project');
    }

    public function user() {
        return $this->belongsTo('\App\User');
    }
}
