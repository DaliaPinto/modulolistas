<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incidence extends Model
{
    /*
     * Identify table migration database
     */
    protected $table = 'incidences';

    /*
     * schedule table relationships
     */
    public function schedule(){
        return $this->hasOne('App\Schedule');
    }
}
