<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;

use App\Schedule;
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

        //array list of schedules about teacher id, and period id
        $schedules = DB::table('schedules')
            ->join('groups', 'schedules.group_id', '=', 'groups.id')
            ->join('periods', 'groups.period_id', '=', 'periods.id')
            ->where('teacher_id', $teacher->id)
            ->where('periods.id', $period->id)->get();

        /*$hours = $this->getListHours();

        foreach ($schedules as $schedule) {
            foreach ($schedule->days as $day) {
                foreach ($day->hours as $hour) {

                    $obj = $hours[$hour->hour_id - 1];
                    $numberDay = $day->day;

                    $row = new \stdClass();
                    $row->subject = $schedule->subject->name;
                    $row->group = $schedule->group->name;
                    $row->teacher =$schedule->teacher->first_name.' '.$schedule->teacher->last_name;

                    if($numberDay == 1) $obj->mon = $row;
                    if($numberDay == 2) $obj->tue = $row;
                    if($numberDay == 3) $obj->wed = $row;
                    if($numberDay == 4) $obj->thu = $row;
                    if($numberDay == 5) $obj->fri = $row;
                }
            }
        }*/

        return response()->json([/*"schedule" => $hours, */"schedules" => $schedules], 200);
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
