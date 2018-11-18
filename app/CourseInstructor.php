<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseInstructor extends Model
{

    public function course() {
        return $this->hasOne('App\Course');
    }


    public function instructor() {
        return $this->hasOne('App\User');
    }

    public function creator() {
        return $this->hasOne('App\User');
    }
}
