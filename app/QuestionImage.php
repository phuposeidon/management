<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionImage extends Model
{
    protected $table = "QuestionImage";

    public function Question() {
        return $this->hasMany('App\Question', 'questionId', 'id');
    }
}
