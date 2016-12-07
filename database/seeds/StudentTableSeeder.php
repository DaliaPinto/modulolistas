<?php

use Illuminate\Database\Seeder;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $s = new App\Student;
        $s->id = '0314104733';
        $s->name = 'Brandon';
        $s->last_name = 'Stark';
        $s->second_name = '';

        $s = new App\Student;
        $s->id = '0314106734';
        $s->name = 'Jamie';
        $s->last_name = 'Lannister';
        $s->second_name = '';

        $s = new App\Student;
        $s->id = '0314106735';
        $s->name = 'Sansa';
        $s->last_name = 'Stark';
        $s->second_name = '';

        $s = new App\Student;
        $s->id = '0314104636';
        $s->name = 'Benjen';
        $s->last_name = 'Stark';
        $s->second_name = '';

        $s = new App\Student;
        $s->id = '0314103437';
        $s->name = 'Cersei';
        $s->last_name = 'Lannister';
        $s->second_name = '';

        $s = new App\Student;
        $s->id = '0314101938';
        $s->name = 'Gregor';
        $s->last_name = 'Clegane';
        $s->second_name = '';

        $s = new App\Student;
        $s->id = '0314104039';
        $s->name = 'Margaery';
        $s->last_name = 'Tyrell';
        $s->second_name = '';

        $s = new App\Student;
        $s->id = '0314104440';
        $s->name = 'Oberyn';
        $s->last_name = 'Martell';
        $s->second_name = '';

        $s = new App\Student;
        $s->id = '0314101335';
        $s->name = 'John';
        $s->last_name = 'Snow';
        $s->second_name = '';


    }
}
