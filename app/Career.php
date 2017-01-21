<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    /*
    * Method, it fill the seeders
    */
    protected $fillable = [
        'name'
    ];

    /*
     * Quit the timestamp default
     */
    public $timestamps = false;

    /*
     * Bidirectional relationship with GroupStudent class
     */
    public function groups() {
        return $this->hasMany('App\Group');
    }
}
