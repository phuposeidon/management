<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $table = "Salary";
    public $timestamps = false;

    public function User() {
        return $this->belongsTo('App\User', 'userId', 'id');
    }

}
