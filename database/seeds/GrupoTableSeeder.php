<?php

use Illuminate\Database\Seeder;

class GrupoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $grupo = new \App\Grupo();
        $grupo->turno = 'M';
        $grupo->cuatrimestre = 1;
        $grupo->grupo = 'A';
        $grupo->periodo_id = 1;
        $grupo->save();

        $grupo = new \App\Grupo();
        $grupo->turno = 'M';
        $grupo->cuatrimestre = 1;
        $grupo->grupo = 'B';
        $grupo->periodo_id = 1;
        $grupo->save();

        $grupo = new \App\Grupo();
        $grupo->turno = 'M';
        $grupo->cuatrimestre = 1;
        $grupo->grupo = 'C';
        $grupo->periodo_id = 1;
        $grupo->save();

        $grupo = new \App\Grupo();
        $grupo->turno = 'M';
        $grupo->cuatrimestre = 1;
        $grupo->grupo = 'D';
        $grupo->periodo_id = 1;
        $grupo->save();

        $grupo = new \App\Grupo();
        $grupo->turno = 'M';
        $grupo->cuatrimestre = 1;
        $grupo->grupo = 'E';
        $grupo->periodo_id = 1;
        $grupo->save();
    }
}
