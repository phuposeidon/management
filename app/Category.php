<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "Category";
    public $timestamps = false;

    public function Post() {
        return $this->hasMany('App\Post', 'categoryId', 'id');
    }
}
