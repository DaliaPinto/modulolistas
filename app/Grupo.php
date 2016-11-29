<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $hidden = [
        'turno', 'cuatrimestre', 'grupo'
    ];

    //para no pedir el dato dentro de un seed
    public $timestamps = false;
}
