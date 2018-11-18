<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluationform extends Model
{
    public function course() {
        return $this->hasOne('App\Course');
    }

    public function creator() {
        return $this->hasOne('App\User');
    }

}
