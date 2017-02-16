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
        $groupsIds = \App\Group::select('id')->get();
        $teachersIds = \App\Teacher::pluck('id')->toArray();
        $subjectsIds = \App\Subject::pluck('id')->toArray();
        $hoursIds = \App\Hour::pluck('id')->toArray();
        $faker = new \Faker\Generator();
        $faker->addProvider(new Faker\Provider\Base($faker));


        $groupsIds->each(function ($groupId) use ($faker, $teachersIds, $subjectsIds, $hoursIds){
            $s = new \App\Schedule();
            $s->teacher_id = $faker->randomElement($teachersIds);
            $s->subject_id = $faker->randomElement($subjectsIds);
            $s->group_id = $groupId->id;
            $s->save();

            $days = $faker->randomElements([1,2,3,4,5], 2);

            foreach ($days as $dayNumber) {
                $day= new \App\Day();
                $day->day = $dayNumber;
                $day->schedule_id = $s->id;
                $day->save();

                $hours = $faker->randomElements($hoursIds, 2);

                foreach ($hours as $hourId) {

                    $schedules = \App\Schedule::where('teacher_id', $s->teacher_id)->whereHas('days', function ($query) use ($dayNumber, $hourId) {
                        $query->where('day', $dayNumber)->whereHas('hours', function ($query) use ($hourId) {
                            $query->where('hour_id', $hourId);
                        });
                    })->get();

                    if(count($schedules) == 0) {
                        $hour = new \App\HourSchedule();
                        $hour->hour_id = $hourId;
                        $hour->day_id = $day->id;
                        $hour->save();
                    }
                }
            }

        });



        //save default test data
//        $s = new \App\Schedule();
//        $s->teacher_id= 1;
//        $s->subject_id = 13;
//        $s->group_id= 3;
//        $s->save();

    }
}
