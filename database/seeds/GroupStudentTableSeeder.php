<?php

use Illuminate\Database\Seeder;

class GroupStudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Provisional
        $gs = new \App\GroupStudent();
        $gs->student_id = '0314104733';
        $gs->group_id=1;
        $gs->period_id=1;
        $gs->save();

        $gs = new \App\GroupStudent();
        $gs->student_id = '0314106734';
        $gs->group_id=1;
        $gs->period_id=1;
        $gs->save();

        $gs = new \App\GroupStudent();
        $gs->student_id = '0314106735';
        $gs->group_id=2;
        $gs->period_id=1;
        $gs->save();

        $gs = new \App\GroupStudent();
        $gs->student_id = '0314104636';
        $gs->group_id=1;
        $gs->period_id=1;
        $gs->save();

        $gs = new \App\GroupStudent();
        $gs->student_id = '0314103437';
        $gs->group_id=2;
        $gs->period_id=1;
        $gs->save();

        $gs = new \App\GroupStudent();
        $gs->student_id = '0314101938';
        $gs->group_id=1;
        $gs->period_id=1;
        $gs->save();

        $gs = new \App\GroupStudent();
        $gs->student_id = '0314104039';
        $gs->group_id=2;
        $gs->period_id=1;
        $gs->save();

        $gs = new \App\GroupStudent();
        $gs->student_id = '0314104440';
        $gs->group_id=1;
        $gs->period_id=1;
        $gs->save();

        $gs = new \App\GroupStudent();
        $gs->student_id = '0314101335';
        $gs->group_id=2;
        $gs->period_id=1;
        $gs->save();
    }
}
