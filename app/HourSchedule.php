<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HourSchedule extends Model
{
    /*
     * Method, it fill the seeders
     */
    protected $fillable = [
        'hour_id', 'day_id'
    ];

    /*
     * Hour table relationship
     */
    public function hour(){
        return $this->belongsTo('App\Hour');
    }
    /*
     * Day table relationship
     */
    public function day(){
        return $this->belongsTo('App\Day');
    }
    /*
     * Bidirectional relationship with Attendance class
     */
    public function attendances() {
        return $this->hasMany('App\Attendance');
    }

    /*
     * Quit the timestamp default
     */
    public $timestamps = false;
}
