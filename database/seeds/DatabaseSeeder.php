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
        $this->call(UserTypesTableSeeder::class);
        $this->call(PeriodsTableSeeder::class);
        //$this->call(GroupsTableSeeder::class);
        //$this->call(SubjectsTableSeeder::class);
        $this->call(TeachersTableSeeder::class);
        $this->call(HoursTableSeeder::class);
        $this->call(SchedulesTableSeeder::class);
        //$this->call(StudentsTableSeeder::class);
        //$this->call(GroupStudentTableSeeder::class);
        $this->call(DaysTableSeeder::class);
        $this->call(HourSchedulesTableSeeder::class);
        //$this->call(CareersTableSeeder::class);
        $this->call(ListTableSeeder::class);
    }
}
