<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    /*
     * Method, it fill the seeders
     */
    protected $fillable = [
        'hour_id',
        'teacher_id',
        'subject_id',
        'group_id',
        'period_id',
        'day'
    ];

    /*
     * Quit the timestamp default
     */
    public $timestamps = false;

    /*
     * teacher function make a object to access
     *      at the Teacher attributes
     */
    public function teacher() {
        return $this->belongsTo('App\Teacher');
    }
    /*
    * period function make a object to access
    *      at the Period attributes
    */
    public function period() {
        return $this->belongsTo('App\Period');
    }
    /*
    * subject function make a object to access
    *      at the Subject attributes
    */
    public function subject() {
        return $this->belongsTo('App\Subject');
    }
    /*
    * group function make a object to access
    *      at the Group attributes
    */
    public function group() {
        return $this->belongsTo('App\Group');
    }
    /*
    * hour function make a object to access
    *      at the Hour attributes
    */
    public function hour() {
        return $this->belongsTo('App\Hour');
    }
    /*
     * Bidirectional relationship with Attendance class
     */
    public function attendances() {
        return $this->hasMany('App\Attendance');
    }
    /**
     * Bidirectional relationship with ListDetail class
     * cause one schedule, has many months to take attendance.
     */
    public function listDetails() {
        return $this->hasMany('App\ListDetail');
    }


}
