<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductosController extends Controller
{
    public function mostrarPorId(){
        $datoConvertir = Http::get("http://localhost:8091/api/productos/mostrar/1");

        $dato = $datoConvertir->Json();

        return view('visualizarProducto', compact('dato'));
        //return $dato;
    }
}
