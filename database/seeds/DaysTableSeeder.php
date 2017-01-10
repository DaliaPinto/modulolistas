<?php

use Illuminate\Database\Seeder;

class DaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //day 3, schedule 1
        $day= new \App\Day();
        $day->day = 3;
        $day->schedule_id = 1;
        $day->save();
        //day 1 schedule 1
        $day= new \App\Day();
        $day->day = 1;
        $day->schedule_id = 1;
        $day->save();

        //day 3 schedule 2
        $day= new \App\Day();
        $day->day = 3;
        $day->schedule_id = 2;
        $day->save();
        //day 4 schedule 2
        $day= new \App\Day();
        $day->day = 4;
        $day->schedule_id = 2;
        $day->save();

        //day 5 schedule 3
        $day= new \App\Day();
        $day->day = 5;
        $day->schedule_id = 3;
        $day->save();
        //day 4 schedule 3
        $day= new \App\Day();
        $day->day = 4;
        $day->schedule_id = 3;
        $day->save();

        //day 1 schedule 4
        $day= new \App\Day();
        $day->day = 1;
        $day->schedule_id = 4;
        $day->save();

        //day 3 schedule 5
        $day= new \App\Day();
        $day->day = 3;
        $day->schedule_id = 5;
        $day->save();

        //day 2 schedule 6
        $day= new \App\Day();
        $day->day = 2;
        $day->schedule_id = 6;
        $day->save();

        //day 2 schedule 7
        $day= new \App\Day();
        $day->day = 2;
        $day->schedule_id = 7;
        $day->save();
        //day 1 schedule 7
        $day= new \App\Day();
        $day->day = 1;
        $day->schedule_id = 7;
        $day->save();
    }
}
