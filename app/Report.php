<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected static $REPORT_CREATED = -2;
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

    public static function getReportCreated() {
        return self::$REPORT_CREATED;
    }

    public function project_user(){
        return $this->belongsTo('App\ProjectUser');
    }
    public function location_checkin()
    {
        return $this->belongsTo('App\Location','location_check_in');
    }
    public function location_checkout()
    {
        return $this->belongsTo('App\Location','location_check_out');
    }


    public function getTimeCheckinAttribute($value) {
        return \Carbon\Carbon::parse($this->attributes['time_checkin'])->format('H:i');
    }

    public function getTimeCheckoutAttribute($value) {
        return \Carbon\Carbon::parse($this->attributes['time_checkout'])->format('H:i');
    }




}
