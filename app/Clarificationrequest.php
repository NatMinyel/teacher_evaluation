<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clarificationrequest extends Model
{
    public function evaluation_form() {
        return $this->hasOne('App\Evaluationform');
    }

    public function creator() {
        return $this->hasOne('App\User');
    }
}
