<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Support\Facades\DB;

use \Carbon\Carbon;


class User extends Authenticatable
{
    use  Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    // protected $appends = ['time_working'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function projects(){
        return $this->belongsToMany('App\Project')->withTimestamps()->using('App\ProjectUser');
    }

    public function manage() {
        return $this->HasMany('App\Project', 'managed', 'id');
    }

    public function absentApplication(){
        return $this->hasMany('App\AbsentApplication','user_id','id');
    }

    // public function sum_day_off(){
    //     return $this->hasMany('App\AbsentApplication')
    //         ->selectRaw("SUM(number_off) as num_day_off")
    //         ->groupBy('user_id');
    // }


    public function project_user() {
        return $this->hasMany('\App\ProjectUser');
    }




    public function reports() {
        return $this->hasManyThrough(
            '\App\Report',
            '\App\ProjectUser',
            'user_id',
            'project_user_id',
            'id',
            'id'
        );
    }

    // function getTimeWorkingAttribute() {
    //     return $this->reports->pluck('time_working')->sum();
    // }

    function time_working($project_id = null) {

        if($project_id != null) {
            $time = 0;
            $project_user_id = DB::table('project_user')
                ->where('project_id', $project_id)
                ->where('user_id', $this->id)
                ->first();


            // dd($project_user_id);
            if ($project_user_id) {

                $time = DB::table('reports')
                ->where('project_user_id', $project_user_id->id)
                ->get()
                ->pluck('time_working')
                ->sum();
                // echo "  meo   ".$project_user_id->id;
                return $time;
            }
            return $time;
            // dd($time);
        }


        return $this->reports->pluck('time_working')->sum();
    }

    function time_absent($month = null, $session = null) {

        if ($month != null) {
            // echo "meoemoeoe";
            $time = 0;
            $month_compare = Carbon::createFromFormat('m', $month);
            // dd($month_compare->startOfMonth());
            foreach($this->absentApplication as $absent) {
                // $time = 0;
                $start = Carbon::parse($absent->date_off_start);
                $end = Carbon::parse($absent->date_off_end);
                if ($start->gte($month_compare->startOfMonth()) &&
                    $end->lte($month_compare->endOfMonth())
                ) {
                        $time += $absent->number_off;
                }
                else if (
                    $start->lte($month_compare->startOfMonth()) &&
                    $end->lte($month_compare->endOfMonth()) &&
                    ($end->month == $month || $start->month == $month)
                ) {
                    $time += $end->diffInDays($month_compare->startOfMonth());
                }
                else if (
                    $start->gte($month_compare->startOfMonth()) &&
                    $end->gte($month_compare->endOfMonth()) &&
                    ($end->month == $month || $start->month == $month)
                ){
                    $time += $month_compare->endOfMonth()->diffInDays($start);
                    // echo "-----".$time."-----";
                }
                else {
                    continue;
                }
                // echo $time."--";
            }

            return $time;
        }

        if ($session != null) {
            $start_session = $this->getStartSession($session);
            $end_session = $this->getEndSession($session);
            // echo $start_session."----".$end_session;
            $time = 0;
            foreach($this->absentApplication as $absent) {
                // $time = 0;

                $start = Carbon::parse($absent->date_off_start);
                $end = Carbon::parse($absent->date_off_end);
                // dd ($start->gte($start_session) && $end->lte($end_session));
                if ($start->gte($start_session) &&
                    $end->lte($end_session)
                ) {
                    $time += $absent->number_off;
                    // echo 'meo';
                }
                else if (
                    $start->lte($start_session) &&
                    $end->lte($end_session) &&
                    ($end->month >= $start_session->month && $end->month <= $end_session->month)
                ) {
                    $time += $end->diffInDays($start_session);
                    // echo 'meo meo';
                }
                else if (
                    $start->gte($start_session) &&
                    $end->gte($end_session) &&
                    ($start->month >= $start_session->month && $start->month <= $end_session->month)
                ){
                    $time += $end_session->diffInDays($start);

                    // echo "-----".$time."-----";
                }
                else {
                    continue;
                }
                // echo $time."--";
            }

            return $time;
        }



        return $this->absentApplication->pluck('number_off')->sum();
    }

    function getStartSession($session) {

        $start = null;

        if ($session == 1) {
            $start = Carbon::createFromFormat('m', 1)->startOfMonth();
        }
        if ($session == 2) {
            $start = Carbon::createFromFormat('m', 4)->startOfMonth();
        }
        if ($session == 3) {
            $start = Carbon::createFromFormat('m', 7)->startOfMonth();
        }
        if ($session == 4) {
            $start = Carbon::createFromFormat('m', 10)->startOfMonth();
        }

        return $start;
    }

    function getEndSession($session) {

        $end = null;

        if ($session == 1) {
            $end = Carbon::createFromFormat('m', 3)->endOfMonth();
        }
        if ($session == 2) {
            $end = Carbon::createFromFormat('m', 6)->endOfMonth();
        }
        if ($session == 3) {
            $end = Carbon::createFromFormat('m', 9)->endOfMonth();
        }
        if ($session == 4) {
            $end = Carbon::createFromFormat('m', 12)->endOfMonth();
        }

        return $end;
    }

    // public function time_working() {
    //     return $this->hasManyThrough(
    //         '\App\Report',
    //         '\App\ProjectUser',
    //         'user_id',
    //         'project_user_id',
    //         'id',
    //         'id'
    //     )
    //     ->leftJoin('project_user', 'users.id', "=", "project_user.user_id")
    //     ->selectRaw('sum(TIMESTAMPDIFF(hour, time_checkin, time_checkout)) as time_working, user_id')
    //     ->groupBy('user_id');
    // }



}
