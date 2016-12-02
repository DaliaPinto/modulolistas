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
    public function itinerarios(){
        return $this->hasManyThrough(
            'App\Hora',
            'App\Docente',
            'App\Materia',
            'App\Grupo',
            'App\Periodo'
        );
    }
}
