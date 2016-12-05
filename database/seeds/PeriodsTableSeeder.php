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
        $period->description = 'septiembre-diciembre';
        $period->start_date ='2016-09-12';
        $period->end_date = '2016-12-10';
        $period->save();

        $period = new \App\Period();
        $period->description = 'enero-abril';
        $period->start_date ='2017-01-02';
        $period->end_date = '2017-04-14';
        $period->save();
    }
}
