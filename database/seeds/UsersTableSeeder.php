<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User();
        $user->email = 'prueba@uttijuana.edu.mx';
        $user->password = bcrypt('prueba1');
        $user->tipo_id = 1;
        $user->docente_id =1;
        $user->save();
    }
}
