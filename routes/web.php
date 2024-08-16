<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DireccionesController;
use App\Http\Controllers\MetodoPagoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ListaFavoritos;
use App\Http\Controllers\ReseniasController;
use App\Http\Controllers\ComercianteController;

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

//solo para visualizar perfil de la cuenta
Route::get('/perfil/cuenta', function () {
    return view('perfilCuenta');
})->name('perfil');
//solo visualizar editar datos personales
Route::get('/editar/datosPersonales', function () {
    return view('editarDatosPersonales');
})->name('editardatos');

//solo visualizar agregar direccion
Route::get('/agregar/nuevadireccion', function () {
    return view('agregarDireccion');
})->name('agregardir');

//solo visualizar agregar tarjeta 
Route::get('/agregar/tarjeta', function () {
    return view('agregarTarjeta');
})->name('agregartarjeta');


Route::get('/index', function(){
    return view('paginaPrincipal');
})->name('principal');

//Obtiene el id del producto y redirige a la vista con ese producto asociado
Route::get('/producto/visualizar/{idProducto}', 
    [ProductosController::class, 'mostrarProductoPorId']
    )->name('producto.visualizar');



//Hacer peticion al BackEnd de la existencia de un usuario
Route::get('/usuario/verificar',
    [ProductosController::class, 'verificarUsuarioLogin']
    )->name('usuario.verificar');

//usuario.obtener.nombre
Route::get('/usuario/obtener/por/nombre/{nombre}/{contrasenia}',
    [UsuarioController::class, 'obtenerPorNombreLogin']
    )->name('usuario.obtener.nombre.login');

//Lista favoritos
/*
Route::get('/favoritos', function(){
    return view('listaFavoritosUsuario');
})->name('favoritos');*/

//Lista favoritos
Route::get('/favoritos/{codigoUsuario}',
    [ListaFavoritos::class, 'obtenerListaFavoritoPorUsuario']
    )->name('favoritos');

Route::get('categorias/obtener/nombre',
    [CategoriaController::class, 'obtenerNombreDeCategorias']
    )->name('obtener.nombre.categorias');

//Obtiene todos los productos de una categoria enviando el idCategoria (Comentada mientras se implementa su funcionalidad)
Route::get('categorias/obtener/productos/{idCategoria}/{idUsuario}',
    [CategoriaController::class, 'obtenerProductosDeCategoria']
    )->name("obtener.productos.categoria");

Route::get('usuario/ver/cuenta',function(){
    return view('verCuenta');
})->name("usuario.ver.cuenta");

Route::get('favoritos/eliminar/producto/{codigoUsuario}/{codigoProducto}',
    [ListaFavoritos::class, 'eliminarProductoDeListaFavoritos']
    )->name("favoritos.eliminar.producto");

Route::get('favoritos/agregar/producto/{codigoUsuario}/{codigoProducto}',
    [ListaFavoritos::class, 'agregarProductoAListaFavoritos']
    )->name("favoritos.agregar.producto");

Route::get('/usuario/verificar/js/{nombre}/{contrasenia}',
    [UsuarioController::class, 'verificarUsuarioLoginJS']
    )->name('usuario.verificar.js');

Route::post('/resenias/crear/{idUsuario}/{idProducto}',
    [ReseniasController::class, 'crearResenia']
    )->name('resenias.crear');



//Comerciante
Route::get('/comerciante/principal',function(){
    return view("comercianteVistaPrincipal");
})->name('comerciante.principal');

Route::get('/comerciante/login', function(){
    return view('loginComerciante');
})->name("comerciante.login");

Route::get('/comerciante/categorias/obtener/productos/{idCategoria}/{idUsuario}', 
    [ComercianteController::class, 'comercianteObtenerProductosDeCategoria']
    )->name("comerciante.obtener.productos.categoria");

Route::get('/comerciante/producto/visualizar/{idProducto}', 
    [ComercianteController::class, 'comercianteMostrarProductoPorId']
    )->name('comerciante.producto.visualizar');

Route::get('/comerciante/producto/editar/{idProducto}', 
    [ComercianteController::class, 'comercianteEditarProductoPorId']
    )->name('comerciante.producto.editar');



