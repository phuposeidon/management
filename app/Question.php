<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = "Question";
    public $timestamps = false;
    
    public function Patient() {
        return $this->belongsTo('App\Patient', 'patientId', 'id');
    }

    public function Specialization() {
        return $this->belongsTo('App\Specialization', 'specializationId', 'id');
    }

    public function QuestionImage() {
        return $this->hasMany('App\QuestionImage', 'questionId', 'id');
    }

    public function Answer() {
        return $this->hasMany('App\Answer', 'questionId', 'id');
    }

    public function Like() {
        return $this->hasMany('App\Like', 'questionId', 'id');
    }

}
