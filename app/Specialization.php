<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    protected $table = "Specialization";
   
    public function Clinic() {
        return $this->belongsTo('App\Clinic', 'clinicId', 'id');
    }

    public function User() {
        return $this->hasMany('App\User', 'specializationId', 'id');
    }
}
