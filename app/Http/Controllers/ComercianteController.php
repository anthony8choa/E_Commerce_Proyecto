<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ComercianteController extends Controller
{

    public function comercianteMostrarAgregarProductoACategoria($idCategoria, $nombreCategoria){
        return view('comercianteAgregarProducto', compact('idCategoria','nombreCategoria'));
    }

    public function comercianteAgregarProductoACategoriaConfirmar(Request $request, $idComercio, $idCategoria){

        $datoCategoria = Http::get('http://localhost:8091/api/categorias/buscar/'.$idCategoria);
        $categoria = $datoCategoria->Json();

        $codigoCategoria = $categoria['codigoCategoria'];
        $nombreCategoria = $categoria['nombreCategoria'];

        $datoProducto = Http::post('localhost:8091/api/productos/crear/nvoCompleto',[
            "nombreProducto" => $request->nombreProducto,
            "precioUnitario" => $request->precioUnitario,
            "descripcion" => $request->descripcion,
            "cantidadDisponible" => $request->cantidadDisponible,
            "imagenProducto" => $request->imagenProducto,
            "comercio" =>   [
                "codigoComercio" => $idComercio
            ],
            "categorias" => [
                "codigoCategoria" => $codigoCategoria,
                "nombreCategoria" => $nombreCategoria
            ]
        ]);

        $producto = $datoProducto->Json();
        if($producto!=null){
            return redirect()->route('comerciante.obtener.productos.categoria', ['idCategoria' => $codigoCategoria, 'idUsuario' => $idComercio]);
        }else{
            return view('comerciante.login');
        }

    }

    public function comercianteObtenerProductosDeCategoria($idCategoria, $idComerciante){
        $datoConvertirProductos = Http::get('http://localhost:8091/api/productos/mostrar/porCategoria/'.$idCategoria);

        $productosEnCategoria = $datoConvertirProductos->Json();

        //dd($productosEnCategoria);

        return view('comercianteCategoriaVerProductos', compact('productosEnCategoria', 'idComerciante'));
    }

    public function comercianteMostrarProductoPorId($idProducto){
        $datoConvertirReseñasProducto = Http::get('http://localhost:8091/api/productos/mostrar/resenias/'.$idProducto);
        $datoConvertirProductoInfo = Http::get('http://localhost:8091/api/productos/mostrar/'.$idProducto);

        $producto = $datoConvertirProductoInfo->Json();
        $reseniasDeProductoConvertir = $datoConvertirReseñasProducto->Json();

        $reseniasDeProducto = null;
        if($reseniasDeProductoConvertir!=null){
            $reseniasDeProducto = $reseniasDeProductoConvertir['listarReseniaDTOs'];
        }

        return view('comercianteVisualizarProducto', compact('producto','reseniasDeProducto'));
    }

    public function comercianteEditarProductoPorId($idProducto){
        $datoConvertirProductoInfo = Http::get('http://localhost:8091/api/productos/mostrar/'.$idProducto);
        $producto = $datoConvertirProductoInfo->Json();

        return view('comercianteEditarProducto', compact('producto'));

    }

    //Cuando se pulse boton de confirmar cambios, se ejecuta este metodo
    public function comercianteEditarProductoPorIdConfirmacion(Request $request, $codigoProducto){
        $dato = Http::put('http://localhost:8091/api/productos/actualizar?codigoProducto='.$codigoProducto,[
            "nombreProducto" => $request->nombreProducto,
            "descripcion" => $request->descripcion,
            "imagenProducto" => $request->imagenProducto,
            "cantidadDisponible" => $request->cantidadDisponible,
            "precioUnitario" => $request->precioUnitario
        ]);

        $respuesta = $dato->Json();

        if($respuesta!=null){

            $idCategoria = $respuesta['categorias']['codigoCategoria'];
            $idComerciante = $respuesta['comercio']['codigoComercio'];

            return redirect()->route('comerciante.obtener.productos.categoria', ['idCategoria' => $idCategoria, 'idUsuario' => $idComerciante]);
        }else{

            return redirect()->route('login');

        }

    }

    public function verificarLogin(Request $request){

        $nombreComercio = $request->nombreComercio;
        $contrasenia = $request->contrasenia;

        $dato = Http::get('http://localhost:8091/api/comercios/verificar/login/'.$nombreComercio.'/'.$contrasenia);
        $respuesta = $dato->Json();
        if($respuesta == true){
            return redirect()->route('comerciante.principal');
        }else{
            return redirect()->route('comerciante.login');
        }
    }

    //Antes de obtener al comerciante, se hace una doble verificacion del login
    public function obtenerComerciantePorNombre($nombreComercio,$contrasenia){
        $datoBoolean = Http::get('http://localhost:8091/api/comercios/verificar/login/'.$nombreComercio.'/'.$contrasenia);
        $respuesta = $datoBoolean->Json();

        $dato = Http::get('http://localhost:8091/api/comercios/obtener/por/nombre/'.$nombreComercio);
        $comercio = $dato->Json();

        if($respuesta == true){
            return $comercio;
        }else{
            return null;
        }
    }

}
