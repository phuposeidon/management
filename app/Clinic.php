<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    protected $table = "Clinic";
   
        public function Specialization() {
            return $this->hasMany('App\Specialization', 'clinicId', 'id');
        }

        public function Appointment() {
            return $this->hasMany('App\Appointment', 'clinicId', 'id');
        }

        public function Order() {
            return $this->hasMany('App\Order', 'clinicId', 'id');
        }

        public function Service() {
            return $this->hasMany('App\Service', 'clinicId', 'id');
        }

        public function Medicine() {
            return $this->hasMany('App\Medicine', 'clinicId', 'id');
        }
}
