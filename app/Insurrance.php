<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insurrance extends Model
{
    protected $table = "Insurrance";
    public $timestamps = false;
    public function Patient() {
        return $this->hasOne('App\Patient', 'patientId', 'id');
    }
}
