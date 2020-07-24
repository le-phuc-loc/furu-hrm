<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
<<<<<<< HEAD
    //
=======
    public function project_user(){
        return $this->belongsTo('App\Project_User');
    }
    public function location_check_in()
    {
        return $this->hasOne('App\Location','report_id','location_id');
    }
    public function location_check_out()
    {
        return $this->hasOne('App\Location', 'report_id', 'location_id');
    }
>>>>>>> cbc90acd2fb3996c86688cff41040abced0e036b
}
