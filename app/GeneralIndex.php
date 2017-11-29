<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralIndex extends Model
{
    protected $table = "GeneralIndex";
    
    public function Patient() {
        return $this->belongsTo('App\Patient', 'patientId', 'id');
    }
}
