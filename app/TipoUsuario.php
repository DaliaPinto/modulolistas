<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
    /*
     * Identify table migration database
     */
    protected $table = 'tipo_usuarios';

    /*
     * Method, it fill the seeders
     */
    protected $fillable = [
        'id', 'descripcion'
    ];

    /*
     * Quit the timestamp default
     */
    public $timestamps = false;
}
