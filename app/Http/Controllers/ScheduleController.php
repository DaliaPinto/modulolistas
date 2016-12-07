<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Psy\Util\Json;

use App\Subject;
use App\Group;
use App\Schedule;
use App\Student;
use App\GroupStudent;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //show info in itinerario
        dd($request->all());
    }

    /**
     * Show a schedule info, and student list by group id
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showList($id)
    {
        //obtain the schedule for id
        $list = Schedule::where('id', $id)->first();
        $list->period;
        $list->group;
        $list->teacher;
        $list->subject;

        //obtain the students list by group id and period id
        /*$students = GroupStudent::where('group_id', $list->group->id)
                                ->where('period_id', $list->period->id)->get();
        $students->students->name;*/

        //return a json api
        return response()->json(['schedules' =>$list, 'status' => 0], 200);

        //return view('home')->with(['schedules' =>$schedules]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Schedule::destroy(id);
        return back();

    }
}
