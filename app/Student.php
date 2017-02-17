<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /*
     * Method, it fill the seeders
     */
    protected $fillable = [
        'id', 'name', 'last_name', 'middle_name', 'status'
    ];

    /*
    * Quit the timestamp default
    */
    public $timestamps = false;

    /*
     * Bidirectional relationship with GroupStudent class
     */
    public function groupStudents() {
        return $this->hasMany('App\GroupStudent');
    }

    /*
     * Bidirectional relationship with Attendance class
     */
    public function attendances() {
        return $this->hasMany('App\Attendance');
    }
}
