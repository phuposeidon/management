<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderMedicine extends Model
{
    protected $table = "OrderMedicine";
         public $timestamps = false;
    
    public function Order() {
        return $this->belongsTo('App\Order', 'orderId', 'id');
    }

    public function Medicine() {
        return $this->belongsTo('App\Medicine', 'medicineId', 'id');
    }

}
