<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    protected $table = "Clinic";
    
        public function District() {
            return $this->belongsTo('App\District', 'districtId', 'id');
        }
    
        public function Province() {
            return $this->belongsTo('App\Province', 'provinceId', 'id');
        }
    
        public function Speciality() {
            return $this->hasMany('App\Clinic', 'clinicId', 'id');
        }

        public function Appointment() {
            return $this->hasMany('App\Clinic', 'clinicId', 'id');
        }

        public function Order() {
            return $this->hasMany('App\Clinic', 'clinicId', 'id');
        }

        public function Service() {
            return $this->hasMany('App\Clinic', 'clinicId', 'id');
        }

        public function Test() {
            return $this->hasMany('App\Clinic', 'clinicId', 'id');
        }

        public function Medicine() {
            return $this->hasMany('App\Clinic', 'clinicId', 'id');
        }
}
