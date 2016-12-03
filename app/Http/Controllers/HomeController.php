<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Itinerario;

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
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = Itinerario::all();
        return view('home')->with(['schedules' =>$schedules]);
    }
}
