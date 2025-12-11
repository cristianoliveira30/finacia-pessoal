<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', fn() => view('home'))->name('home');
Route::get('/usuario', fn() => view('cadastro.usuario'))->name('usuario');
Route::get('/report', fn() => view('reports.default'))->name('report');
