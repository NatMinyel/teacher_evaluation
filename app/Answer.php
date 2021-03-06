<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    public function question() {
        return $this->hasOne('App\Question');
    }

    public function creator() {
        return $this->hasOne('App\User');
    }
}
