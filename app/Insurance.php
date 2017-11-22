<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    protected $table = "Insurance";
    public $timestamps = false;
    
    public function Patient() {
        return $this->hasOne('App\Patient', 'patientId', 'id');
    }
}
