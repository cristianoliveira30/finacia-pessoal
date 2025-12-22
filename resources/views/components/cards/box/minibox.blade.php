@props([
    'id' => null, 
])

@php
    $setores = [
        'Finanças' => [
            'score' => 82, 
            'link' => '/dashboard/financas', 
            'hint' => 'Execução 76%',
            // Ícone: Cifrão / Dinheiro
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-emerald-500"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>'
        ],
        'Obras' => [
            'score' => 71, 
            'link' => '/dashboard/obras', 
            'hint' => 'Obras no prazo 68%',
            // Ícone: Cone de Obra / Construção
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-orange-500"><path d="M22 22H2"/><path d="M5.45 22 12 3l6.55 19"/><path d="M9.3 11h5.4"/><path d="M7.6 16h8.8"/></svg>'
        ],
        'Saúde' => [
            'score' => 74, 
            'link' => '/dashboard/saude', 
            'hint' => 'Espera 42 min',
            // Ícone: Coração com Pulso
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-rose-500"><path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/></svg>'
        ],
        'Educação' => [
            'score' => 79, 
            'link' => '/dashboard/educacao', 
            'hint' => 'Frequência 92%',
            // Ícone: Livro
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-500"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>'
        ],
        'Assist.' => [
            'score' => 77, 
            'link' => '/dashboard/assistencia', 
            'hint' => 'Famílias 3.210',
            // Ícone: Pessoas / Família
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-purple-500"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>'
        ],
        'Ouvidoria' => [
            'score' => 69, 
            'link' => '/dashboard/ouvidoria', 
            'hint' => 'Resposta 19h',
            // Ícone: Headset / Atendimento
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-yellow-500"><path d="M3 18v-6a9 9 0 0 1 18 0v6"/><path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z"/></svg>'
        ],
    ];

    $dados = $setores[$id] ?? null;
@endphp

@if($dados)
    <div class="w-full relative min-w-0 xl:scale-85 xl:origin-top-left xl:w-[100%] xl:-mb-2">
        <x-cards.box.box-01 :config="[
            'link'   => $dados['link'],
            'prefix' => '',
            'suffix' => '/100',
            'label'  => $id,
            'value'  => $dados['score'],
            'text'   => $dados['hint'],
            'icon'   => $dados['icon'] ?? null  // Passa o ícone SVG aqui
        ]" 
        hide-trend="true"
        />
    </div>
@else
    <div class="text-red-500 text-xs font-bold p-4 border border-red-200 bg-red-50 rounded">
        Setor "{{ $id }}" não encontrado.
    </div>
@endif