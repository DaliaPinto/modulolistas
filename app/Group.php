<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    /*
     * Method, it fill the seeders
     */
    protected $fillable = [
        'shift', 'quarter', 'group'
    ];

    /*
     * Quit the timestamp default
     */
    public $timestamps = false;

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
