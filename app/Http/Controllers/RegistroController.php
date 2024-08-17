<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RegistroController extends Controller
{
    public function confirmarRegistro(Request $request){


        $dato = Http::post('http://localhost:8091/api/usuarios/nuevo',[
            "nombreusuario" => $request->nombreusuario,
            "nombrecompleto" => $request->nombrecompleto,
            "correo" => $request->correo,
            "contrasenia" => $request->contrasenia,
            "telefono" => $request->telefono,
            "lugares" => [
                "nombrePais" => $request->nombrePais,
                "departamento" => $request->departamento,
                "codigoPostal" => $request->codigoPostal
            ]
        ]);

        $usuarioCreado = $dato->Json();

        if($usuarioCreado!=null){
            return redirect()->route('login');
        }else{
            //Objeto session para leer en registro y mostrar modal de usuario o correo ya registrado en otra cuenta
            session()->flash('usuarioExiste', true);
            return redirect()->route('registro');
        }

    }

    public function mostrarRegistro(){
        return view('vistaRegistro');
    }


}
