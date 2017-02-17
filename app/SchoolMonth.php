<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolMonth extends Model
{
    /*
     * Method, it fill the seeders
     */
    protected $fillable = [
        'start_date', 'end_date', 'period_id'
    ];

    /*
     * Quit the timestamp default
     */
    public $timestamps = false;

    /*
     * Period relationship with School_Month
     */
    public function period() {
        return $this->belongsTo('App\Period');
    }

    /*
     * Bidirectional relation with Attendances
     *      cause one month needs many attendances
     */
    public function attendances() {
        return $this->hasMany('App\Attendance');
    }
}
