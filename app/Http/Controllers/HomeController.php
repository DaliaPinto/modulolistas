<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;

use App\Schedule;
use App\Group;
use App\Day;
use App\HourSchedule;
use App\Hour;
use App\Period;





class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Where to redirect users after login.
     *      it depends for the user type
     *
     * @var string
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
            case 3:
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

        $groups = Group::where('period_id', $period->id)->select('id')->get();

        $schedules = Schedule::where('teacher_id', $teacher->id)->whereIn('group_id', $groups)->with(['subject', 'group', 'days', 'days.hours'])->get();

        $hours = $this->getListHours();

        foreach ($schedules as $schedule) {
            foreach ($schedule->days as $day) {
                foreach ($day->hours as $hour) {

                    $hourDay = $hours[$hour->hour_id - 1];
                    $numberDay = $day->day;

                    $row = new \stdClass();
                    $row->subject = $schedule->subject->name;
                    $row->group = $schedule->group->quarter.'°'.$schedule->group->group;
                    $row->teacher =$schedule->teacher->name.' '.$schedule->teacher->last_name;

                    if($numberDay == 1) $hourDay->mon = $row;
                    if($numberDay == 2) $hourDay->tue = $row;
                    if($numberDay == 3) $hourDay->wed = $row;
                    if($numberDay == 4) $hourDay->thu = $row;
                    if($numberDay == 5) $hourDay->fri = $row;
                }
            }
        }

        return response()->json(['schedule' => $hours], 200);
    }
    public function getListHours() {
        $hours = Hour::all();
        $columns = array();

        foreach ($hours as $hour) {
            $row = new \stdClass();
            $row->hour = $hour->start_hour.' - '.$hour->end_hour;
            $row->mon = null;
            $row->tue = null;
            $row->wed = null;
            $row->thu = null;
            $row->fri = null;
            array_push($columns, $row);
        }
        return $columns;
    }
}
