<?php

namespace App\Http\Controllers;

use App\Teacher;
use App\UserType;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /*
     * return a list of user types in register form
     * return a ist of teachers in register form
     *
     */
    public function getUserTypes()
    {
        $users = UserType::all();
        $teachers = Teacher::where('user_id', '=', null)->get();

        //return lists
        return view('auth.register', ['users' => $users, 'teachers'=>$teachers]);
        //return response()->json(['users' => $users], 200);
    }
}
