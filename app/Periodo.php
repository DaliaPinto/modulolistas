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
    protected $hidden = [
        'descripcion', 'fecha_inicio', 'fecha_fin'
    ];

    /*
     * Quit the timestamp default
     */
    public $timestamps = false;
}
