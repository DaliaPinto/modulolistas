<?php

namespace App\Http\Controllers;

use App\GroupStudent;
use App\ListAssistance;
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

        //get the start month of actual period
        $period_start_month = Carbon::parse($actual_period->start_date)->month;

        //get the last month of actual period
        $period_last_month = Carbon::parse($actual_period->end_date)->month;

        //get the first and last day of current date
        $last_date = new Carbon('last day of this month');
        $first_date = new Carbon('first day of this month');

        //get the first
        $second_first_date =  new Carbon('first day of next month');
        $second_last_date =  new Carbon('last day of next month');

        //echo collect(['group'=> $second_first_date,  'num_student' => $second_last_date])->toJson();

        //get the List assistance instance.
        $list = new ListAssistance();

        //compare if the current month is the same as the actual period month
        if($today->month == $period_start_month){
            $list->start_date = $actual_period->start_date;
            $list->end_date = $actual_period->first_month_end;
            //$list->save();
        }elseif ($today->month == $period_last_month){
            $list->start_date = $actual_period->last_month_start;
            $list->end_date = $actual_period->end_date;
            //$list->save();
        }else {
            $list->start_date = $first_date->toDateString();
            $list->end_date = $last_date->toDateString();
            //$list->save();
        }
        //group data by career
        $careers = $students->groupBy('carrera');

        //save in database the career table
        foreach($careers as $key=>$career) {
            $n_career = new Career();
            $n_career->name = $key;
            //$n_career->save();

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
                    $n_group->period_id = $actual_period->id;
                    $n_group->career_id = $n_career->id;
                    //$n_group->save();
                }
                //get the student id
                $n_id = $group->pluck('matricula');
                for ($i=0; $i< count($group); $i++){
                    $n_student = new GroupStudent();
                    $n_student->group_id = $n_group->id;
                    $n_student->student_id = $n_id[$i];
                    $n_student->list_assistance_id = $list->id;
                    //$n_student->save();
                    //echo collect(['group'=> $keyG, 'num_student' => $n_id[$i]])->toJson();
                }
            }
        }
        //return $students;
        return response()->json(['message'=> 'All data saved']);
    }
}
