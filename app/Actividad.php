<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    /*
     * Identify table migration database
     */
    protected $table = 'actividades';

    /*
     * justificacion table relationships
     */
    public function alumnos(){
        return $this->hasOne('App\Justificacion');
    }
}
