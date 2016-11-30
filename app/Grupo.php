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
    protected $hidden = [
        'turno', 'cuatrimestre', 'grupo'
    ];

    /*
     * Quit the timestamp default
     */
    public $timestamps = false;
}
