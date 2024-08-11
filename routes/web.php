<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('vistaLogin');
})->name('login');

Route::get('/principal', function(){
    return view('paginaPrincipal');
})->name('principal');

//Comentada mientras se implementa funcionalidad
//Route::get('/visualizar/producto', [ProductosController::class, 'mostrarProductoPorId'])->name('visualizar.producto');

///visualizar/producto PRUEBA
Route::get('/producto/visualizar', function(){
    return view('visualizarProducto');
})->name('visualizar.producto');

//prueba para probar redirect a paginaPrincipal, luego se cambiara
Route::get('/usuario/verificar', function(){
    return view('paginaPrincipal');
})->name('usuario.verificar');

