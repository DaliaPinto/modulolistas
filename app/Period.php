<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    /*
     * Identify table migration database
     */
    protected $table = 'periods';

    /*
     * Method, it fill the seeders
     */
    protected $fillable = [
        'description', 'start_date', 'end_date'
    ];


    /*
     * Quit the timestamp default
     */
    public $timestamps = false;

    public function schedules() {
        return $this->hasMany('App\Schedule');
    }
}
