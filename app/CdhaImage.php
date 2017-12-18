<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CDHAImage extends Model
{
    protected $table = "CDHAImage";
    public $timestamps = false;

    public function Question() {
        return $this->hasMany('App\CDHA', 'cdhaId', 'id');
    }
}
