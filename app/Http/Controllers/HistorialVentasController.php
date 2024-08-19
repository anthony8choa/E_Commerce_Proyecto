<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HistorialVentasController extends Controller
{
    public function obtenerHistorialVentas(){
        return view('registroVentas');
    }

    public function obtenerHistorialVentasConfirmar(Request $request){


        $fechaInicio = $request->input('fechaInicio') . 'T' . $request->input('horaInicio') . ':' . $request->input('minutosInicio') . ':00';
        $fechaFin = $request->input('fechaFinal') . 'T' . $request->input('horaFinal') . ':' . $request->input('minutosFinal') . ':00';


        $data = Http::get('localhost:8091/api/historiales/filtrar/rangoFechas?fechaInicio='.$fechaInicio.'&fechaFin='.$fechaFin);

        $historialVentas = $data->Json();

        dd($historialVentas);

    }
}
