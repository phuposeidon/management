<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    protected $table = "MedicalRecord";
    
    public function Order() {
        return $this->belongsTo('App\Order', 'orderId', 'id');
    }

}
