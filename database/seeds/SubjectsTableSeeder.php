<?php

use Illuminate\Database\Seeder;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Provisional
        $subject = new \App\Subject();
        $subject->name = 'Soporte Técnico';
        $subject->save();

        $subject = new \App\Subject();
        $subject->name = 'Ofimática';
        $subject->save();

        $subject = new \App\Subject();
        $subject->name = 'Metodología de la Programación';
        $subject->save();
    }
}
