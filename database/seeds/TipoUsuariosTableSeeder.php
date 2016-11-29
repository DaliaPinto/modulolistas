<?php

use Illuminate\Database\Seeder;

class TipoUsuariosTableSeeder extends Seeder
{
    /**
     * Default user type catalog when:
     * Admin: id = 1 has all the permission except check the assistance
     * Docente: id = 2, will be a default value when a user are registered,
     *         can see all his assitance list, and check assistance.
     * Consultor: id = 3, Can see all the information, but can't edit anything.
     * Tutor: id = 4, This could see all the schedule from his group.
     * @return void
     */
    public function run()
    {

        $tipo_usuario = new \App\TipoUsuario();
        $tipo_usuario->descripcion = 'Administrador';
        $tipo_usuario->save();

        $tipo_usuario = new \App\TipoUsuario();
        $tipo_usuario->descripcion = 'Docente';
        $tipo_usuario->save();

        $tipo_usuario = new \App\TipoUsuario();
        $tipo_usuario->descripcion = 'Consultor';
        $tipo_usuario->save();

        $tipo_usuario = new \App\TipoUsuario();
        $tipo_usuario->descripcion = 'Tutor';
        $tipo_usuario->save();
    }
}
