<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model {
    public function creator() {
        return $this->hasOne('App\User');
    }

    public function evaluationform() {
        return $this->hasOne('App\Evaluationform');
    }
}
