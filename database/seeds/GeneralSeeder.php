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

        \App\Career::all()->each(function ($career) use ($faker) {

            //four groups per career

            for($x = 0; $x <= 3; $x++) {

                $group = factory(\App\Group::class)->create([
                    'grade' => $x + 1,
                    'career_id' => $career->id
                ]);

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