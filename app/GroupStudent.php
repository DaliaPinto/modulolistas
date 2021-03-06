<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupStudent extends Model
{
    /*
     * Method, it fill the seeders
     */
    protected $fillable = [
        'student_id', 'group_id'
    ];

    /*
     * Student table relationship
     */
    public function student(){
        return $this->belongsTo('App\Student');
    }
    /*
     * Group table relationship
     */
    public function group(){
        return $this->belongsTo('App\Group');
    }

    /*
     * Group table relationship
     */
    public function listAssistance(){
        return $this->belongsTo('App\ListAssistance');
    }

    /*
     * Quit the timestamp default
     */
    public $timestamps = false;

}
