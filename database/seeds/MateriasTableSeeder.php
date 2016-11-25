<?php

use Illuminate\Database\Seeder;

class MateriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Provisional
        $materia = new \App\Materia();
        $materia->name = 'Soporte Técnico';
        $materia->save();

        $materia = new \App\Materia();
        $materia->name = 'Ofimática';
        $materia->save();

        $materia = new \App\Materia();
        $materia->name = 'Metodología de la Programación';
        $materia->save();
    }
}
