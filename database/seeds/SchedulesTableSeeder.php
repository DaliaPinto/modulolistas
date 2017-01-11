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
        $s->teacher_id= 1;
        $s->subject_id = 1;
        $s->group_id= 1;
        $s->save();

        //save default test data
        $s = new \App\Schedule();
        $s->teacher_id= 2;
        $s->subject_id = 1;
        $s->group_id= 4;
        $s->save();

        //save default test data
        $s = new \App\Schedule();
        $s->teacher_id= 2;
        $s->subject_id = 1;
        $s->group_id= 2;
        $s->save();

        //save default test data
        $s = new \App\Schedule();
        $s->teacher_id= 2;
        $s->subject_id = 1;
        $s->group_id= 3;
        $s->save();

        //save default test data
        $s = new \App\Schedule();
        $s->teacher_id= 1;
        $s->subject_id = 1;
        $s->group_id= 2;
        $s->save();

        $s = new \App\Schedule();
        $s->teacher_id= 2;
        $s->subject_id = 2;
        $s->group_id= 2;
        $s->save();

        //save default test data
        $s = new \App\Schedule();
        $s->teacher_id= 1;
        $s->subject_id = 3;
        $s->group_id= 3;
        $s->save();

    }
}
