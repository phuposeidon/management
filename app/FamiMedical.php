<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FamiMedical extends Model
{
    protected $table = "FamiMedical";

    public function Patient() {
        return $this->belongsTo('App\Patient', 'patientId', 'id');
    }
}
