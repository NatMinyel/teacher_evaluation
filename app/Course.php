<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function creator() {
        return $this->hasOne('App\User');
    }
}
