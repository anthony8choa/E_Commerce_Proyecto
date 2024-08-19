<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class CarritoController extends Controller
{
    public function realizarCompra($idUsuario){
        $dato = Http::get('localhost:8091/api/usuarios/obtener/direcciones/tarjetas/'.$idUsuario);

        $usuario = $dato->Json();

        if($usuario!=null){
            return view('realizarCompra', compact('usuario'));
        }
    }

    public function realizarCompraConfirmar(Request $request, $idUsuario){
        //dd($request);
        // codigousuario/codigoTarjeta

        $productosRequest = $request->productos; 

        // Armar el JSON a partir del request
        $productos = [];

        foreach ($productosRequest as $producto) {
            $productos[] = [
                'codigoProducto' => $producto['codigoProducto'],
                'cantidadUnidades' => $producto['cantidadUnidades']
            ];
        }

        $dato = Http::post('localhost:8091/api/facturas/generarFactura/'.$idUsuario.'/'.$request->tarjeta.'?monto='.$request->monto , $productos);
        $datoCliente = Http::get('localhost:8091/api/usuarios/ver?codigousuario='.$idUsuario);

        $cliente = $datoCliente->Json();
        $factura = $dato->Json();

        if($factura != null){
            return view('reciboCliente', compact('factura','cliente'));
        }else{
            session()->flash('noStock', true);
            return redirect()->route('realizar.compra', $idUsuario);
        }

    }
}
