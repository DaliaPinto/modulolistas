<?php

namespace App\Http\Controllers;

use App\GroupStudent;
use App\Student;
use Illuminate\Http\Request;
use App\Career;
use App\Group;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use App\Period;

class CareerController extends Controller
{

    /**
     * Make inserts by Api excel in Careers, Group, and listAssistance datatable
     * this needs to execute when a new month starts
     */
    public function saveCareers() {
        //get to excel sheet
        $students = Excel::load('public/files/febrero.xls', 'UTF-8')->get();

        //get the current day
        $today = Carbon::today();

        //get the actual period
        $actual_period = Period::where('start_date','<=', $today->toDateString())
                                ->where('end_date', '>=', $today->toDateString())->first();

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
                    $n_group->group = $group_array[2];
                    $n_group->period_id = $actual_period->id;
                    $n_group->career_id = $n_career->id;
                    $n_group->save();
                }
                //get the student id
                $n_serial = $group->pluck('matricula');
                $n_status = $group->pluck('situacion');
                $n_name = $group->pluck('nombre');
                $n_first = $group->pluck('primer_apellido');
                $n_middle = $group->pluck('segundo_apellido');

                for ($i=0; $i< count($group); $i++){

                    $n_students = new Student();
                    $n_students->serial_number = $n_serial[$i];
                    $n_students->name = $n_name[$i];
                    $n_students->last_name = $n_first[$i];
                    $n_students->middle_name = $n_middle[$i];
                    if($n_status[$i] == 'Regular'){
                        $n_students->status = 'R';
                    }else{
                        $n_students->status = 'I';
                    }
                    $n_students->save();


                    $n_student = new GroupStudent();
                    $n_student->group_id = $n_group->id;
                    $n_student->student_id = $n_students->id;
                    $n_student->save();
                    //echo collect(['group'=> $keyG, 'num_student' => $n_id[$i]])->toJson();
                }
            }
        }
        //return $students;
        return response()->json(['message'=> 'All data saved']);
    }
}
