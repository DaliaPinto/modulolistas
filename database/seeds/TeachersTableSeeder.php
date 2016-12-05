<?php

use Illuminate\Database\Seeder;

class TeachersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teacher = new \App\Teacher();
        $teacher->name = 'John';
        $teacher->last_name = 'Smith';
        $teacher->second_name = 'G.';
        $teacher->user_id = 1;
        $teacher->save();

        $teacher = new \App\Teacher();
        $teacher->name = 'Mary';
        $teacher->last_name = 'Jones';
        $teacher->second_name = 'H.';
        $teacher->user_id = 2;
        $teacher->save();
    }
}
