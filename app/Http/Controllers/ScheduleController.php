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
    /**
     * Make inserts by Api excel in Careers and Group datatable
     */
    public function saveCareers() {
         //get to excel sheet
        $students = Excel::load('public/files/febrero.xls', 'UTF-8')->get();

        //group data by career
        $careers = $students->groupBy('carrera');

        //save in database the career table
        foreach($careers as $key=>$career) {
            $n_career = new Career();
            $n_career->name = $key;
            $n_career->save();

            //group data by group
            $groups = $career->groupBy('grupo');

            //save in database the group table
            foreach($groups as $keyG=>$group) {
                //divide group field and make an array to feed the shift field, and grade field in
                //group table
                $group_array = preg_split("/\s/", $keyG);

                $n_group = new Group();
                //if array is different to null, save data
                if(count($group_array) == 5) {
                    if($group_array[4] == 'Matutino'){
                        $n_group->shift = 'M';
                    }else{
                        $n_group->shift = 'V';
                    }
                    $n_group->grade = $group_array[0];
                    $n_group->group = $keyG;
                    $n_group->period_id = 2;
                    $n_group->career_id = $n_career->id;
                    $n_group->save();
                    //echo collect(['test' => $group])->toJson();
                    }

                    /*$n_group_students = new GroupStudent();
                    $n_group_students->group_id = $n_group->id;
                    $n_group_students->student_id = $student_id[$j];
                    $n_group_students->save();*/
                }
                //Test
                //echo collect(['test' => count($student)])->toJson();
            }
        //Test
        //return $students;
        return response()->json(['message' => 'All data saved']);
    }

    /**
     * Make inserts by Api excel in Students datatable
     */
    public function saveStudents() {
        //get to excel sheet
        $students = Excel::load('public/files/febrero.xls', 'UTF-8')->get();

        //student values
        $student_id = $students->pluck('matricula');
        $student_name = $students->pluck('nombre');
        $student_last = $students->pluck('primer_apellido');
        $student_middle = $students->pluck('segundo_apellido');
        $student_status = $students->pluck('situacion');
        //echo collect(['test' => $student_name[$i]])->toJson();

        for($i=0; $i<count($students);$i++) {
            $n_students = new Student();
            $n_students->id = $student_id[$i];
            $n_students->name = $student_name[$i];
            $n_students->last_name = $student_last[$i];
            $n_students->middle_name = $student_middle[$i];
            if($student_status[$i] == 'Regular'){
                $n_students->status = 'R';
            }else{
                $n_students->status = 'I';
            }
            $n_students->save();//Test
            //echo collect(['test' => $student_name[$i]])->toJson();
        }
        return response()->json(['message' => 'All data saved']);
    }
}