<?php

use Illuminate\Database\Seeder;

class PeriodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $period = new \App\Period();
        $period->description = 'Septiembre-Diciembre 2016';
        $period->start_date ='2016-09-12';
        $period->end_date = '2016-12-16';
        $period->first_month_start ='2016-09-12';
        $period->last_month_end ='2016-09-16';
        $period->save();

        $period = new \App\Period();
        $period->description = 'Enero-Abril 2017';
        $period->start_date ='2017-01-04';
        $period->end_date = '2017-04-14';
        $period->first_month_start ='2017-01-04';
        $period->last_month_end ='2017-04-14';
        $period->save();
    }
}
