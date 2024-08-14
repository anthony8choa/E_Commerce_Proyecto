<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DireccionesController extends Controller
{
    /**
     * Esta funcion registra una direccion enviando todos sus parametros mediante un post y asociandola al codigoUsuario
     * @param codigoUsuario Refiere el usuario al que se le será registrada la direccion
     * @param request Los datos de la direccion enviada por post
     * @return boolean Retorna true si el guardado se hizo correctamente, false caso contrario
     */
    public function registrarDireccion(Request $request, $codigoUsuario){

    }

}
