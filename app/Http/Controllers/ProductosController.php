<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductosController extends Controller
{
    /**
     * Este método retorna 1 producto mandando el id del producto a la api y retornando los datos del producto
     * para mostrarlo en la vista 'visualizarProducto', NUEVO: incluyendo la seccion de comentarios asociada a dicho producto
     * @param idProducto refiere al id del producto a buscar
     * @return view refiere a la vista a la cual se le enviará todos los datos de ese producto
     */
    public function mostrarProductoPorId($idProducto, $idUsuario){
        $datoConvertirReseñasProducto = Http::get('http://localhost:8091/api/productos/mostrar/resenias/'.$idProducto);
        $datoConvertirProductoInfo = Http::get('http://localhost:8091/api/productos/mostrar/'.$idProducto);
        $datoConvertirListaFav = Http::get('http://localhost:8091/api/usuarios/ver?codigousuario='.$idUsuario);

        $producto = $datoConvertirProductoInfo->Json();
        $reseniasDeProductoConvertir = $datoConvertirReseñasProducto->Json();
        $productosEnListaFav =$datoConvertirListaFav->Json();

        $listaDeFavUsuario = null;
        if($productosEnListaFav != null){
            $listaDeFavUsuario = $productosEnListaFav['listaproductos'];
        }

        $reseniasDeProducto = null;
        if($reseniasDeProductoConvertir!=null){
            $reseniasDeProducto = $reseniasDeProductoConvertir['listarReseniaDTOs'];
        }

        return view('visualizarProducto', compact('producto','reseniasDeProducto','listaDeFavUsuario'));
    }

}
