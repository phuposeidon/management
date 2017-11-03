<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    protected $table = "Speciality";
   
    public function Clinic() {
        return $this->belongsTo('App\Clinic', 'clinicId', 'id');
    }

    public function User() {
        return $this->hasMany('App\User', 'specialityId', 'id');
    }
}
