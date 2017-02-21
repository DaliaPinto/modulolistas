<?php

namespace App\Http\Controllers;

use App\Attendance;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Http\Request;
use App\Schedule;
use App\Day;
use App\SchoolMonth;
use App\Student;
use App\GroupStudent;

class AttendanceController extends Controller
{

    public $SPANISH_MONTHS = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
    public $DAYS = ['L', 'M', 'X', 'J', 'V'];
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
        //obtain an array of schedules
        $schedule= Schedule::where('id', $id)->first();
        //collections of days and hours schedule
        $days = Day::where('schedule_id', $schedule->id)->with('hours.hour')->get();


        $current_month = SchoolMonth::where('id', $month)->first();
        $school_months = SchoolMonth::where('period_id', $current_month->period_id)->get();

        //obtain the status of students
        $student = Student::where('status', 'R')->select('id')->get();
        //obtain the students list by group id where status is regular
        $students = GroupStudent::where('group_id', $schedule->group->id)->
        whereIn('student_id', $student)->get();

        $class_days = collect();

        foreach ($days as $d) {
            $week_days = $this->getDays($d->day + 1, $current_month->start_date, $current_month->end_date);
            foreach ($week_days as $w) {
                $class_days->push(['day' => $w->dayOfWeek, 'dayNumber' => $w->day, 'month' => $w->month, 'dayId' => $d->id]);
            }
        }

        $days_tojson = collect();

        $days->each(function ($d) use ($days_tojson) {
            $hours = collect();
            $d->hours->each(function ($h) use ($hours) {
               $hours->push(['id' => $h->id, 'start_hour' => substr($h->hour->start_hour, 0, -3), 'end_hour' => substr($h->hour->end_hour, 0, -3)]);
            });
            $days_tojson->push(['day' => $d->day, 'hours' => $hours->sortBy('start_hour')->values()->all()]);
        });

        //return view with schedule info and students array
        return view('list.showlist', [
            'schedule' =>$schedule,
            'students' => $students,
            'days' => $this->DAYS,
            'months' => $school_months,
            'current_month' => $current_month,
            'spanish_months' => $this->SPANISH_MONTHS,
            'class_days' => $class_days->sortBy('dayNumber'),
            'days_hours' => $days_tojson
        ]);
    }

    public function getDays($day, $start, $end)
    {
        $start_date = Carbon::createFromFormat('Y-m-d', $start);
        $end_date = Carbon::createFromFormat('Y-m-d', $end)->addDay();
        $first_day = $start_date->dayOfWeek;
        $difference = abs($first_day - $day);

        if($day < $first_day) $start_date->addDays(7 - $difference);
        if($day > $first_day) $start_date->addDays($difference);

        return new \DatePeriod(
            $start_date,
            CarbonInterval::week(),
            $end_date
        );
    }
}
