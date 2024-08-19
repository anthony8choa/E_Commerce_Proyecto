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
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\HistorialVentasController;

Route::get('/', function () {
    return view('welcome');
});

//Historial de ventas
Route::get('/obtener/historial/ventas',
    [HistorialVentasController::class, 'obtenerHistorialVentas']
    )->name('obtener.historial.ventas');

Route::get('/obtener/historial/ventas/confirmar',
    [HistorialVentasController::class, 'obtenerHistorialVentasConfirmar']
    )->name('obtener.historial.ventas.confirmar');


Route::get('/login', function () {
    return view('vistaLogin');
})->name('login');

//vizualizar vista de registro
Route::get('/registro', 
    [RegistroController::class, 'mostrarRegistro']
)->name('registro');

//confirmar registro
Route::post('/registro/confirmacion',
    [RegistroController::class, 'confirmarRegistro']
    )->name('registro.confirmacion');

//solo para visualizar perfil de la cuenta
Route::get('/usuario/perfil/{idUsuario}', 
    [UsuarioController::class, 'obtenerInformacionPersonalDireccionesTarjetas']
    )->name('usuario.perfil');

//solo visualizar editar datos personales
Route::get('/usuario/editar/datos/personales/{idUsuario}', 
    [UsuarioController::class, 'editarDatosPersonales']
    )->name('usuario.editar.datos.personales');

Route::get('/usuario/editar/datos/personales/confirmar/{idUsuario}', 
    [UsuarioController::class, 'editarDatosPersonalesConfirmar']
    )->name('usuario.editar.datos.personales.confirmar');


Route::get('/usuario/agregar/direccion/{idUsuario}',
    [UsuarioController::class, 'agregarDireccion']
    )->name('usuario.agregar.direccion');

Route::post('/usuario/agregar/direccion/confirmar/{idUsuario}',
    [UsuarioController::class, 'agregarDireccionConfirmar']
    )->name('usuario.agregar.direccion.confirmar');

Route::get('/usuario/editar/direccion/{idLugar}/{idUsuario}',
    [UsuarioController::class, 'editarDireccion']
    )->name('editar.direccion');

Route::get('/usuarios/eliminar/direccion/{idDireccion}/{idUsuario}',
    [UsuarioController::class, 'eliminarDireccion']
    )->name('usuario.eliminar.direcion');

Route::get('/usuario/editar/tarjeta/{idTarjeta}/{idUsuario}', 
    [UsuarioController::class, 'editarTarjeta']
    )->name('usuario.editar.tarjeta');

Route::get('/usuario/editar/tarjeta/confirmar/{idTarjeta}/{idUsuario}', 
    [UsuarioController::class, 'editarTarjetaConfirmar']
    )->name('usuario.editar.tarjeta.confirmar');

Route::get('/usuario/agregar/tarjeta/{idUsuario}', 
    [UsuarioController::class, 'agregarTarjeta']
    )->name('usuario.agregar.tarjeta');

Route::post('/usuario/agregar/tarjeta/confirmar/{idUsuario}', 
    [UsuarioController::class, 'agregarTarjetaConfirmar']
    )->name('usuario.agregar.tarjeta.confirmar');

Route::get('/usuario/eliminar/tarjeta/{idUsuario}/{idTarjeta}',
    [UsuarioController::class, 'desactivarTarjeta']
    )->name('usuario.eliminar.tarjeta');

//solo visualizar registroVentas
Route::get('/registro/ventas', function () {
    return view('registroVentas');
})->name('ventas');



Route::get('/index', function(){
    return view('paginaPrincipal');
})->name('principal');

//Obtiene el id del producto y redirige a la vista con ese producto asociado
Route::get('/producto/visualizar/{idProducto}/{idUsuario}', 
    [ProductosController::class, 'mostrarProductoPorId']
    )->name('producto.visualizar');

Route::get('/usuario/ver/transacciones/{idUsuario}',
    [UsuarioController::class, 'verTransacciones']
    )->name('usuario.ver.transacciones');


//Hacer peticion al BackEnd de la existencia de un usuario
Route::get('/usuario/verificar',
    [UsuarioController::class, 'verificarUsuarioLogin']
    )->name('usuario.verificar');

//usuario.obtener.nombre
Route::get('/usuario/obtener/por/nombre/{nombre}/{contrasenia}',
    [UsuarioController::class, 'obtenerPorNombreLogin']
    )->name('usuario.obtener.nombre.login');

Route::get('/favoritos/{codigoUsuario}',
    [ListaFavoritos::class, 'obtenerListaFavoritoPorUsuario']
    )->name('favoritos');

Route::get('categorias/obtener/nombre',
    [CategoriaController::class, 'obtenerNombreDeCategorias']
    )->name('obtener.nombre.categorias');

//Obtiene todos los productos de una categoria enviando el idCategoria
Route::get('categorias/obtener/productos/{idCategoria}/{idUsuario}',
    [CategoriaController::class, 'obtenerProductosDeCategoria']
    )->name("obtener.productos.categoria");

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

Route::get('/categorias/productos/obtener/todos',
    [CategoriaController::class, 'obtenerTodosProductos']
    )->name('categorias.productos.obtener.todos');

Route::get('/realizar/compra/{idUsuario}',
    [CarritoController::class, 'realizarCompra']
    )->name('realizar.compra');

Route::post('/realizar/compra/confirmar/{idUsuario}',
    [CarritoController::class, 'realizarCompraConfirmar']
    )->name('realizar.compra.confirmar');



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

Route::get('/comerciante/producto/editar/confirmar/{idProducto}', 
    [ComercianteController::class, 'comercianteEditarProductoPorIdConfirmacion']
    )->name('comerciante.producto.editar.confirmar');

Route::get('/comerciante/producto/agregar/{idCategoria}/{nombreCategoria}',
    [ComercianteController::class, 'comercianteMostrarAgregarProductoACategoria']
    )->name('comerciante.producto.agregar');

Route::post('/comerciante/producto/agregar/confirmar/{idComercio}/{idCategoria}',
    [ComercianteController::class, 'comercianteAgregarProductoACategoriaConfirmar']
    )->name('comerciante.producto.agregar.confirmar');

Route::get('/comerciante/login/confirmacion',
    [ComercianteController::class, 'verificarLogin']
    )->name('comerciante.login.confirmacion');

//Antes de obtener al comerciante, se hace una doble verificacion del login
Route::get('/comerciante/obtener/por/nombre/{codigoComerciante}/{contrasenia}',
    [ComercianteController::class, 'obtenerComerciantePorNombre']
    )->name('comerciante.obtener.por.nombre');

Route::get('/comerciante/eliminar/producto/{idProducto}',
    [ComercianteController::class, 'comercianteDesactivarProducto'] //Desactivar para seguir manteniendo un registro del producto, pero ya no le pertenece a comerciante
    )->name('comerciante.eliminar.producto');



