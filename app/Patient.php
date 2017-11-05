<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = "Patient";
    public $timestamps = false;
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
