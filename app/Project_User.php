<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project_User extends Model
{
    public function reports(){
        return $this->hasMany('App\Report');
    }
}
