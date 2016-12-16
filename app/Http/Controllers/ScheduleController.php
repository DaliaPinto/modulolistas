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
use App\Period;

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
        $list_start_date = null;
        $list_end_date = null;

        //obtain the students list by group id and period id
        $students = GroupStudent::where('group_id', $list->group->id)
                                ->where('period_id', $list->period->id)->get();

        $list_dates = Period::where('id', '=', $list->period->id)->first();

        $current_date = Carbon::today();
        $period_start = Carbon::createFromFormat('Y-m-d', $list_dates->start_date);
        $first_month_end = Carbon::createFromFormat('Y-m-d', $list_dates->first_month_end);
        $period_end = Carbon::createFromFormat('Y-m-d', $list_dates->end_date);
        $last_month_start = Carbon::createFromFormat('Y-m-d', $list_dates->last_month_start);

        if($current_date >= $period_start && $current_date <= $first_month_end) {
            $list_start_date = $period_start;
            $list_end_date = $first_month_end;
        }

        if($current_date >= $last_month_start && $current_date <= $period_end) {
            $list_start_date = $last_month_start;
            $list_end_date = $period_end;
        }

        //return view with schedule info and students array
        return view('list.showlist', ['schedule' =>$list, 'students' => $students, 'list_start_date'=> $list_start_date, 'list_end_date' => $list_end_date]);

        //return a json api for testing
        //return response()->json(['schedules' =>$list, 'students' =>$students, 'list_dates'=> $list_detail, 'status' => 0], 200);
    }
}
