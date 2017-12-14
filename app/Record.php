<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $table = "Record";
        public $timestamps = false;
    
    public function User() {
        return $this->belongsTo('App\User', 'doctorId', 'id');
    }
}
