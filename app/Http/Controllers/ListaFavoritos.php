<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListaFavoritos extends Controller
{
    /**
     * Obtiene la lista de favoritos de un usuario, se envía el usuario y recibe su lista de productos
     * @param idUsuario Refiere al id del usuario a enviar para recibir su lista
     * @return listaFavoritos Refiere a la lista de productos asociada al usuario
     */
    public function obtenerListaFavoritos($idUsuario){

    }

    /**
     * Esta función registra un nuevo producto a la lista de favoritos de un usuario, el cual se enviará como idUsuario
     * @param idUsuario Refiere al id del usuario al que le pertenece la lista de favoritos (en la cual se insertará el producto)
     * @param idProducto Refiere al producto a registrar en la lista de favoritos del usuario
     * @return listaFavoritos Refiere a la lista de productos asociada al usuario
     */
    public function añadirAListaFavoritos($idUsuario,$idProducto){

    }

}
