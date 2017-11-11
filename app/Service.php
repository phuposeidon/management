<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = "Service";
    
    public function Clinic() {
        return $this->belongsTo('App\Clinic', 'clinicId', 'id');
    }

    public function TestResult() {
        return $this->hasOne('App\TestResult', 'serviceId', 'id');
    }

    public function User() {
        return $this->belongsTo('App\User', 'executeById', 'id');
    }
}
