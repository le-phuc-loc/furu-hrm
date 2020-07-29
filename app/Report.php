<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{

    protected static $REPORT_CHECKIN = -1;
    protected static $REPORT_DRAW = 0;
    protected static $REPORT_WAITTING = 1;
    protected static $REPORT_ALLOW = 2;

    public static function getReportDraw() {
        return self::$REPORT_DRAW;
    }
    public static function getReportWaitting() {
        return self::$REPORT_WAITTING;
    }
    public static function getReportAllow() {
        return self::$REPORT_ALLOW;
    }
    public static function getReportCheckin() {
        return self::$REPORT_CHECKIN;
    }

    public function project_user(){
        return $this->belongsTo('App\ProjectUser');
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
