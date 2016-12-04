<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Itinerario;
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
        $docente = Auth::user()->docente;
        $schedules = Itinerario::
            where('docente_id', $docente->id)
            ->where('periodo_id', 1)->get();

        //return response()->json(['schedules' => $schedules], 200);

        return view('home')->with(['schedules' =>$schedules]);
    }
}
