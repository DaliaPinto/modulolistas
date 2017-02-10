<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Subject;

class SubjectController extends Controller
{
    /**
     *Generate database data by an excel sheet
     * @return \Illuminate\Http\JsonResponse*
     */
    public function saveSubjects()
    {
        //get to excel sheet
        $subjects = Excel::load('public/files/subjects.xlsx', 'UTF-8')->get();

        $subjects->each(function ($row){
            $n_subjects = new Subject();
            $n_subjects->name = $row->nombre;
            $n_subjects->save();
            //Test
            //echo collect(['test' => $row->nombre])->toJson();

        });
        return response()->json(['message' => 'All data saved']);
    }
}
