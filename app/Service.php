<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = "Service";
    public $timestamps = false;
    
    public function Clinic() {
        return $this->belongsTo('App\Clinic', 'clinicId', 'id');
    }

    public function User() {
        return $this->belongsTo('App\User', 'executedById', 'id');
    }

    public function OrderService() {
        return $this->hasMany('App\OrderService', 'serviceId', 'id');
    }
}
