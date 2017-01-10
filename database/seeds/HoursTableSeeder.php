<?php

use Illuminate\Database\Seeder;

class HoursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /***********Morning***************/

        //1st hour
        $hour = new \App\Hour();
        $hour->start_hour = '07:00:00';
        $hour->end_hour= '07:50:00';
        $hour->save();
        //2nd hour
        $hour = new \App\Hour();
        $hour->start_hour = '07:50:00';
        $hour->end_hour= '08:40:00';
        $hour->save();
        //3th hour
        $hour = new \App\Hour();
        $hour->start_hour = '08:40:00';
        $hour->end_hour= '09:30:00';
        $hour->save();
        //4th hour
        $hour = new \App\Hour();
        $hour->start_hour = '09:30:00';
        $hour->end_hour= '10:20:00';
        $hour->save();
        //5th hour
        $hour = new \App\Hour();
        $hour->start_hour = '10:40:00';
        $hour->end_hour= '11:30:00';
        $hour->save();
        //6th hour
        $hour = new \App\Hour();
        $hour->start_hour = '11:30:00';
        $hour->end_hour= '12:20:00';
        $hour->save();
        //7th hour
        $hour = new \App\Hour();
        $hour->start_hour = '12:20:00';
        $hour->end_hour= '13:10:00';
        $hour->save();
        //8th hour
        $hour = new \App\Hour();
        $hour->start_hour = '13:10:00';
        $hour->end_hour= '14:00:00';
        $hour->save();

        /***********Evening*************/

        //9th hour
        $hour = new \App\Hour();
        $hour->start_hour = '17:50:00';
        $hour->end_hour= '18:40:00';
        $hour->save();
        //10th hour
        $hour = new \App\Hour();
        $hour->start_hour = '18:40:00';
        $hour->end_hour= '19:30:00';
        $hour->save();
        //11th hour
        $hour = new \App\Hour();
        $hour->start_hour = '19:30:00';
        $hour->end_hour= '20:20:00';
        $hour->save();
        //12th hour
        $hour = new \App\Hour();
        $hour->start_hour = '20:20:00';
        $hour->end_hour= '21:10:00';
        $hour->save();
        //13th hour
        $hour = new \App\Hour();
        $hour->start_hour = '21:10:00';
        $hour->end_hour= '22:00:00';
        $hour->save();
        //14th hour
        $hour = new \App\Hour();
        $hour->start_hour = '22:00:00';
        $hour->end_hour= '22:50:00';
        $hour->save();
    }
}
