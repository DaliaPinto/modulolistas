<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupStudent extends Model
{
    /*
     * Identify table migration database
     */
    protected $table = 'group_students';

    /*
     * Method, it fill the seeders
     */
    protected $fillable = [
        'student_id', 'group_id', 'period_id'
    ];

    /*
     * Student table relationship
     */
    public function students(){
        return $this->hasOne('App\Student');
    }
    /*
     * Group table relationship
     */
    public function groups(){
        return $this->hasOne('App\Group');
    }
    /*
     * Group table relationship
     */
    public function periods(){
        return $this->hasOne('App\Period');
    }

    /*
     * Quit the timestamp default
     */
    public $timestamps = false;

}
