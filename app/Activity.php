<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    /*
     * Identify table migration database
     */
    protected $table = 'activities';

    /*
     * incidence table relationships
     */
    public function incidences(){
        return $this->hasOne('App\Incidence');
    }
}
