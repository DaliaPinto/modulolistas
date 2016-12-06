<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;
use App\Hour;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


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
     * Show the teachers schedule
     * param: period and teacher id
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teacher = Auth::user()->teacher;

        $schedules = Schedule::
            where('teacher_id', $teacher->id)
            ->where('period_id', 1)->get();

        $hours = Hour::all();

        //return a json api
        //return response()->json(['schedules' => $schedules], 200);

        return view('home')->with(['schedules' =>$schedules])->with(['hours'=>$hours]);
    }
}
