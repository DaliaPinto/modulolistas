<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    /*
     * Method, it fill the seeders
     */
    protected $fillable = [
        'teacher_id',
        'subject_id',
        'group_id'
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
    * Bidirectional relationship with Days class
    */
    public function days() {
        return $this->hasMany('App\Day');
    }
    /*
     * Bidirectional relationship with HourSchedule class
     */
    public function incidences() {
        return $this->hasMany('App\Incidence');
    }
    /*
     * Bidirectional relationship with HourSchedule class
     */
    public function lists() {
        return $this->hasMany('App\ListAssistance');
    }
}
