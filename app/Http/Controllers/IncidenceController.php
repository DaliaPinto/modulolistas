<?php

namespace App\Http\Controllers;

use App\Incidence;
use Illuminate\Http\Request;

class IncidenceController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $incidence = new Incidence();
        $incidence->incidence_type = $request['incidence_type'];
        $incidence->date = $request['date'];
        $incidence->description = $request['description'];
        $incidence->activity = $request['activity '];
        $incidence->day_id = $request['day_id'];
        $incidence->save();

        return response()->json(['status' => 0,
            'message' => 'Reporte de Incidencia Generado'], 200);
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
        $this->validate($request, [
            'date' => 'required',
            'incidence_type' => 'required',
            'day' => 'required',
            'description' => 'required'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
