<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoursSchedule extends Model
{
    /*
    * Method, it fill the seeders
    */
    protected $fillable = [
        'hour_id', 'day_id'
    ];

    /*
     * Quit the timestamp default
     */
    public $timestamps = false;

    /*
     * day function make a object to access
     *      at the Day attributes
     */

    public function day() {
        return $this->belongsTo('App\Day');
    }
    /*
    * hour function make a object to access
    *      at the Hour attributes
    */
    public function hour() {
        return $this->belongsTo('App\Hour');
    }
}
