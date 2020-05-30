<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravelista\Comments\Commentable;

class QuestionBank extends Model
{

    use Commentable;

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}