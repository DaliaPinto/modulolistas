<?php

namespace App\Http\Controllers;

use App\Attendance;
use Illuminate\Http\Request;
use App\Schedule;
use App\Day;
use App\SchoolMonth;
use App\Student;
use App\GroupStudent;

class AttendanceController extends Controller
{

    public $SPANISH_MONTHS = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response Json
     */
    public function store(Request $request)
    {
        $attendance = new Attendance();
        $attendance->hour_schedule_id = $request['hour_schedule_id'];
        $attendance->student_id = $request['student_id'];
        $attendance->attendance_status = $request['attendance_status'];
        $attendance->attendance_date = $request['attendance_date'];
        $attendance->created_at = $request['created_at'];
        $attendance->updated_at = $request['updated_at'];
        $attendance->save();

        return response()->json(['status' => 0,
            'message' => 'Asistencias guardada'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response Json
     */
    public function edit(Request $request)
    {
        $attendance = new Attendance();
        $attendance->hour_schedule_id = $request['hour_schedule_id'];
        $attendance->student_id = $request['student_id'];
        $attendance->attendance_status = $request['attendance_status'];
        $attendance->attendance_date = $request['attendance_date'];
        $attendance->created_at = $request['created_at'];
        $attendance->updated_at = $request['updated_at'];
        $attendance->save();

        return response()->json(['status' => 0,
            'message' => 'Asistencias guardada'], 200);
    }

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
        $school_months = SchoolMonth::where('period_id', $current_month->period_id)->get();

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
            'months' => $school_months,
            'current_month' => $current_month,
            'spanish_months' => $this->SPANISH_MONTHS
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
