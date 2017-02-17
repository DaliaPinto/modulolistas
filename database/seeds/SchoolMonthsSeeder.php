<?php

use Illuminate\Database\Seeder;

class SchoolMonthsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1st month
        $list = new \App\SchoolMonth();
        $list->start_date = '2017-01-04';
        $list->end_date = '2017-01-31';
        $list->period_id = 2;
        $list->save();

        //2nd month
        $list = new \App\SchoolMonth();
        $list->start_date = '2017-02-01';
        $list->end_date = '2017-02-28';
        $list->period_id = 2;
        $list->save();

        //Third month
        $list = new \App\SchoolMonth();
        $list->start_date = '2017-03-01';
        $list->end_date = '2017-03-31';
        $list->period_id = 2;
        $list->save();

        //Fourth month
        $list = new \App\SchoolMonth();
        $list->start_date = '2017-04-01';
        $list->end_date = '2017-04-14';
        $list->period_id = 2;
        $list->save();
    }
}
