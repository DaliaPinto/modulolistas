<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Itinerario extends Model
{
    protected $fillable = [
        'hora_id', 'docente_id', 'materia_id', 'grupo_id', 'periodo_id', 'fecha'
    ];

    public $timestamps = false;
}
