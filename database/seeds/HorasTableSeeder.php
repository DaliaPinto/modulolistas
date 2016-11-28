<?php

use Illuminate\Database\Seeder;

class HorasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1st hour
        $hora = new \App\Hora();
        $hora->hora_inicio = '07:00:00';
        $hora->hora_fin= '07:50:00';
        $hora->save();
        //2nd hour
        $hora = new \App\Hora();
        $hora->hora_inicio = '07:50:00';
        $hora->hora_fin= '08:40:00';
        $hora->save();
        //3th hour
        $hora = new \App\Hora();
        $hora->hora_inicio = '08:40:00';
        $hora->hora_fin= '09:30:00';
        $hora->save();
        //4th hour
        $hora = new \App\Hora();
        $hora->hora_inicio = '09:30:00';
        $hora->hora_fin= '10:20:00';
        $hora->save();
        //5th hour
        $hora = new \App\Hora();
        $hora->hora_inicio = '10:40:00';
        $hora->hora_fin= '11:30:00';
        $hora->save();
        //6th hour
        $hora = new \App\Hora();
        $hora->hora_inicio = '11:30:00';
        $hora->hora_fin= '12:20:00';
        $hora->save();
        //7th hour
        $hora = new \App\Hora();
        $hora->hora_inicio = '12:20:00';
        $hora->hora_fin= '13:10:00';
        $hora->save();
        //8th hour
        $hora = new \App\Hora();
        $hora->hora_inicio = '13:10:00';
        $hora->hora_fin= '14:00:00';
        $hora->save();

        /***********Vespertine*************/

        //9th hour
        $hora = new \App\Hora();
        $hora->hora_inicio = '17:50:00';
        $hora->hora_fin= '18:40:00';
        $hora->save();
        //10th hour
        $hora = new \App\Hora();
        $hora->hora_inicio = '18:40:00';
        $hora->hora_fin= '19:30:00';
        $hora->save();
        //11th hour
        $hora = new \App\Hora();
        $hora->hora_inicio = '19:30:00';
        $hora->hora_fin= '20:20:00';
        $hora->save();
        //12th hour
        $hora = new \App\Hora();
        $hora->hora_inicio = '20:20:00';
        $hora->hora_fin= '21:10:00';
        $hora->save();
        //13th hour
        $hora = new \App\Hora();
        $hora->hora_inicio = '21:10:00';
        $hora->hora_fin= '22:00:00';
        $hora->save();
        //14th hour
        $hora = new \App\Hora();
        $hora->hora_inicio = '22:00:00';
        $hora->hora_fin= '22:50:00';
        $hora->save();
    }
}
