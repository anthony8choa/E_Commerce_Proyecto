<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CategoriaController extends Controller
{

    /**
     * Esta funcion retorna el nombre de todas las categorias y 4 productos de cada categoria.
     * NOTA: en el caso de haber menos de 4 productos, debe retornar los que haya (ninguno 1, 2 o 3)
     * 
     * Es decir, de la categoria ej calzado va retornar:
     * "cod_producto": 1, //producto 1 ejemplo
     * "descripcion": "zapato para hombre color cafe",
     * "nombre_producto": "zapato de vestir para hombre",
     * "precio_venta": 300, //Lps. se le pone en la vista
     * "imagen_producto: "https://imagenEjemplo.com"
     * 
     *  .
     *  .
     *  .
     * 
     * "cod_producto": 4, //producto 4 ejemplo
     * "descripcion": "tennis blancos unisex marca adidas",
     * "nombre_producto": "tennis blancos para hombre y mujer",
     * "precio_venta": 750, //Lps. se le pone en la vista
     * "imagen_producto: "https://imagenEjemplo.com"
     * 
     * Y asi sucesivamente con todas las categorias
     * 
     * @param empty No envia nada ya que solo hace la peticion para recibir esos valores fijos
     * @return dato Las categorias con 4 productos de cada una
     */
    public function obtenerCategoriasYAlgunosProductos(){

    }

    /**
     * Esta funcion envía un codigo de categoría y se debe recibir todos los productos de esa categoria, ej:
     * $categoria = zapatos, el backend debe retornar;
     *  {
     *  "zapatos":[{
     *              "cod_producto": 1, //producto 1 ejemplo
     *              "descripcion": "zapato para hombre color cafe",
     *              "nombre_producto": "zapato de vestir para hombre",
     *              "precio_venta": 300, //Lps. se le pone en la vista,
     *              "imagen_producto: "https://imagenEjemplo.com"
     *              },
     *             {
     *              "cod_producto": 30, //producto 30 ejemplo de ultimo producto
     *              "descripcion": "tennis blancos unisex marca adidas",
     *              "nombre_producto": "tennis blancos para hombre y mujer",
     *              "precio_venta": 750, //Lps. se le pone en la vista
     *              "imagen_producto: "https://imagenEjemplo.com"
     *              },
     *              {...}]
     *  }
     * @param codigoCategoria Refiere al codigo categoria a 
     * enviar para recibir todos los productos asociados a la misma
     * @return dato Retorna los productos de la categoria enviada
     */
    public function obtenerProductosDeUnaCategoria($codigoCategoria){

    }

}
