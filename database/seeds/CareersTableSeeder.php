<?php

use Illuminate\Database\Seeder;

class CareersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $career = new \App\Career();
        $career->name = 'Tecnologías de la Información y Comunicación';
        $career->save();

        $career = new \App\Career();
        $career->name = 'Mecatrónica';
        $career->save();

//        $career = new \App\Career();
//        $career->name = 'Desarrollo e Innovación Empresarial';
//        $career->save();
//
//        $career = new \App\Career();
//        $career->name = 'Energías Renovables';
//        $career->save();
//
//        $career = new \App\Career();
//        $career->name = 'Logística Comercial Global';
//        $career->save();
//
//        $career = new \App\Career();
//        $career->name = 'Electromecánica Industrial';
//        $career->save();
    }
}
