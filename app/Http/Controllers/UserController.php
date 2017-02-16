<?php

namespace App\Http\Controllers;

use App\Teacher;
use App\UserType;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /*
     * return a list of user types in register form
     *
     *
     */
    public function getUserTypes()
    {
        $users = UserType::all();
        $teachers = Teacher::whereNull('user_id');
        return view('auth.register', ['users' => $users, 'teachers'=>$teachers]);
        //return response()->json(['users' => $users], 200);
    }
}
