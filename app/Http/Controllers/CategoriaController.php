<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CategoriaController extends Controller
{

    //Obtiene un json con el nombre y id de todas las categorias registradas
    public function obtenerNombreDeCategorias(){
        $datoConvertir = Http::get('http://localhost:8091/api/categorias/mostrar/todas');
        return $dato = $datoConvertir->Json();
    }

    //Obtiene todos los productos asociados a una categoria
    public function obtenerProductosDeCategoria($idCategoria, $idUsuario){
        $datoConvertirProductos = Http::get('http://localhost:8091/api/productos/mostrar/porCategoria/'.$idCategoria);
        $datoConvertirListaFav = Http::get('http://localhost:8091/api/usuarios/ver?codigousuario='.$idUsuario);

        $productosEnCategoria = $datoConvertirProductos->Json();
        $productosEnListaFav = $datoConvertirListaFav->Json();

        //dd($productosEnCategoria);

        $listaDeFavUsuario = null;
        if($productosEnListaFav != null){
            $listaDeFavUsuario = $productosEnListaFav['listaproductos'];
        }

        return view('categoriaVerProductos', compact('productosEnCategoria', 'listaDeFavUsuario'));
        
    }

    /**
     * Esta función envía una petición get y debe recibir todos los productos de todas las 
     * categorias con su nombre de categoria asociado, por ejemplo de la categoria zapatos quiero todos sus productos,
     * de la categoria camisetas quiero todos sus productos y asi sucesivamente
     */
    public function obtenerTodosProductos(){
        $datoConvertirProductos = Http::get('http://localhost:8091/api/categorias/obtener/productos/todas');
        $productoEnTodasCategorias = $datoConvertirProductos->Json();

        return $productoEnTodasCategorias;
    }

    //CONTROLADOR DE PRUEBA, NO HACER
    public function obtenerProductosDeCategoriaPrueba($categoria){



        return view('categoriaVerProductos',compact('categoria'));
    }

}
