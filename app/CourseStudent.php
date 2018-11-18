<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseStudent extends Model
{
    public function course() {
        return $this->hasOne('App\Course');
    }


    public function student() {
        return $this->hasOne('App\User');
    }

    public function creator() {
        return $this->hasOne('App\User');
    }
}
