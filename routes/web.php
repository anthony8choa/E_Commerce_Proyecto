<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('vistaLogin');
});

Route::get('/pagina/principal', function(){
    return view('paginaPrincipal');
});

Route::get('/visualizar/producto', [ProductosController::class, 'mostrarPorId']);