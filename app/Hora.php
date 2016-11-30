<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hora extends Model
{
    /*
     * Identify table migration database
     */
    protected $table = 'horas';

    /*
     * Method, it fill the seeders
     */
    protected $fillable = [
        'hora_inicio','hora_fin'
    ];

    /*
     * Quit the timestamp default
     */
    public $timestamps = false;
}
