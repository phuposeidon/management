<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = "Answer";
    public $timestamps = false;
    
    public function Patient() {
        return $this->belongsTo('App\Patient', 'patientId', 'id');
    }

    public function User() {
        return $this->belongsTo('App\User', 'doctorId', 'id');
    }

    public function Question() {
        return $this->belongsTo('App\Question', 'questionId', 'id');
    }
}
