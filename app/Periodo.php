<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    protected $hidden = [
        'descripcion', 'fecha_inicio', 'fecha_fin'
    ];

    //para no pedir el dato dentro de un seed
    public $timestamps = false;
}
