<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DireccionesController;
use App\Http\Controllers\MetodoPagoController;
use App\Http\Controllers\UsuarioController;

Route::get('/', function () {
    return view('welcome');
});
// visualizar prueba del login
Route::get('/login', function () {
    return view('vistaLogin');
})->name('login');

//vizualizar vista de registro
Route::get('/registro', function () {
    return view('vistaRegistro');
})->name('registro');

Route::get('/principal', function(){
    return view('paginaPrincipal');
})->name('principal');

//Comentada mientras se implementa funcionalidad
Route::get('/producto/visualizar/{idProducto}', 
    [ProductosController::class, 'mostrarProductoPorId']
    )->name('producto.visualizar');

///visualizar/producto PRUEBA
/*Route::get('/producto/visualizar', function(){
    return view('visualizarProducto');
})->name('visualizar.producto');*/

//prueba para probar redirect a paginaPrincipal, luego se cambiara
Route::get('/usuario/verificar', function(){
    return redirect('principal');
})->name('usuario.verificar');

Route::get('/favoritos', function(){
    return view('listaFavoritos');
})->name('favoritos');

Route::get('categorias/obtener/nombre',
    [CategoriaController::class, 'obtenerNombreDeCategorias']
    )->name('obtener.nombre.categorias');

//Obtiene todos los productos de una categoria enviando el idCategoria (Comentada mientras se implementa su funcionalidad)
Route::get('categorias/obtener/productos/{idCategoria}',
    [CategoriaController::class, 'obtenerProductosDeCategoria']
    )->name("obtener.productos.categoria");

