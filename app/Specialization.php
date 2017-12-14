<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    public $timestamps = false;
    protected $table = "Specialization";
   
    public function Clinic() {
        return $this->belongsTo('App\Clinic', 'clinicId', 'id');
    }

    public function User() {
        return $this->hasMany('App\User', 'specializationId', 'id');
    }

    public function Question() {
        return $this->hasMany('App\Question', 'specializationId', 'id');
    }

    public function Service() {
        return $this->hasMany('App\Service', 'specializationId', 'id');
    }
}
