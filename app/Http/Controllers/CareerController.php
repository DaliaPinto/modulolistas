<?php

namespace App\Http\Controllers;

use App\GroupStudent;
use Illuminate\Http\Request;
use App\Career;
use App\Group;
use Maatwebsite\Excel\Facades\Excel;

class CareerController extends Controller
{

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
                }
                $n_id = $group->pluck('matricula');
                for ($i=0; $i< count($group); $i++){
                    $n_student = new GroupStudent();
                    $n_student->group_id = $n_group->id;
                    $n_student->student_id = $n_id[$i];
                    $n_student->save();
                    //echo collect(['group'=> $keyG, 'num_student' => $n_id[$i]])->toJson();
                }
            }
        }
        //return $students;
        return response()->json(['message' => 'All data saved']);
    }
}
