<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    /*
     * Identify table migration database
     */
    protected $table = 'asistencias';

    /*
     * Alumno and itinerarios and alumnos
     *         table relationships
     */
    public function asistencias(){
        return $this->hasManyThrough('App\Itinerario', 'App\Alumno');
    }
}
