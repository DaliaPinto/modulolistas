<?php

use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
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
        $s->middle_name = 'G.';
        $s->save();

        $s = new App\Student;
        $s->id = '0314106734';
        $s->name = 'Jamie';
        $s->last_name = 'Lannister';
        $s->middle_name = 'H.';
        $s->save();

        $s = new App\Student;
        $s->id = '0314106735';
        $s->name = 'Sansa';
        $s->last_name = 'Stark';
        $s->middle_name = 'I.';
        $s->save();

        $s = new App\Student;
        $s->id = '0314104636';
        $s->name = 'Benjen';
        $s->last_name = 'Stark';
        $s->middle_name = 'J.';
        $s->save();


        $s = new App\Student;
        $s->id = '0314103437';
        $s->name = 'Cersei';
        $s->last_name = 'Lannister';
        $s->middle_name = 'K.';
        $s->save();

        $s = new App\Student;
        $s->id = '0314101938';
        $s->name = 'Gregor';
        $s->last_name = 'Clegane';
        $s->middle_name = 'L.';
        $s->save();

        $s = new App\Student;
        $s->id = '0314104039';
        $s->name = 'Margaery';
        $s->last_name = 'Tyrell';
        $s->middle_name = 'M.';
        $s->save();

        $s = new App\Student;
        $s->id = '0314104440';
        $s->name = 'Oberyn';
        $s->last_name = 'Martell';
        $s->middle_name = 'N.';
        $s->save();

        $s = new App\Student;
        $s->id = '0314101335';
        $s->name = 'John';
        $s->last_name = 'Snow';
        $s->middle_name = 'O.';
        $s->save();
    }
}
