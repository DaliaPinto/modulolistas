<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    /*
     * Identify table migration database
     */
    protected $table = 'user_types';

    /*
     * Method, it fill the seeders
     */
    protected $fillable = [
        'description'
    ];

    /*
     * Quit the timestamp default
     */
    public $timestamps = false;
}
