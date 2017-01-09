<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    /*
    * Method, it fill the seeders
    */
    protected $fillable = [
        'days', 'schedule_id'
    ];

    /*
     * Quit the timestamp default
     */
    public $timestamps = false;

    /*
     * schedule function make a object to access
     *      at the Schedule attributes
     */
    public function schedule() {
        return $this->belongsTo('App\Schedule');
    }
}
