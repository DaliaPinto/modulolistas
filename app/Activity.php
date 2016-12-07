<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    /*
     * incidence table relationship
     */
    public function incidences(){
        return $this->hasOne('App\Incidence');
    }
}
