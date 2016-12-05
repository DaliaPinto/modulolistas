<?php

use Illuminate\Database\Seeder;

class UserTypesTableSeeder extends Seeder
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
        $u = new \App\UserType();
        $u->description = 'Administrador';
        $u->save();

        $u = new \App\UserType();
        $u->description = 'Docente';
        $u->save();

        $u = new \App\UserType();
        $u->description = 'Consultor';
        $u->save();

        $u = new \App\UserType();
        $u->description = 'Tutor';
        $u->save();
    }
}
