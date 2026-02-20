<?php

//troca de perfil

use App\Http\Controllers\AnalisesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/notifications/send', [NotificationController::class, 'send']);
Route::put('/user/profile/update', [UserController::class, 'updateProfile'])->name('user.profile.update');

Route::get('/home', [DashboardController::class, 'index'])->name('home');
// rotas de usuario
Route::get('/usuario/cadastro', fn() => view('usuario/cadastro'))->name('usuario.cadastro');
Route::get('/usuario/buscar', fn() => view('usuario/buscar'))->name('usuario.buscar');
// rotas Calendario
Route::get('/calendario/calendario', fn() => view('calendario/calendario'))->name('calendario.calendario');
Route::get('/calendario/calendario-pessoal', fn() => view('calendario/calendario-pessoal'))->name('calendario.calendario-pessoal');
// rotas Eleitor
Route::get('/eleitor/cadastro', fn() => view('eleitor/cadastro'))->name('eleitor.cadastro');
Route::get('/eleitor/buscar', fn() => view('eleitor/buscar'))->name('eleitor.buscar');
// rotas Atendimento
Route::get('/atendimento/cadastro', fn() => view('atendimento/cadastro'))->name('atendimento.cadastro');
Route::get('/atendimento/buscar', fn() => view('atendimento/buscar'))->name('atendimento.buscar');
// rotas Cadastro
Route::get('/acoes/cadastro', fn() => view('acoes/cadastro'))->name('acoes.cadastro');
Route::get('/acoes/buscar', fn() => view('acoes/buscar'))->name('acoes.buscar');
// rotas Message
Route::get('/message/envio', fn() => view('message/envio'))->name('message.envio');
// rota de relatorio
Route::get('/report', fn() => view('reports/default'))->name('report.default');

//rota de tela em construção
Route::view('/errors', 'errors.nodata')->name('errors.nodata');

Route::post('/ai/analise', [AnalisesController::class, 'analise'])->name('ai.analise');

// -----------------------------
// MODO TV
// -----------------------------

Route::prefix('tv')->name('tv.')->group(function () {
    Route::view('/', 'home-tv')->name('index');

    Route::view('/financeiro', 'financeiro.tv-financeiro')->name('financeiro');
    Route::view('/saude', 'saude.tv-saude')->name('saude');
    Route::view('/educacao', 'educacao.tv-educacao')->name('educacao');
});

// -----------------------------
// prefeitura
// -----------------------------
Route::prefix('prefeito')->name('prefeito.')->group(function () {
    Route::view('/gabinete', 'prefeito.gabinete.secretaria')->name('gabinete');
});
