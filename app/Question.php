<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function evaluatuion_form() {
        return $this->hasOne('App\Evaluationform');
    }

    public function creator() {
        return $this->hasOne('App\User');
    }
}
