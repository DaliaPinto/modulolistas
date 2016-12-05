<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    /*
     * Identify table migration database
     */
    protected $table = 'subjects';

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

    public function schedules() {
        return $this->hasMany('App\Schedule');
    }
}