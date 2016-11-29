<?php

use Illuminate\Database\Seeder;

class GruposTableSeeder extends Seeder
{
    /**
     * Default groups values, it contains groups from 1A to 11E
     *
     * @return void
     */
    public function run()
    {
        //
        $grupo = new \App\Grupo();
        $grupo->turno = 'M';
        $grupo->cuatrimestre = 1;
        $grupo->grupo = 'A';
        $grupo->save();

        $grupo = new \App\Grupo();
        $grupo->turno = 'M';
        $grupo->cuatrimestre = 1;
        $grupo->grupo = 'B';
        $grupo->save();

        $grupo = new \App\Grupo();
        $grupo->turno = 'M';
        $grupo->cuatrimestre = 1;
        $grupo->grupo = 'C';
        $grupo->save();

        $grupo = new \App\Grupo();
        $grupo->turno = 'M';
        $grupo->cuatrimestre = 1;
        $grupo->grupo = 'D';
        $grupo->save();

        $grupo = new \App\Grupo();
        $grupo->turno = 'M';
        $grupo->cuatrimestre = 1;
        $grupo->grupo = 'E';
        $grupo->save();

        $grupo = new \App\Grupo();
        $grupo->turno = 'V';
        $grupo->cuatrimestre = 7;
        $grupo->grupo = 'A';
        $grupo->save();

        $grupo = new \App\Grupo();
        $grupo->turno = 'V';
        $grupo->cuatrimestre = 7;
        $grupo->grupo = 'B';
        $grupo->save();
    }
}
