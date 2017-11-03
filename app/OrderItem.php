<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = "OrderItem";

    public function Order() {
        return $this->belongsTo('App\Order', 'orderId', 'id');
    }

    public function TestResult() {
        return $this->belongsTo('App\TestResult', 'testResultId', 'id');
    }

}
