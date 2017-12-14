<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = "Post";
    public $timestamps = false;

    public function User() {
        return $this->belongsTo('App\User', 'userId', 'id');
    }

    public function Category() {
        return $this->belongsTo('App\Category', 'categoryId', 'id');
    }
}
