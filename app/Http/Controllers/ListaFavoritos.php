<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ListaFavoritos extends Controller
{
    /**
     * Obtiene la lista de favoritos de un usuario, se envía el usuario y recibe su lista de productos
     * @param idUsuario Refiere al id del usuario a enviar para recibir su lista
     * @return listaFavoritos Refiere a la lista de productos asociada al usuario
     */
    public function obtenerListaFavoritoPorUsuario($codigoUsuario){
        if($codigoUsuario!=null){
            $datoConvertir = Http::get('localhost:8091/api/productos/obtener/listafavoritos/'.$codigoUsuario);
            $listaFavoritos = $datoConvertir->Json();

            return view('listaFavoritosUsuario', compact('listaFavoritos','codigoUsuario'));

        }else{
            return view('welcome');
        }
    }

    /**
     * Esta función registra un nuevo producto a la lista de favoritos de un usuario, el cual se enviará como idUsuario
     * @param idUsuario Refiere al id del usuario al que le pertenece la lista de favoritos (en la cual se insertará el producto)
     * @param idProducto Refiere al producto a registrar en la lista de favoritos del usuario
     * @return listaFavoritos Refiere a la lista de productos asociada al usuario
     */
    public function añadirAListaFavoritos($codigoUsuario, $codigoProducto){

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
