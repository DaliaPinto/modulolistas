<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    /*
     * Method, it fill the seeders
     */
    protected $fillable = [
        'shift', 'quarter', 'group', 'period_id', 'career_id'
    ];

    /*
     * Quit the timestamp default
     */
    public $timestamps = false;

    /*
    * period function make a object to access
    *      at the Period attributes
    */
    public function period(){
        return $this->belongsTo('App\Period');
    }
    /*
    * period function make a object to access
    *      at the Career attributes
    */
    public function career(){
        return $this->belongsTo('App\Career');
    }

    /*
     * Bidirectional relationship with Schedule class
     */
    public function schedules() {
        return $this->hasMany('App\Schedule');
    }

    /*
     * Bidirectional relationship with GroupStudent class
     */
    public function groupStudents() {
        return $this->hasMany('App\GroupStudent');
    }
}
