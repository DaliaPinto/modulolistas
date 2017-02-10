<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use App\Student;
use App\GroupStudent;
use App\Group;

class StudentController extends Controller
{
    /**
     * Make inserts by Api excel in Students datatable
     */
    public function saveStudents()
    {
        //get to excel sheet
        $students = Excel::load('public/files/febrero.xls', 'UTF-8')->get();

        $students->each(function ($row){
            $n_students = new Student();
            $n_students->id = $row->matricula;
            $n_students->name = $row->nombre;
            $n_students->last_name = $row->primer_apellido;
            $n_students->middle_name = $row->segundo_apellido;
            if($row->situacion == 'Regular'){
                $n_students->status = 'R';
            }else{
                $n_students->status = 'I';
            }
            $n_students->save();//Test
            //echo collect(['test' => $row->nombre])->toJson();

        });
        return response()->json(['message' => 'All data saved']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
}
