<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /*
     * Identify table migration database
     */
    protected $table = 'group_students';

    /*
     * Method, it fill the seeders
     */
    protected $fillable = [
        'id', 'name', 'last_name', 'second_name'
    ];

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
