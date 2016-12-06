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
    public function period(){
        return $this->belongsTo('App\Period');
    }
}
