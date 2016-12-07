<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Psy\Util\Json;

use App\Subject;
use App\Group;
use App\Schedule;
use App\Student;
use App\GroupStudent;

class ScheduleController extends Controller
{
     /**
     * Show a schedule info with schedule id, and student list
     *         by group id and period id     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showList($id)
    {
        //obtain the schedule for id
        $list = Schedule::where('id', $id)->first();
        $list->period;
        $list->group;
        $list->teacher;
        $list->subject;

        //obtain the students list by group id and period id
        $students = GroupStudent::where('group_id', $list->group->id)
                                ->where('period_id', $list->period->id)->get();

        //return view with schedule info and students array
        return view('list.showlist', ['schedule' =>$list, 'students' => $students]);

        //return a json api for testing
        //return response()->json(['schedules' =>$list, 'students' =>$students, 'status' => 0], 200);
    }
}
