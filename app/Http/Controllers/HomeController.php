<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;
use App\Hour;
use Illuminate\Support\Facades\Auth;


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
