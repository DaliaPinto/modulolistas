<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Psy\Util\Json;
use Carbon\Carbon;

use App\Subject;
use App\Group;
use App\Schedule;
use App\Student;
use App\GroupStudent;
use App\ListDetail;

use App\Attendance;

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
        $list_start_date = '';

        $schedule = json_encode($list);

            //obtain the students list by group id and period id
        $students = GroupStudent::where('group_id', $list->group->id)
                                ->where('period_id', $list->period->id)->get();

        $list_detail = ListDetail::where('period_id', $list->period->id)->get();
        $list_dates = json_encode($list_detail);
        /*$current_date = Carbon::now();
        $first_date = Carbon::createFromFormat('Y-m-d', $list_detail->start_date);
        $end_date = Carbon::createFromFormat('Y-m-d', $list_detail->end_date);

        //if($current_date > $first_date && $current_date < $end_date)*/



        //return view with schedule info and students array
        return view('list.showlist', ['schedule' =>$list, 'students' => $students, 'list_detail' => $list_dates] /*'list_start_date'=> $list_start_date]*/);

        //return a json api for testing
        //return response()->json(['schedules' =>$list, 'students' =>$students, 'list_dates'=> $list_detail, 'status' => 0], 200);
    }
}
