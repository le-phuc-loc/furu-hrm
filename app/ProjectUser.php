<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ProjectUser extends Pivot
{
    public function reports(){
        return $this->hasMany('App\Report');
    }
}
