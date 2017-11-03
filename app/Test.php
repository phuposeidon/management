<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $table = "Test";
    
    public function Clinic() {
        return $this->belongsTo('App\Clinic', 'clinicId', 'id');
    }

    public function TestResult() {
        return $this->hasMany('App\TestResult', 'testId', 'id');
    }
}
