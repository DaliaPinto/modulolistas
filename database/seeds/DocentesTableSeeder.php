<?php

use Illuminate\Database\Seeder;

class DocentesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $docente = new \App\Docente();
        $docente->nombre = 'John';
        $docente->apellido_paterno = 'Smith';
        $docente->apellido_materno = 'G.';
        $docente->user_id = 1;
        $docente->save();
    }
}
