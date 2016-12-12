<?php

use Illuminate\Database\Seeder;

class ListDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $ld = new \App\ListDetail();
        $ld ->start_date = '2016-08-29';
        $ld ->end_date = '2016-09-30';
        $ld ->period_id = 1;
        $ld ->save();

        $ld = new \App\ListDetail();
        $ld ->start_date = '2016-10-01';
        $ld ->end_date = '2016-10-31';
        $ld ->period_id = 1;
        $ld ->save();

        $ld = new \App\ListDetail();
        $ld ->start_date = '2016-11-01';
        $ld ->end_date = '2016-11-30';
        $ld ->period_id = 1;
        $ld ->save();

        $ld = new \App\ListDetail();
        $ld ->start_date = '2016-12-01';
        $ld ->end_date = '2016-12-31';
        $ld ->period_id = 1;
        $ld ->save();

        //
        $ld = new \App\ListDetail();
        $ld ->start_date = '2017-01-03';
        $ld ->end_date = '2017-01-31';
        $ld ->period_id = 2;
        $ld ->save();

        $ld = new \App\ListDetail();
        $ld ->start_date = '2017-02-01';
        $ld ->end_date = '2017-02-28';
        $ld ->period_id = 2;
        $ld ->save();

        $ld = new \App\ListDetail();
        $ld ->start_date = '2017-03-01';
        $ld ->end_date = '2017-03-31';
        $ld ->period_id = 2;
        $ld ->save();

        $ld = new \App\ListDetail();
        $ld ->start_date = '2017-04-01';
        $ld ->end_date = '2017-04-30';
        $ld ->period_id = 2;
        $ld ->save();


    }
}
