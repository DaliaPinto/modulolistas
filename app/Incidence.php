<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incidence extends Model
{
    /*
     * schedule table relationships
     */
    public function schedule(){
        return $this->hasOne('App\Schedule');
    }
}
