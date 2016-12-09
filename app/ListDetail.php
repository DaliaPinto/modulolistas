<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListDetail extends Model
{
    /*
     * Method, it fill the seeders
     */
    protected $fillable = [
        'star_date',
        'end_date',
        'schedule_id'
    ];

    /*
     * Quit the timestamp default
     */
    public $timestamps = false;

    /*
     * teacher function make a object to access
     *      at the Teacher attributes
     */
    public function schedule() {
        return $this->belongsTo('App\Schedule');
    }
}
