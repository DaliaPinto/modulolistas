<?php

use Illuminate\Database\Seeder;

class ItinerarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //save default test data
        $i = new \App\Itinerario();
        $i->hora_id=1;
        $i->docente_id= 1;
        $i->materia_id = 1;
        $i->grupo_id= 1;
        $i->periodo_id=1;
        $i->fecha = '2016-09-12';
        $i->save();

        //save default test data
        $i = new \App\Itinerario();
        $i->hora_id=2;
        $i->docente_id= 2;
        $i->materia_id = 1;
        $i->grupo_id= 1;
        $i->periodo_id=1;
        $i->fecha = '2016-09-12';
        $i->save();

        //save default test data
        $i = new \App\Itinerario();
        $i->hora_id=3;
        $i->docente_id= 2;
        $i->materia_id = 1;
        $i->grupo_id= 1;
        $i->periodo_id=2;
        $i->fecha = '2017-01-15';
        $i->save();

        //save default test data
        $i = new \App\Itinerario();
        $i->hora_id=4;
        $i->docente_id= 1;
        $i->materia_id = 2;
        $i->grupo_id= 1;
        $i->periodo_id=1;
        $i->fecha = '2016-09-12';
        $i->save();

        //save default test data
        $i = new \App\Itinerario();
        $i->hora_id=4;
        $i->docente_id= 2;
        $i->materia_id = 2;
        $i->grupo_id= 1;
        $i->periodo_id=1;
        $i->fecha = '2016-09-13';
        $i->save();

        //save default test data
        $i = new \App\Itinerario();
        $i->hora_id=5;
        $i->docente_id= 1;
        $i->materia_id = 2;
        $i->grupo_id= 1;
        $i->periodo_id=2;
        $i->fecha = '2017-01-15';
        $i->save();
    }
}
