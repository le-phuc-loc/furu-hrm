<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Model;

class ProjectUser extends Pivot
{

    protected $table = 'project_user';

    public function reports(){
        return $this->hasMany('App\Report', 'project_user_id', 'id');
    }
}
