<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Psy\Util\Json;
use Carbon\Carbon;

use App\Schedule;
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
    public function showList($subject_id, $group_id, $teacher_id, $period_id)
    {
        //obtain the schedule for id
        $schedule= Schedule::where('subject_id', $subject_id)
            ->where('group_id', $group_id)
            ->where('teacher_id', $teacher_id)
            ->where('period_id', $period_id)->first();
        //this variables contains the start and end date of period
        $list_start_date = null;
        $list_end_date = null;
        //obtain the students list by group id and period id
        $students = GroupStudent::where('group_id', $schedule->group->id)
                                ->where('period_id', $schedule->period->id)->get();
        //obtain periods dates about period id
        $list_dates = Period::where('id', '=', $schedule->period->id)->first();
        //obtain the current day
        $current_date = Carbon::today();
        //obtain when the period starts
        $period_start = Carbon::createFromFormat('Y-m-d', $list_dates->start_date);
        //obtain when the first month ends in period
        $first_month_end = Carbon::createFromFormat('Y-m-d', $list_dates->first_month_end);
        //obtain when the period ends
        $period_end = Carbon::createFromFormat('Y-m-d', $list_dates->end_date);
        //obtanin when the last month starts in period
        $last_month_start = Carbon::createFromFormat('Y-m-d', $list_dates->last_month_start);
        //compare if current date is between period start date and the first month end
        if($current_date >= $period_start && $current_date <= $first_month_end) {
            $list_start_date = $period_start;
            $list_end_date = $first_month_end;
        }
        //compare if current date is between period end date and the last month start
        if($current_date >= $last_month_start && $current_date <= $period_end) {
            $list_start_date = $last_month_start;
            $list_end_date = $period_end;
        }

        //return view with schedule info and students array
        return view('list.showlist', ['schedule' =>$schedule, 'students' => $students, 'list_start_date'=> $list_start_date, 'list_end_date' => $list_end_date]);

        //return a json api for testing
        //return response()->json(['schedules' =>$list, 'students' =>$students, 'list_dates'=> $list_detail, 'status' => 0], 200);
    }
}
