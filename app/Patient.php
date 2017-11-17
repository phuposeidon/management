<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Patient extends Authenticatable
{
    use Notifiable;

    protected $table = "Patient";
    public $timestamps = false;

    protected $fillable = [
        'fullname', 'username', 'password',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function Appointment() {
        return $this->hasMany('App\Appointment', 'patientId', 'id');
    }

    public function Insurrance() {
        return $this->hasMany('App\Insurrance', 'patientId', 'id');
    }

    public function Order() {
        return $this->hasMany('App\Order', 'patientId', 'id');
    }

    public function TestResult() {
        return $this->hasMany('App\TestResult', 'patientId', 'id');
    }
}
