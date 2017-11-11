<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = "Transaction";
    
    public function Order() {
        return $this->hasOne('App\Order', 'orderId', 'id');
    }

    public function User() {
        return $this->belongsTo('App\User', 'createdById', 'id');
    }

}
