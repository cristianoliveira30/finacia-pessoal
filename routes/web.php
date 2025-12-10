<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', fn() => view('home'))->name('home');
Route::get('/usuario', fn() => view('usuario'))->name('usuario');
