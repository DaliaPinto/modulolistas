<?php

use Illuminate\Database\Seeder;

class PeriodosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $periodo = new \App\Periodo();
        $periodo->descripcion = 'septiembre-diciembre';
        $periodo->fecha_inicio ='2016-09-12';
        $periodo->fecha_fin = '2016-12-10';
        $periodo->save();

        $periodo = new \App\Periodo();
        $periodo->descripcion = 'enero-abril';
        $periodo->fecha_inicio ='2017-01-02';
        $periodo->fecha_fin = '2017-04-14';
        $periodo->save();
    }
}
