<?php

namespace App\Http\Controllers;
use App\ListAssistance;
use App\SchoolMonth;
use App\Subject;
use App\Teacher;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Schedule;
use App\Period;
use App\GroupStudent;
use App\Day;
use App\Student;
use App\Group;
use App\Hour;


class ScheduleController extends Controller
{
    /**
     * Get the Teacher Schedule.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getScheduleOfTeacher()
    {
        //obtain the teacher login
        $teacher = Auth::user()->teacher;

        //todays date
        $today = Carbon::now();

        //compare if date is between to start_date period or end_date period
        $period = Period::where([['start_date','<=',$today->toDateString()],
            ['end_date','>=',$today->toDateString()]])
            ->get()->first();

        //get to group array by actual period
        $groups = Group::where('period_id', $period->id)->select('id')->get();

        //get schedules by teacher and groups by the actual period.
        $schedules = Schedule::where('teacher_id', $teacher->id)->whereIn('group_id', $groups)->with(['subject', 'group', 'days', 'days.hours'])->get();

        //get the current day
        $today = Carbon::today();

        //get all the months
        $month = SchoolMonth::where('start_date','<=', $today->toDateString())
            ->where('end_date', '>=', $today->toDateString())
            ->where('period_id', $period->id)->first();


        //hours is an array by hours (this registered in seeds)
        $hours = $this->getListHours();

        //schedules collection
        foreach ($schedules as $schedule) {
            //get the schedule by days
            foreach ($schedule->days as $day) {
                //get the schedule by days and hour
                foreach ($day->hours as $hour) {

                    //get to array hours where index is the id hour less 1
                    $hourDay = $hours[$hour->hour_id - 1];
                    //numberDay is the day number ex. 0 = mon, 1 = tue, 2 = wed, 3 = thu, 4 = fri
                    $numberDay = $day->day;

                    //empty object to fill subject, group and teacher
                    $row = new \stdClass();
                    $row->subject = $schedule->subject->name;
                    $row->group = $schedule->group->group;
                    $row->career = $schedule->group->career->name;
                    $row->grade = $schedule->group->grade;
                    $row->teacher = $schedule->teacher->name.' '.$schedule->teacher->last_name.' '.$schedule->teacher->middle_name;
                    $row->schedule = $schedule->id;

                    $hourDay->schedules[$numberDay] = $row;

                }
            }
        }
        //return view with schedule info by teacher and period
        return view('home', ['hours' => $hours, 'teacher' => $teacher, 'period' => $period, 'month' => $month]);

        //return json for testing
        //return response()->json(['schedule' => $hours, 'month' => $month], 200);
    }
    /**
     * getListHours return an array of hours
     * @return array of day rows
     */
    public function getListHours() {
        //all the hours
        $hours = Hour::all();

        //where hours will be Will be accommodated
        $columns = array();

        //hours collection
        foreach ($hours as $hour) {
            //empty object
            $row = new \stdClass();

            //put start and end hour in first row
            $row->hour = $hour->start_hour.' - '.$hour->end_hour;

            $row->schedules = array_fill (0,5, NULL);

            array_push($columns, $row);
        }
        //return array
        return $columns;
    }

    /**
     * Get the Teacher Schedule.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getScheduleOfAdmin()
    {
        //todays date
        $today = Carbon::now();

        //compare if date is between to start_date period or end_date period
        $period = Period::where([['start_date','<=',$today->toDateString()],
            ['end_date','>=',$today->toDateString()]])
            ->get()->first();

        $teachers = Teacher::all();
        $subjects = Subject::all();
        $groups = Group::where('career_id', 1)->get();


        //hours is an array by hours (this registered in seeds)
        $hours = $this->getListHours();
        //return view with schedule info by teacher and period
        return view('admin.menuadmin', [
            'hours' => $hours,
            'period' => $period,
            'teachers' => $teachers,
            'subjects' => $subjects,
            'groups' =>$groups
        ]);

        //return json for testing
        //return response()->json(['schedule' => $hours, 'month' => $month], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response Json
     */
    public function store(Request $request)
    {
        $schedule = new Schedule();
        $schedule->teacher_id = $request['hour_schedule_id'];
        $schedule->subject_id = $request['student_id'];
        $schedule->group_id = $request['attendance_status'];
        $schedule->save();

        return response()->json(['status' => 0,
            'message' => 'Hora guardada'], 200);
    }


}