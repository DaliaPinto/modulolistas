<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hora extends Model
{
    //Method, it feed the seeders
    protected $fillable = [
        'hora_inicio','hora_fin'
    ];

    //para no pedir el dato dentro de un seed
    public $timestamps = false;
}
