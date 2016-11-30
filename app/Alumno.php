<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    /*
     * Identify table migration database
     */
    protected $table = 'alumnos';

    /*
     * grupo table relationships
     */
    public function alumnos(){
        return $this->hasOne('App\Grupo');
    }

}
