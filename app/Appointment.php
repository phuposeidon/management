<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = "Appointment";

    public function Patient() {
        return $this->belongsTo('App\Patient', 'patientId', 'id');
    }

    public function Clinic() {
        return $this->belongsTo('App\Clinic', 'clinicId', 'id');
    }

    public function User() {
        return $this->belongsTo('App\User', 'doctorId', 'id');
    }
}
