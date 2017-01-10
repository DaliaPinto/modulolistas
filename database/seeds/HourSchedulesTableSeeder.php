<?php

use Illuminate\Database\Seeder;

class HourSchedulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //day 1
        $h= new \App\HourSchedule();
        $h->hour_id = 1;
        $h->day_id = 1;
        $h->save();
        $h= new \App\HourSchedule();
        $h->hour_id = 2;
        $h->day_id = 1;
        $h->save();

        //day 2
        $h= new \App\HourSchedule();
        $h->hour_id = 2;
        $h->day_id = 2;
        $h->save();
        $h= new \App\HourSchedule();
        $h->hour_id = 3;
        $h->day_id = 2;
        $h->save();

        //day 3
        $h= new \App\HourSchedule();
        $h->hour_id = 4;
        $h->day_id = 3;
        $h->save();
        $h= new \App\HourSchedule();
        $h->hour_id = 5;
        $h->day_id = 3;
        $h->save();

        //day 4
        $h= new \App\HourSchedule();
        $h->hour_id = 6;
        $h->day_id = 4;
        $h->save();
        $h= new \App\HourSchedule();
        $h->hour_id = 7;
        $h->day_id = 4;
        $h->save();
        $h= new \App\HourSchedule();
        $h->hour_id = 8;
        $h->day_id = 4;
        $h->save();

        //day 5
        $h= new \App\HourSchedule();
        $h->hour_id = 3;
        $h->day_id = 5;
        $h->save();
        $h= new \App\HourSchedule();
        $h->hour_id = 4;
        $h->day_id = 5;
        $h->save();

        //day 6
        $h= new \App\HourSchedule();
        $h->hour_id = 5;
        $h->day_id = 6;
        $h->save();
        $h= new \App\HourSchedule();
        $h->hour_id = 6;
        $h->day_id = 6;
        $h->save();

        //day 7
        $h= new \App\HourSchedule();
        $h->hour_id = 6;
        $h->day_id = 7;
        $h->save();

        //day 8
        $h= new \App\HourSchedule();
        $h->hour_id = 1;
        $h->day_id = 8;
        $h->save();

        //day 9
        $h= new \App\HourSchedule();
        $h->hour_id = 2;
        $h->day_id = 9;
        $h->save();
        $h= new \App\HourSchedule();
        $h->hour_id = 3;
        $h->day_id = 9;
        $h->save();

        //day 10
        $h= new \App\HourSchedule();
        $h->hour_id = 4;
        $h->day_id = 10;
        $h->save();
        $h= new \App\HourSchedule();
        $h->hour_id = 5;
        $h->day_id = 10;
        $h->save();

        //day 11
        $h= new \App\HourSchedule();
        $h->hour_id = 6;
        $h->day_id = 11;
        $h->save();
        $h= new \App\HourSchedule();
        $h->hour_id = 7;
        $h->day_id = 11;
        $h->save();
    }
}
