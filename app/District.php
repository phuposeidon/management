<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = "District";
    
    public function Province() {
        return $this->belongsTo('App\Province', 'provinceId', 'id');
    }

    public function Clinic() {
        return $this->hasMany('App\Clinic', 'clinicId', 'id');
    }
}
