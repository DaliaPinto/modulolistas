<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    /*
     * Method, it fill the seeders
     */
    protected $fillable = [
        'schedule_id',
        'student_id',
        'attendance_status',
        'attendance_date'
    ];
    /*
     * Schedule table relationship
     */
    public function schedule(){
        return $this->belongsTo('App\Schedule');
    }
    /*
     * Student table relationship
     */
    public function student(){
        return $this->belongsTo('App\Student');
    }

}
