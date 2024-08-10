<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UsuarioController extends Controller
{

    /**
     * Vista asociada: vistaLogin
     * 
     * Esta funcion envia el nombre de usuario junto a su contraseña y va
     * verificar si existe un usuario asociado a estos datos, retornando 
     * un BOOLEANO
     * @param Request Refiere al request que contiene el nombre de usuario y contraseña
     * @return boolean Refiere a la respuesta de la verificacion, true si el usuario ingresado existe, false caso contrario
     */
    public function verificarUsuario(Request $request){
        //$request->nombreUsuario,
        //$request->contrasenia
    }
}
