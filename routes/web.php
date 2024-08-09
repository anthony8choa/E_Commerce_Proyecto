<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('vistaLogin');
});

Route::get('/paginaPrincipal', function(){
    return view('paginaPrincipal');
});