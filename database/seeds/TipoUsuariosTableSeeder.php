<?php

use Illuminate\Database\Seeder;

class TipoUsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipo_usuario = new \App\TipoUsuario();
        $tipo_usuario->id = 'ADMIN';
        $tipo_usuario->descripcion = 'Administrador';
        $tipo_usuario->save();

        $tipo_usuario = new \App\TipoUsuario();
        $tipo_usuario->id = 'DOC';
        $tipo_usuario->descripcion = 'Docente';
        $tipo_usuario->save();
    }
}
