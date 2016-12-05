<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    /*
     * Identify table migration database
     */
    protected $table = 'schedules';

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
     * docente function make a object to access
     *      at the Docente attributes
     */
    public function teacher() {
        return $this->belongsTo('App\Teacher');
    }
    /*
    * periodo function make a object to access
    *      at the periodo attributes
    */
    public function period() {
        return $this->belongsTo('App\Period');
    }
    /*
    * materia function make a object to access
    *      at the Materia attributes
    */
    public function subject() {
        return $this->belongsTo('App\Subject');
    }
    /*
    * grupo function make a object to access
    *      at the Grupo attributes
    */
    public function group() {
        return $this->belongsTo('App\Group');
    }
    /*
    * hora function make a object to access
    *      at the Hora attributes
    */
    public function hour() {
        return $this->belongsTo('App\Hour');
    }

}
