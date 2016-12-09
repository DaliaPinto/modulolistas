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
        $ld = new \App\ListDetail();
        $ld ->start_date = '2016-08-29';
        $ld ->end_date = '2016-09-30';
        $ld ->schedule_id = 2;
        $ld ->save();

        $ld = new \App\ListDetail();
        $ld ->start_date = '2016-10-01';
        $ld ->end_date = '2016-10-31';
        $ld ->schedule_id = 2;
        $ld ->save();

        $ld = new \App\ListDetail();
        $ld ->start_date = '2016-11-01';
        $ld ->end_date = '2016-11-30';
        $ld ->schedule_id = 2;
        $ld ->save();

        $ld = new \App\ListDetail();
        $ld ->start_date = '2016-12-01';
        $ld ->end_date = '2016-12-31';
        $ld ->schedule_id = 2;
        $ld ->save();


        $ld = new \App\ListDetail();
        $ld ->start_date = '2016-08-29';
        $ld ->end_date = '2016-09-30';
        $ld ->schedule_id = 1;
        $ld ->save();

        $ld = new \App\ListDetail();
        $ld ->start_date = '2016-10-01';
        $ld ->end_date = '2016-10-31';
        $ld ->schedule_id = 1;
        $ld ->save();

        $ld = new \App\ListDetail();
        $ld ->start_date = '2016-11-01';
        $ld ->end_date = '2016-11-30';
        $ld ->schedule_id = 1;
        $ld ->save();

        $ld = new \App\ListDetail();
        $ld ->start_date = '2016-12-01';
        $ld ->end_date = '2016-12-31';
        $ld ->schedule_id = 1;
        $ld ->save();
    }
}
