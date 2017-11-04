<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $table = "Medicine";
   
    public function Clinic() {
        return $this->belongsTo('App\Clinic', 'clinicId', 'id');
    }

    public function Unit() {
        return $this->belongsTo('App\Unit', 'unitId', 'id');
    }

    public function OrderMedicine() {
        return $this->hasOne('App\OrderMedicine', 'medicineId', 'id');
    }

}
