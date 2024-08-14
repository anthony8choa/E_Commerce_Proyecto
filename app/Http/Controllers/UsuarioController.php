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

    /**
     * Esta funcion obtiene toda la información asociada al usuario, es decir:
     * tabla usuario, sus lugares asociados,
     * sus metodos de pago, las compras de ese usuario (osea todo lo que ha comprado)
     * , en conclusion todo menos sus favoritos (ya que se mostrara en otra vista)
     * @param idUsuario Refiere al idUsuario a mandar para recibir sus atributos
     * @return . Refiere al retorno de dicho datos (nose muy bien como se hará este método, cualquier retorno es valido, ya sea lista o api personalizada con dichos valores)
     */
    public function obtenerUsuarioConAtributos($idUsuario){

    }


    /**
     * Funcion crear nuevo usuario
     * Esta funcion creará un nuevo usuario asociando todo de este al registrarse, es decir, toda la info del usuario,
     * la info de su direccion (solo 1 se enviara en el registro), info de su tarjeta (1 se enviara en el registro).
     * @param request Refiere al tipo de peticion post que contendra toda la informacion previamente mencionada
     * @return boolean Retorna true si el usuario se registro exitosamente, false si el usuario ya existe
     */
    public function registrarUsuario(Request $request){

    }

    //Obtiene el usuario completo mediante su nombre de usuario
    public function obtenerPorNombre($nombre){
        $datoConvertir = Http::get('localhost:8091/api/usuarios/obtener/por/nombre/'.$nombre);
        $respuesta = $datoConvertir->Json();

        return $respuesta;
    }
}
