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

    public function Insurance() {
        return $this->hasMany('App\Insurance', 'patientId', 'id');
    }

    public function Order() {
        return $this->hasMany('App\Order', 'patientId', 'id');
    }

    public function MedicalRecord() {
        return $this->hasMany('App\MedicalRecord', 'patientId', 'id');
    }

    public function PatientMedical() {
        return $this->hasMany('App\PatientMedical', 'patientId', 'id');
    }

    public function FamiMedical() {
        return $this->hasMany('App\FamiMedical', 'patientId', 'id');
    }

    public function GeneralIndex() {
        return $this->hasMany('App\GeneralIndex', 'patientId', 'id');
    }
}
