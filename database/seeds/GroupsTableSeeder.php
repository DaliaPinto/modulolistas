<?php

use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{
    /**
     * Default groups values, it contains groups from 1A to 11E
     *
     * @return void
     */
    public function run()
    {
        //
        $group = new \App\Group();
        $group->shift = 'M';
        $group->quarter = 1;
        $group->group = 'A';
        $group->save();

        $group = new \App\Group();
        $group->shift = 'M';
        $group->quarter = 1;
        $group->group = 'B';
        $group->save();

        $group = new \App\Group();
        $group->shift = 'M';
        $group->quarter = 1;
        $group->group = 'C';
        $group->save();

        $group = new \App\Group();
        $group->shift = 'M';
        $group->quarter = 1;
        $group->group = 'D';
        $group->save();

        $group = new \App\Group();
        $group->shift = 'M';
        $group->quarter = 1;
        $group->group = 'E';
        $group->save();

        $group = new \App\Group();
        $group->shift = 'V';
        $group->quarter = 7;
        $group->group = 'A';
        $group->save();

        $group = new \App\Group();
        $group->shift = 'V';
        $group->quarter = 7;
        $group->group = 'B';
        $group->save();
    }
}
