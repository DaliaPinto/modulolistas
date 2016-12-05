<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    /*
     * Identify table migration database
     */
    protected $table = 'teachers';
    /*
     * Method, it fill the seeders
     */
    protected $fillable = [
        'name', 'last_name', 'second_name', 'user_id'
    ];

    /*
     * Quit the timestamp default
     */
    public $timestamps = false;

    /*
     * Bidirectional relation with Schedules
     *      cause one schedule needs many teachers
     */
    public function schedules() {
        return $this->hasMany('App\Schedule');
    }
    /*
     * User realtionship with teachers
     */
    public function user() {
        return $this->hasOne('App\User');
    }
}
