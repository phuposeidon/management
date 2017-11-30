<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralIndex extends Model
{
    protected $table = "GeneralIndex";
    
    public function MedicalRecord() {
        return $this->belongsTo('App\MedicalRecord', 'medicalRecordId', 'id');
    }
}
