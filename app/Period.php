<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    /*
     * Method, it fill the seeders
     */
    protected $fillable = [
         'start_date', 'end_date', 'description', 'first_month_end', 'last_month_start'
    ];

    /*
     * Quit the timestamp default
     */
    public $timestamps = false;

    /*
     * Bidirectional relationship with Schedule class
     */
    public function groups() {
        return $this->hasMany('App\Group');
    }

    /*
     * Bidirectional relationship with GroupStudent class
     */
    public function months() {
        return $this->hasMany('App\School_Months');
    }
}
