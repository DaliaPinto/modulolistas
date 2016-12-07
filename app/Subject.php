<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
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
     * Bidirectional relationship with Schedule class
     */
    public function schedules() {
        return $this->hasOne('App\Schedule');
    }
}
