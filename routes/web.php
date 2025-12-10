<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', fn() => view('home'))->name('home');
// rotas de usuario
Route::get('/usuario/cadastro', fn() => view('usuario.cadastro'))->name('usuario.cadastro');
Route::get('/usuario-buscar', fn() => view('usuario.buscar'))->name('usuario.buscar');
