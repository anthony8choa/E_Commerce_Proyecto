<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UsuarioController extends Controller
{

    public function verificarUsuarioLogin(Request $request){
        
        $nombre = $request -> nombre;
        $contrasenia = $request -> contrasenia;

        $datoConvertir = Http::get('localhost:8091/api/usuarios/validar/login/'.$nombre.'/'.$contrasenia);
        $respuesta = $datoConvertir->Json();

        session()->flash('respuestaLogin', $respuesta);

        if($respuesta === true){
            return redirect()->route('principal');
        }else{
            return redirect()->route('login');
        }

    }

    public function obtenerInformacionPersonalDireccionesTarjetas($idUsuario){
        $dato = Http::get('localhost:8091/api/usuarios/obtener/direcciones/tarjetas/'.$idUsuario);
        $datosUsuario = $dato->Json();
        if($datosUsuario!=null){
            return view('perfilCuenta', compact('datosUsuario'));
        }
    }

    public function editarDatosPersonales($idUsuario){
        $dato = Http::get('localhost:8091/api/usuarios/ver?codigousuario='.$idUsuario);
        $datosUsuario = $dato->Json();

        return view('editarDatosPersonales', compact('datosUsuario'));
    }

    public function editarDatosPersonalesConfirmar(Request $request, $idUsuario){
        $dato = Http::put('localhost:8091/api/usuarios/actualizar/'.$idUsuario,[
            "nombrecompleto" => $request->nombrecompleto,
            "contrasenia" => $request->contrasenia,
            "telefono" => $request->telefono
        ]);

        $datosUsuario = $dato->Json();
        if($datosUsuario!=null){
            return redirect()->route('usuario.perfil', $idUsuario);
        }

    }

    public function agregarDireccion($idUsuario){
        return view('agregarDireccion', compact('idUsuario'));
    }

    public function agregarDireccionConfirmar(Request $request, $idUsuario){
        $dato = Http::post('localhost:8091/api/direccion/agregar/direcciones/'.$idUsuario.'?nombrePais='.$request->nombrePais.'&codigoPostal='.$request->codigoPostal.'&departamento='.$request->departamento);

        $respuesta = $dato->Json();

        if($respuesta === true){
            return redirect()->route('usuario.perfil', $idUsuario);
        }
    }

    public function editarDireccion($idLugar, $idUsuario){
        return view('editarDireccion');
    }

    public function editarTarjeta($idTarjeta, $idUsuario){
        $dato = Http::get('localhost:8091/api/tarjetasCredito/obtener/'.$idTarjeta);
        $tarjetaEditar = $dato->Json();

        return view('editarTarjeta', compact('tarjetaEditar','idTarjeta','idUsuario'));
    }

    public function editarTarjetaConfirmar(Request $request, $idTarjeta, $idUsuario){
        $dato = Http::put('localhost:8091/api/tarjetasCredito/actualizar/'.$idUsuario.'/'.$idTarjeta,[
            "numeroTarjeta" => $request->numeroTarjeta,
            "anyoVencimiento" => $request->anyoVencimiento,
            "mesVencimiento" => $request->mesVencimiento,
            "cvv" => $request->cvv
        ]);
        $tarjetaConfirmar = $dato->Json();

        if($tarjetaConfirmar != null){
            return redirect()->route('usuario.perfil', $idUsuario);
        }      
    }

    public function agregarTarjeta($idUsuario){
        return view('agregarTarjeta', compact('idUsuario'));
    }

    public function agregarTarjetaConfirmar(Request $request, $idUsuario){
        $datoRespuesta = Http::post('localhost:8091/api/tarjetasCredito/crear/'.$idUsuario,[
            "numeroTarjeta" => $request->numeroTarjeta,
            "anyoVencimiento" => $request->anyoVencimiento,
            "mesVencimiento" => $request->mesVencimiento,
            "cvv" => $request->cvv
        ]);

        $respuesta = $datoRespuesta->Json();
        if($respuesta === true){
            return redirect()->route('usuario.perfil', $idUsuario);
        }else{
            session()->flash('tarjetaExiste', true);
            return redirect()->route('usuario.agregar.tarjeta', $idUsuario);
        }


    }

    //Obtiene el usuario completo mediante su nombre de usuario
    public function obtenerPorNombreLogin($nombre, $contrasenia){

        //Ya que lo usará el login, para obtener el usuario, primero se debe validar el login
        $datoConvertir = Http::get('localhost:8091/api/usuarios/validar/login/'.$nombre.'/'.$contrasenia);
        $respuesta = $datoConvertir->Json();

        if($respuesta){

            $datoConvertir = Http::get('localhost:8091/api/usuarios/obtener/porNombre/'.$nombre);
            $datoRespuesta = $datoConvertir->Json();

            return $datoRespuesta;

        }else{
            return null;
        }
    }
}
