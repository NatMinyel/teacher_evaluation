<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EvaluationformRole extends Model
{
    public function evaluation_form() {
        return $this->hasOne('App\Evaluationform');
    }


    public function user() {
        return $this->hasOne('App\User');
    }

    public function creator() {
        return $this->hasOne('App\User');
    }
}
