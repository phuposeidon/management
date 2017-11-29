<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientMedical extends Model
{
    protected $table = "PatientMedical";
    
    public function Patient() {
        return $this->belongsTo('App\Patient', 'patientId', 'id');
    }
}
