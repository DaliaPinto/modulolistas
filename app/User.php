<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'user_type_id'
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
     * Bidirecional teacher relationship
     */
    public function teacher() {
        return $this->hasOne('App\Teacher');
    }
    /*
     * User has a userType relationship
     */
    public function userType(){
        return $this->hasOne('App\UserType');
    }
}
