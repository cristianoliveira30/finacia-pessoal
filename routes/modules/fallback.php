<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::match(['get', 'post'], '/em-construcao', function() {
    return view('errors.nodata', [
        'title' => 'Em Breve',
        'route_name' => 'Funcionalidade em desenvolvimento'
    ]);
})->name('#');

// 2. Resolve as outras rotas específicas que estão no seu menu mas não existem
// Basta adicionar o nome da rota nesta lista array:
$rotasFaltantes = [
    'saude.estoque.vacina',
    'saude.urgencia.leitos',
    'saude.vigilancia.notificacoes',
    // ... adicione aqui qualquer outra que estiver dando erro
];

foreach ($rotasFaltantes as $nomeRota) {
    Route::view('/construcao/' . str_replace('.', '/', $nomeRota), 'errors.nodata', [
        'title' => 'Em Construção',
        'route_name' => $nomeRota
    ])->name($nomeRota);
}

Route::fallback(function (Request $request) {
    // 1. Se tentar acessar a raiz e não tiver nada, joga pro login
    if ($request->path() === '/') {
        return redirect()->route('login');
    }

    // 2. Cria um título bonito baseado na URL (ex: "saude/relatorios/novo" vira "Saude > Relatorios > Novo")
    $caminho = $request->path();
    $tituloAmigavel = ucwords(str_replace(['/', '-', '_'], [' > ', ' ', ' '], $caminho));

    // 3. Retorna a sua view de "Sem Dados / Em Construção" com status 404 real
    return response()->view('errors.nodata', [
        'title'      => 'Em Desenvolvimento',
        'route_name' => $tituloAmigavel,
        'error_msg'  => 'A funcionalidade solicitada ainda não está mapeada no sistema.'
    ], 404);
});
