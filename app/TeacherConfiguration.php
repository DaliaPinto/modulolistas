<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeacherConfiguration extends Model
{
    public function teacher() {
        return $this->belongsTo('App/Teacher');
    }
}
