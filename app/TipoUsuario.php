<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
    protected $fillable = [
        'id', 'descripcion'
    ];

    public $timestamps = false;
}
