<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = "Feedback";
    public $timestamps = false;

    public function User() {
        return $this->belongsTo('App\User', 'doctorId', 'id');
    }

    public function Patient() {
        return $this->belongsTo('App\Patient', 'patientId', 'id');
    }
}
