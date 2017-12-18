<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = "User";
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'name', 'email', 'password',
    // ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function Transaction() {
        return $this->hasMany('App\Transaction', 'createdById', 'id');
    }

    public function Order() {
        return $this->hasMany('App\Order', 'doctorId', 'id');
    }

    public function Specialization() {
        return $this->belongsTo('App\Specialization', 'specializationId', 'id');
    }

    public function Appointment() {
        return $this->hasMany('App\Appointment', 'doctorId', 'id');
    }

    public function Answer() {
        return $this->hasMany('App\Answer', 'doctorId', 'id');
    }

    public function Post() {
        return $this->hasMany('App\Post', 'userId', 'id');
    }

}
