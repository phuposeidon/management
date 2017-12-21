<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "Order";
     public $timestamps = false;

    public function OrderMedicine() {
        return $this->hasMany('App\OrderMedicine', 'orderId', 'id');
    }

    public function MedicalRecord() {
        return $this->belongsTo('App\MedicalRecord', 'medicalRecordId', 'id');
    }

    public function Transaction() {
        return $this->hasOne('App\Transaction', 'orderId', 'id');
    }

    public function OrderService() {
        return $this->hasMany('App\OrderService', 'orderId', 'id');
    }

    public function Patient() {
        return $this->belongsTo('App\Patient', 'patientId', 'id');
    }
}
