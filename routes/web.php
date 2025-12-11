<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', fn() => view('home'))->name('home');
// rotas de usuario
Route::get('/usuario/cadastro', fn() => view('usuario/cadastro'))->name('usuario/cadastro');
Route::get('/usuario/buscar', fn() => view('usuario/buscar'))->name('usuario/buscar');

Route::get('/calendario/calendario', fn() => view('calendario/calendario'))->name('calendario/calendario');
Route::get('/calendario/calendario-pessoal', fn() => view('calendario/calendario-pessoal'))->name('calendario/calendario-pessoal');

Route::get('/eleitor/cadastro', fn() => view('eleitor/cadastro'))->name('eleitor/cadastro');
Route::get('/eleitor/buscar', fn() => view('eleitor/buscar'))->name('eleitor/buscar');

Route::get('/atendimento/cadastro', fn() => view('atendimento/cadastro'))->name('atendimento/cadastro');
Route::get('/atendimento/buscar', fn() => view('atendimento/buscar'))->name('atendimento/buscar');

Route::get('/acoes/cadastro', fn() => view('acoes/cadastro'))->name('acoes/cadastro');
Route::get('/acoes/buscar', fn() => view('acoes/buscar'))->name('acoes/buscar');

Route::get('/message/envio', fn() => view('message/envio'))->name('message/envio');
// Route::post();

