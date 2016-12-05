<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    /*
     * Identify table migration database
     */
    protected $table = 'groups';

    /*
     * Method, it fill the seeders
     */
    protected $fillable = [
        'shift', 'quarter', 'group'
    ];

    /*
     * Quit the timestamp default
     */
    public $timestamps = false;
    /*
     * Bidirectional relationship with Schedule class
     */
    public function schedules() {
        return $this->hasMany('App\Schedule');
    }
}
