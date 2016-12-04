<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    /*
     * Identify table migration database
     */
    protected $table = 'periodos';

    /*
     * Method, it fill the seeders
     */
    protected $fillable = [
        'descripcion', 'fecha_inicio', 'fecha_fin'
    ];


    /*
     * Quit the timestamp default
     */
    public $timestamps = false;

    public function itinerario() {
        return $this->hasMany('App\Itinerario');
    }
}
