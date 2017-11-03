<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = "Province";
    
    public function District() {
        return $this->hasMany('App\Province', 'provinceId', 'id');
    }

    public function Clinic() {
        return $this->hasMany('App\Province', 'provinceId', 'id');
    }
}
