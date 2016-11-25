<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lista;

class ListaController extends Controller
{
    public function store(Request $request){
        $this->validate($request, [
            'fecha_inicio' => 'required' ,
            'fecha_fin' => 'required',
            'horario_id' => 'required'
            ]);

        $lista = new Lista();
        $lista->fecha_inicio = $request->fecha_inicio;
        $lista->fecha_fin = $request->fecha_fin;
        $lista->horario_id = $request->horario_id;

        $lista->save();
        dd('Lista añadida con éxito');
    }
}
