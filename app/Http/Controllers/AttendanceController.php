<?php

namespace App\Http\Controllers;

use App\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
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
}
