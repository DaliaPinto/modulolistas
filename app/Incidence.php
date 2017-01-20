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
        'schedule_id'
    ];
    /*
     * schedule table relationships
     */
    public function schedule(){
        return $this->hasOne('App\Schedule');
    }
    /*
     * Quit the timestamp default
     */
    public $timestamps = false;
}
