<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', fn() => view('home'));


Route::get('/teste-erro', function () {
    // Você pode usar qualquer uma das duas opções:

    // 1) Erro 500 genérico:
    throw new \Exception('Erro de teste da página de erro');

    // ou, se preferir, comenta o de cima e testa um 404:
    // abort(404);
});