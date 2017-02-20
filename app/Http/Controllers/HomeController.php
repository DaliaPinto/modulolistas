<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;



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
        $type = Auth::user()->user_type_id;

        /* evaluate the user type, and return the
        *  view.
        */
        switch ($type){
            case 1:
                return view('admin.menuadmin');
                break;
            case 2:
                return view('schedule.index');
                break;
            default:
                return redirect()->route('home');
                break;
        }
    }
}
