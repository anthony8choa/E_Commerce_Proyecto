<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductosController extends Controller
{
    /**
     * Este método retorna 1 producto mandando el id del producto a la api y retornando los datos del producto
     * para mostrarlo en la vista 'visualizarProducto'
     * @param idProducto refiere al id del producto a buscar
     * @return view refiere a la vista a la cual se le enviará todos los datos de ese producto
     */
    public function mostrarProductoPorId($idProducto){
        //$datoConvertir = Http::get('http://localhost:8091/api/productos/mostrar/'.$idProducto);
        //^ ejemplo de ruta a buscar para recibir el producto

        $dato = $datoConvertir->Json();

        return view('visualizarProducto', compact('dato'));
    }


}
