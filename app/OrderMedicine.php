<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderMedicine extends Model
{
    protected $table = "OrderMedicine";
    
    public function Order() {
        return $this->belongsTo('App\Order', 'orderId', 'id');
    }

    public function Medicine() {
        return $this->hasOne('App\Medicine', 'medicineId', 'id');
    }

}
