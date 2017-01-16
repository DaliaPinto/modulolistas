<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    /*
     * Method, it fill the seeders
     */
    protected $fillable = [
        'hour_schedule_id',
        'student_id',
        'attendance_status',
        'attendance_date'
    ];
    /*
     * Schedule table relationship
     */
    public function hour(){
        return $this->belongsTo('App\Hour_Schedule');
    }
    /*
     * Student table relationship
     */
    public function student(){
        return $this->belongsTo('App\Student');
    }

}
