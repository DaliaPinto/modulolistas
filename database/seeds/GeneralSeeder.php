<?php

use Illuminate\Database\Seeder;

class GeneralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()		
    {
        $faker = new \Faker\Generator();
        $faker->addProvider(new Faker\Provider\Base($faker));

        \App\Career::all()->each(function ($c) use ($faker) {

            //two groups per career

            for($x = 0; $x <= 1; $x++) {

                $shiftAbb = $faker->randomElement(['V', 'M']);
                $grade = $x + 1;
                $groupLetter = $faker->randomElement(['A', 'B', 'C']);

                $shift = $shiftAbb == 'V' ? 'Vespertino' : 'Matutino';

                //todo: el campo 'group' tendra que guardar solo la letra, ya no todo el texto, una vez hecho eso, se creara el model factory para refactorizar esta parte

                $group = new \App\Group();
                $group->shift = $shiftAbb;
                $group->grade = $grade;
                $group->group = $grade.'°'.$groupLetter.' - '.$shift;
                $group->period_id = 2;
                $group->career_id = $c->id;
                $group->save();

                //two students per group

                factory(\App\Student::class, 2)->create()->each(function ($s) use ($group) {
                    $gs = new \App\GroupStudent();
                    $gs->student_id = $s->id;
                    $gs->group_id = $group->id;
                    $gs->save();
                });
            }
        });

    }
}