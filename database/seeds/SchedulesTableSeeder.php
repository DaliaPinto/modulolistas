<?php

use Illuminate\Database\Seeder;

class SchedulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return vosd
     */
    public function run()
    {
        //save default test data
        $s = new \App\Schedule();
        $s->hour_id=1;
        $s->teacher_id= 1;
        $s->subject_id = 1;
        $s->group_id= 1;
        $s->period_id=1;
        $s->day = 1;
        $s->save();

        //save default test data
        $s = new \App\Schedule();
        $s->hour_id=2;
        $s->teacher_id= 2;
        $s->subject_id = 1;
        $s->group_id= 1;
        $s->period_id=1;
        $s->day = 2;
        $s->save();

        //save default test data
        $s = new \App\Schedule();
        $s->hour_id=3;
        $s->teacher_id= 2;
        $s->subject_id = 1;
        $s->group_id= 2;
        $s->period_id=1;
        $s->day = 2;
        $s->save();

        //save default test data
        $s = new \App\Schedule();
        $s->hour_id=3;
        $s->teacher_id= 2;
        $s->subject_id = 1;
        $s->group_id= 2;
        $s->period_id=2;
        $s->day = 3;
        $s->save();

        //save default test data
        $s = new \App\Schedule();
        $s->hour_id=4;
        $s->teacher_id= 2;
        $s->subject_id = 1;
        $s->group_id= 2;
        $s->period_id=2;
        $s->day = 3;
        $s->save();

        //save default test data
        $s = new \App\Schedule();
        $s->hour_id=4;
        $s->teacher_id= 1;
        $s->subject_id = 2;
        $s->group_id= 1;
        $s->period_id=1;
        $s->day = 1;
        $s->save();

        //save default test data
        $s = new \App\Schedule();
        $s->hour_id=4;
        $s->teacher_id= 2;
        $s->subject_id = 2;
        $s->group_id= 1;
        $s->period_id=1;
        $s->day = 4;
        $s->save();

        //save default test data
        $s = new \App\Schedule();
        $s->hour_id=5;
        $s->teacher_id= 1;
        $s->subject_id = 2;
        $s->group_id= 1;
        $s->period_id=2;
        $s->day = 2;
        $s->save();
    }
}
