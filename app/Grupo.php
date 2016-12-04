<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    /*
     * Identify table migration database
     */
    protected $table = 'grupos';

    /*
     * Method, it fill the seeders
     */
    protected $fillable = [
        'turno', 'cuatrimestre', 'grupo'
    ];

    /*
     * Quit the timestamp default
     */
    public $timestamps = false;

    public function itinerarios() {
        return $this->hasMany('App\Itinerario');
    }
}
