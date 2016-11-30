<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Justificacion extends Model
{
    /*
     * Identify table migration database
     */
    protected $table = 'justificaciones';

    /*
     * itinerario table relationships
     */
    public function justificaciones(){
        return $this->hasOne('App\Itinerario');
    }
}
