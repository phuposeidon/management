<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $table = "Unit";
    
    public function Medicine() {
        return $this->belongsTo('App\Medicine', 'unitId', 'id');
    }
}
