<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ListaFavoritos extends Controller
{

    public function obtenerListaFavoritoPorUsuario($codigoUsuario){
        if($codigoUsuario!=null){
            $datoConvertir = Http::get('localhost:8091/api/productos/obtener/listafavoritos/'.$codigoUsuario);
            $listaFavoritos = $datoConvertir->Json();

            return view('listaFavoritosUsuario', compact('listaFavoritos','codigoUsuario'));

        }else{
            return view('welcome');
        }
    }

    public function eliminarProductoDeListaFavoritos($codigoUsuario, $codigoProducto){
        $respuesta = Http::delete('localhost:8091/api/usuarios/eliminar/producto/listaFavorito/'.$codigoUsuario.'?codigoproducto='.$codigoProducto);
        $respuestaListaFavoritos = $respuesta->Json();
        $listaFavoritos = $respuestaListaFavoritos['listaproductos'];
        return view('listaFavoritosUsuario', compact('listaFavoritos','codigoUsuario'));
    }

    public function agregarProductoAListaFavoritos($codigoUsuario, $codigoProducto){
        $respuesta = Http::post('localhost:8091/api/usuarios/agregar/producto/listaFavorito/'.$codigoUsuario.'?codigoproducto='.$codigoProducto);
        $respuestaConvertir = $respuesta->Json();
            return redirect()->route('producto.visualizar', ['idProducto' => $codigoProducto, 'idUsuario' => $codigoUsuario]);
    }

}
