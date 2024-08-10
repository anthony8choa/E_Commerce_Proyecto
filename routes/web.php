<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('vistaLogin');
});

Route::get('/principal', function(){
    return view('paginaPrincipal');
});

//Comentada mientras se implementa funcionalidad
//Route::get('/visualizar/producto', [ProductosController::class, 'mostrarProductoPorId'])->name('visualizar.producto');

///visualizar/producto PRUEBA
Route::get('/visualizar/producto', function(){
    return view('visualizarProducto');
})->name('visualizar.producto');