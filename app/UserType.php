<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
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
