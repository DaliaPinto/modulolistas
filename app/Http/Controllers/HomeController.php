<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;
use App\Hour;
use App\Period;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


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
     *
     * @var string
     */
    public function getInitView()
    {
        //permission about the user Type
        $type = Auth::user()->userType()->id;

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
        $schedules = Schedule::
            where('teacher_id', $teacher->id)
            ->where('period_id', $period->id)->get();

        //obtain all the available hours
        $hours = Hour::all();

        //return the array schedules to the view
        return view('home')->with(['schedules' =>$schedules, 'hours'=>$hours]);

        //create a json api for testing
        //return response()->json(['schedules' => $schedules], 200);
    }
}
