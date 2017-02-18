<?php

namespace App\Http\Controllers;

use App\ListAssistance;
use App\SchoolMonth;
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
}
