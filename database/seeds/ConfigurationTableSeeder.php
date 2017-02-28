<?php

use Illuminate\Database\Seeder;

class ConfigurationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $config = new \App\TeacherConfiguration();
        $config->at_de = 1;
        $config->no_de = 1;
        $config->at_no_de= 'A';
        $config->teacher_id = 1;
        $config->save();

        $config = new \App\TeacherConfiguration();
        $config->at_de = 1;
        $config->no_de = 1;
        $config->at_no_de= 'A';
        $config->teacher_id = 2;
        $config->save();
    }
}
