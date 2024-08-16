<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ComercianteController extends Controller
{
    public function comercianteObtenerProductosDeCategoria($idCategoria, $idUsuario){
        $datoConvertirProductos = Http::get('http://localhost:8091/api/productos/mostrar/porCategoria/'.$idCategoria);
        $datoConvertirListaFav = Http::get('http://localhost:8091/api/usuarios/ver?codigousuario='.$idUsuario);

        $productosEnCategoria = $datoConvertirProductos->Json();
        $productosEnListaFav = $datoConvertirListaFav->Json();

        //dd($productosEnCategoria);

        $listaDeFavUsuario = null;
        if($productosEnListaFav != null){
            $listaDeFavUsuario = $productosEnListaFav['listaproductos'];
        }

        return view('comercianteCategoriaVerProductos', compact('productosEnCategoria', 'listaDeFavUsuario'));
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

}
