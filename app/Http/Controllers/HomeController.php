<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;

use App\Schedule;
use App\Group;
use App\Hour;
use App\Period;





class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Where to redirect users after login.
     *      it depends for the user type
     * @return view
     */
    public function getInitView()
    {
        //Access to user type
        $type = Auth::user()->userType()->id;

        /* evaluate the user type, and return the
        *  view.
        */
        switch ($type){
            case 1:
                return view('list.index');
                break;
            case 2:
                return view('schedule.tutor');
                break;
            default:
                return redirect()->route('home');
                break;
        }
    }

    /**
     * Show the teachers schedule about actual period
     * param: period and teacher id
     * @return \Illuminate\Http\Response
     */
    public function index()
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
                    //numberDay is the day number ex. 1 = mon, 2 = tue, 3 = wed, 4 = thu, 5 = fri
                    $numberDay = $day->day;

                    //empty object to fill subject, group and teacher
                    $row = new \stdClass();
                    $row->subject = $schedule->subject->name;
                    $row->group = $schedule->group->group;
                    $row->teacher = $schedule->teacher->name.' '.$schedule->teacher->last_name;
                    $row->schedule = $schedule->id;

                    //compare the number of day, $hourDay comes to getListHours function and fill with the row empty object
                    if($numberDay == 1) $hourDay->mon = $row; //Monday
                    if($numberDay == 2) $hourDay->tue = $row; //Tuesday
                    if($numberDay == 3) $hourDay->wed = $row; //Wednesday
                    if($numberDay == 4) $hourDay->thu = $row; //Thursday
                    if($numberDay == 5) $hourDay->fri = $row; //Friday
                }
            }
        }
        //return view with schedule info by teacher and period
        return view('home', ['hours' => $hours, 'teacher' => $teacher, 'period' => $period]);

        //return json for testing
        //return response()->json(['schedule' => $hours], 200);
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

            //it will fill with the subject, group and teacher name depends the hour and day
            $row->mon = null;
            $row->tue = null;
            $row->wed = null;
            $row->thu = null;
            $row->fri = null;

            //push row variable in array
            array_push($columns, $row);
        }
        //return array
        return $columns;
    }
}
