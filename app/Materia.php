<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    /*
     * Identify table migration database
     */
    protected $table = 'materias';

    /*
     * Method, it fill the seeders
     */
    protected $fillable = [
        'name'
    ];

    /*
     * Quit the timestamp default
     */
    public $timestamps = false;
}
