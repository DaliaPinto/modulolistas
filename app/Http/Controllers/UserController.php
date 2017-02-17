<?php

namespace App\Http\Controllers;

use App\Teacher;
use App\User;
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


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editTeacher(Request $request)
    {
        $this->validate($request, [
            'teacher' => 'required'
        ]);

        $user = User::find($request['user_id']);
        $teacher = Teacher::find($request['teacher']);
        $teacher->user_id = $user;
        $teacher->save();

        return response()->json(['message' => 'Docente registrado'], 200);
    }
}
