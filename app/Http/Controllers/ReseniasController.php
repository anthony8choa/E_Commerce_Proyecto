<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ReseniasController extends Controller
{
    
    public function crearResenia(Request $request, $idUsuario, $idProducto){
        $cantidadEstrelas = $request->cantidadEstrellas;
        $comentario = $request->comentario;

        $respuesta = Http::post('localhost:8091/api/resenias/crear/resenia/'.$idUsuario.'/'.$idProducto, [
            "cantidadEstrelas" => $cantidadEstrelas,
            "comentario" => $comentario
        ]);

        return redirect()->route('producto.visualizar', $idProducto);

    }
}
