<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    /*
     * Identify table migration database
     */
    protected $table = 'docentes';
    /*
     * Method, it fill the seeders
     */
    protected $fillable = [
        'nombre', 'apellido_paterno', 'apellido_materno', 'user_id'
    ];

    /*
     * Quit the timestamp default
     */
    public $timestamps = false;

    public function itinerarios() {
        return $this->hasMany('App\Itinerario');
    }

    public function user() {
        return $this->hasOne('App\User');
    }
}
