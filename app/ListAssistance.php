<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListAssistance extends Model
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
     * Bidirectional relationship with Schedule class
     */
    public function period() {
        return $this->belongsTo('App\Period');
    }
    /*
     * Bidirectional relationship with HourSchedule class
     */
    public function groups() {
        return $this->hasMany('App\GroupStudent');
    }
}
