<?php

namespace App\Http\Controllers;
use App\ListAssistance;
use Carbon\Carbon;

use App\Schedule;
use App\GroupStudent;
use App\Period;
use App\Day;
use App\Student;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;


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
        $months = ListAssistance::where('period_id', $schedule->group->period_id)->get();
        //this variables contains the start and end date of period
        $list_start_date = null;
        $list_end_date = null;
        //obtain the status of students
        $student = Student::where('status', 'R')->select('id')->get();
        //obtain the students list by group id where status is regular
        $students = GroupStudent::where('group_id', $schedule->group->id)->whereIn('student_id', $student)->get();
        //return view with schedule info and students array
        return view('list.showlist', [
            'schedule' =>$schedule,
            'students' => $students,
            'days' => $days,
            'months' => $months
        ]);

        //return response()->json(['data' => $data], 200);
        //return a json api for testing
        /*return response()->json(['schedule' =>$schedule,
                                 'students' =>$students,
                                 'days' => $days,
                                 'status' => 0], 200);*/
    }
    //create api by excel sheet
    public function showDataExcel() {
        $data = Excel::load('public/files/Diciembre.xls', function($reader) { })->get();
        return response()->json(['data' => $data]);
    }
}
