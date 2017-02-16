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
        $teacher->name = 'Armida';
        $teacher->last_name = 'Caballero';
        $teacher->middle_name = 'Barragan';
        $teacher->user_id = 1;
        $teacher->save();

        $teacher = new \App\Teacher();
        $teacher->name = 'María Rebeca';
        $teacher->last_name = 'Rivera';
        $teacher->middle_name = 'Martínez';
        $teacher->user_id = 2;
        $teacher->save();

        $teacher = new \App\Teacher();
        $teacher->name = 'Laura';
        $teacher->last_name = 'Trejo';
        $teacher->middle_name = 'Medina';
        $teacher->save();

        $teacher = new \App\Teacher();
        $teacher->name = 'Cleotilde';
        $teacher->last_name = 'Tenorio';
        $teacher->middle_name = 'Hernández';
        $teacher->save();
    }
}
