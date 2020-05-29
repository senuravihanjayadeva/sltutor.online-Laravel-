<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionBank extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}