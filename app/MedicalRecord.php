<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    protected $table = "MedicalRecord";
        public $timestamps = false;
    
    public function Order() {
        return $this->hasOne('App\Order', 'medicalRecordId', 'id');
    }

    public function Patient() {
        return $this->belongsTo('App\Patient', 'patientId', 'id');
    }

    public function Clinic() {
        return $this->belongsTo('App\Clinic', 'clinicId', 'id');
    }

    public function User() {
        return $this->belongsTo('App\User', 'doctorId', 'id');
    }

    public function GeneralIndex() {
        return $this->hasOne('App\GeneralIndex', 'medicalRecordId', 'id');
    }
}
