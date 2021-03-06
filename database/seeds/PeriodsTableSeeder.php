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
        $period->start_date ='2016-08-29';
        $period->end_date = '2016-12-31';
        $period->first_month_end ='2016-09-16';
        $period->last_month_start ='2016-12-01';
        $period->save();

        $period = new \App\Period();
        $period->description = 'Enero-Abril 2017';
        $period->start_date ='2017-01-04';
        $period->end_date = '2017-04-14';
        $period->first_month_end ='2017-01-31';
        $period->last_month_start ='2017-04-01';
        $period->save();

        $period = new \App\Period();
        $period->description = 'Mayo-Agosto 2017';
        $period->start_date ='2017-05-02';
        $period->end_date = '2017-08-18';
        $period->first_month_end ='2017-05-31';
        $period->last_month_start ='2017-08-01';
        $period->save();
    }
}
