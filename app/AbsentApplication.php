<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AbsentApplication extends Model
{

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
