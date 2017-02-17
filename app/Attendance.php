<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    /*
     * Method, it fill the seeders
     */
    protected $fillable = [
        'status',
        'student_id',
        'school_month_id',
        'hour_schedule_id'
    ];
    /*
     * HourSchedule table relationship
     */
    public function hour(){
        return $this->belongsTo('App\HourSchedule');
    }
    /*
     * Student table relationship
     */
    public function student(){
        return $this->belongsTo('App\Student');
    }
    /*
     * Month table relationship
     */
    public function month(){
        return $this->belongsTo('App\School_Month');
    }

}
