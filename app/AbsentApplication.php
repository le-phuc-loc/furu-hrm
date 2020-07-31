<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AbsentApplication extends Model
{

    protected static $ABSENT_DRAW = 0;
    protected static $ABSENT_WAITTING = 1;
    protected static $ABSENT_ALLOW = 2;

    public static function getAbsentDraw() {
        return self::$ABSENT_DRAW;
    }
    public static function getAbsentWaitting() {
        return self::$ABSENT_WAITTING;
    }
    public static function getAbsentAllow() {
        return self::$ABSENT_ALLOW;
    }



    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getDateOffAttribute($value) {
        return \Carbon\Carbon::parse($this->attributes['date_off'])->format('Y-m-d');
    }




}
