<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = "Like";
    public $timestamps = false;
    
    public function Patient() {
        return $this->belongsTo('App\Patient', 'patientId', 'id');
    }

    public function Question() {
        return $this->belongsTo('App\Question', 'questionId', 'id');
    }
}
