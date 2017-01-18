<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incidence extends Model
{
    /*
    * Method, it fill the seeders
    */
    protected $fillable = [
        'incidence_type',
        'date',
        'description',
        'activity',
        'day_id'
    ];
    /*
     * schedule table relationships
     */
    public function day(){
        return $this->hasOne('App\Day');
    }
    /*
     * Quit the timestamp default
     */
    public $timestamps = false;
}
