<?php

namespace App\Http\Controllers;
use App\ListAssistance;
use App\SchoolMonth;
use Carbon\Carbon;

use App\Schedule;
use App\GroupStudent;
use App\Day;
use App\Student;



class ScheduleController extends Controller
{
     /**
     * Show a schedule info with schedule id, and student list
     *         by group id and period id     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showList($id, $month)
    {
        //save in array, hours_schedule data
        $hours = array();
        //obtain an array of schedules
        $schedule= Schedule::where('id', $id)->first();
        //collections of days and hours schedule
        $days = Day::where('schedule_id', $schedule->id)->get();
        //push in $hours array, to get the data in view
        foreach ($days as $day){
            foreach ($day->hours as $hour){
                array_push($hours, $hour);
            }
        }

        $current_month = SchoolMonth::where('id', $month)->first();
        $months = SchoolMonth::all();

        //obtain the status of students
        $student = Student::where('status', 'R')->select('id')->get();
        //obtain the students list by group id where status is regular
        $students = GroupStudent::where('group_id', $schedule->group->id)->
                                  whereIn('student_id', $student)->get();

        //$test = $this->showDataExcel();
        //return view with schedule info and students array
        return view('list.showlist', [
            'schedule' =>$schedule,
            'students' => $students,
            'days' => $days,
            'months' => $months,
            'current_month' => $current_month
            //'test' => $test->toJSON()
        ]);

        //return response()->json(['data' => $data], 200);
        //return a json api for testing
        /*return response()->json(['schedule' =>$schedule,
                                 'students' =>$students,
                                 'days' => $days,
                                 'status' => 0], 200);*/
    }
}