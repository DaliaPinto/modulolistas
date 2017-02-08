<?php

namespace App\Http\Controllers;
use App\Career;
use App\Group;
use App\ListAssistance;
use Carbon\Carbon;

use App\Schedule;
use App\GroupStudent;
use App\Period;
use App\Day;
use App\Student;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;


class ScheduleController extends Controller
{
     /**
     * Show a schedule info with schedule id, and student list
     *         by group id and period id     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showList($id)
    {
        //save in array, hours_schedule data
        $hours = array();
        //obtain an array of schedules
        $schedule= Schedule::where('id', $id)->first();
        //collections of days and hours schedule
        $days = Day::where('schedule_id', $schedule->id)->get();
        //push in $hours array, to get the data in view
        foreach ($days as $day){
            foreach ($day->hours as $hour){
                array_push($hours, $hour);
            }
        }
        //contain a list of months by period_id
        $months = ListAssistance::where('period_id', $schedule->group->period_id)->get();
        //obtain the status of students
        $student = Student::where('status', 'R')->select('id')->get();
        //obtain the students list by group id where status is regular
        $students = GroupStudent::where('group_id', $schedule->group->id)->whereIn('student_id', $student)->get();

        //$test = $this->showDataExcel();
        //return view with schedule info and students array
        return view('list.showlist', [
            'schedule' =>$schedule,
            'students' => $students,
            'days' => $days,
            'months' => $months
            //'test' => $test->toJSON()
        ]);

        //return response()->json(['data' => $data], 200);
        //return a json api for testing
        /*return response()->json(['schedule' =>$schedule,
                                 'students' =>$students,
                                 'days' => $days,
                                 'status' => 0], 200);*/
    }
    //create api by excel sheet
    public function showDataExcel() {
        $students = Excel::load('public/files/febrero.xls', 'UTF-8')->get();

        $careers = $students->groupBy('carrera');

        foreach($careers as $key=>$career) {
            $n_career = new Career();
            $n_career->name = $key;
            $n_career->save();

            $groups = $career->groupBy('grupo');

            foreach($groups as $keyG=>$group) {
                $g = preg_split("/\s/", $keyG);
                $n_group = new Group();

                if(count($g) == 5) {
                    if($g[4] == 'Matutino'){
                        $n_group->shift = 'M';
                    }else{
                        $n_group->shift = 'V';
                    }
                    $n_group->grade = $g[0];
                    $n_group->group = $keyG;
                    $n_group->period_id = 2;
                    $n_group->career_id = $n_career->id;
                    $n_group->save();
                }


                //echo collect(['nose' => count($g)])->toJson();
            }

        }
        //return $students;
        //return response()->json(['message' => 'ok']);
    }
}
