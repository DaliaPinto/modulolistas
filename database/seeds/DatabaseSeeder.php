<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(TipoUsuariosTableSeeder::class);
        $this->call(PeriodosTableSeeder::class);
        $this->call(GruposTableSeeder::class);
        $this->call(MateriasTableSeeder::class);
        $this->call(DocentesTableSeeder::class);
        $this->call(HorasTableSeeder::class);
        $this->call(ItinerarioTableSeeder::class);
    }
}
