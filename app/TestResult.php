<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestResult extends Model
{
    protected $table = "TestResult";
    
    public function Patient() {
        return $this->belongsTo('App\Patient', 'patientId', 'id');
    }

    public function Test() {
        return $this->belongsTo('App\Test', 'testId', 'id');
    }

    public function Service() {
        return $this->hasOne('App\Service', 'serviceId', 'id');
    }

    public function OrderItem() {
        return $this->hasOne('App\OrderItem', 'testResultId', 'id');
    }
}
