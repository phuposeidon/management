<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderService extends Model
{
    protected $table = "OrderService";
    
    public function Order() {
        return $this->belongsTo('App\Order', 'orderId', 'id');
    }

    public function Service() {
        return $this->belongsTo('App\Service', 'serviceId', 'id');
    }

}
