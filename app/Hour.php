<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hour extends Model
{
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

    /*
     * Bidirectional relationship with HourSchedule class
     */
    public function hours() {
        return $this->hasMany('App\HourSchedule');
    }
}
