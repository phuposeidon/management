<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "Order";
    
    public function Patient() {
        return $this->belongsTo('App\Patient', 'patientId', 'id');
    }

    public function Clinic() {
        return $this->belongsTo('App\Clinic', 'clinicId', 'id');
    }

    public function User() {
        return $this->belongsTo('App\User', 'doctorId', 'id');
    }

    public function OrderMedicine() {
        return $this->hasMany('App\OrderMedicine', 'orderId', 'id');
    }

    public function OrderItem() {
        return $this->hasMany('App\OrderItem', 'orderId', 'id');
    }
}
