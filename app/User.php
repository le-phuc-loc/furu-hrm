<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

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
        return $this->hasMany('App\AbsentApplication');
    }

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
}
