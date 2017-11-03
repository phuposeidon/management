<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insurrance extends Model
{
    protected $table = "Insurrance";
    
    public function Patient() {
        return $this->hasOne('App\Patient', 'patientId', 'id');
    }
}
