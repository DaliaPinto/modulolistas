<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Itinerario extends Model
{
    /*
     * Identify table migration database
     */
    protected $table = 'itinerarios';

    /*
     * Method, it fill the seeders
     */
    protected $fillable = [
        'hora_id',
        'docente_id',
        'materia_id',
        'grupo_id',
        'periodo_id',
        'fecha'
    ];

    /*
     * Quit the timestamp default
     */
    public $timestamps = false;

    /*
     * Hora, Docente, Materia, Grupo, Periodo
     *      Docente and TipoUsuario table relationships
     */
    /*public function itinerarios(){
        return $this->hasManyThrough(
            'App\Hora',
            'App\Docente',
            'App\Materia',
            'App\Grupo',
            'App\Periodo'
        );
    }*/

    public function docente() {
        return $this->belongsTo('App\Docente');
    }

    public function periodo() {
        return $this->belongsTo('App\Periodo');
    }

    public function materia() {
        return $this->belongsTo('App\Materia');
    }

    public function grupo() {
        return $this->belongsTo('App\Grupo');
    }

    public function hora() {
        return $this->belongsTo('App\Hora');
    }

}
