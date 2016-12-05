<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hour extends Model
{
    /*
     * Identify table migration database
     */
    protected $table = 'hours';

    /*
     * Method, it fill the seeders
     */
    protected $fillable = [
        'start_hour','end_hour'
    ];

    /*
     * Quit the timestamp default
     */
    public $timestamps = false;

    public function schedules() {
        return $this->hasMany('App\Schedule');
    }
}