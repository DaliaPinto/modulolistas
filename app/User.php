<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /*
     * Identify table migration database
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'tipo_usuario_id', 'docente_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /*
     * Quit the timestamp default
     */
    public $timestamps = false;

    /*
     * Docente and TipoUsuario table relationships
     */
    public function users(){
        return $this->hasManyThrough('App\TipoUsuario', 'App\Docente');
    }
}
