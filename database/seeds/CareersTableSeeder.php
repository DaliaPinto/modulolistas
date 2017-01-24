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
    }
}
