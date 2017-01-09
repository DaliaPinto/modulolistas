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
        $group->quarter = 2;
        $group->group = 'A';
        $group->period_id = 2;
        $group->save();

        $group = new \App\Group();
        $group->shift = 'M';
        $group->quarter = 2;
        $group->group = 'B';
        $group->period_id = 2;
        $group->save();

        $group = new \App\Group();
        $group->shift = 'M';
        $group->quarter = 2;
        $group->group = 'C';
        $group->period_id = 2;
        $group->save();

        $group = new \App\Group();
        $group->shift = 'M';
        $group->quarter = 2;
        $group->group = 'D';
        $group->period_id = 2;
        $group->save();

        $group = new \App\Group();
        $group->shift = 'M';
        $group->quarter = 2;
        $group->group = 'E';
        $group->period_id = 2;
        $group->save();

        $group = new \App\Group();
        $group->shift = 'V';
        $group->quarter = 8;
        $group->group = 'A';
        $group->period_id = 2;
        $group->save();

        $group = new \App\Group();
        $group->shift = 'V';
        $group->quarter = 8;
        $group->group = 'B';
        $group->period_id = 2;
        $group->save();
    }
}
