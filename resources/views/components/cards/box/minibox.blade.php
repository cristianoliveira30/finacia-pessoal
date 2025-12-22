@props([
    'id' => null,   
])

@php
    $setores = [
        'Finanças' => ['score' => 82, 'link' => '/dashboard/financas', 'hint' => 'Execução 76%'],
        'Obras'    => ['score' => 71, 'link' => '/dashboard/obras', 'hint' => 'Obras no prazo 68%'],
        'Saúde'    => ['score' => 74, 'link' => '/dashboard/saude', 'hint' => 'Espera 42 min'],
        'Educação' => ['score' => 79, 'link' => '/dashboard/educacao', 'hint' => 'Frequência 92%'],
        'Assist.'  => ['score' => 77, 'link' => '/dashboard/assistencia', 'hint' => 'Famílias 3.210'],
        'Ouvidoria'=> ['score' => 69, 'link' => '/dashboard/ouvidoria', 'hint' => 'Resposta 19h'],
    ];

    $dados = $setores[$id] ?? null;
@endphp

@if($dados)
    {{-- ADICIONADO: 'overflow-hidden' para impedir que conteúdo vaze --}}
<div class="w-full relative min-w-0 xl:scale-85 xl:origin-top-left xl:w-[100%] xl:-mb-2">
        <x-cards.box.box-01 :config="[
            'link'   => $dados['link'],
            'prefix' => '',
            'suffix' => '/100',
            'label'  => $id,
            'value'  => $dados['score'],
            'text'   => $dados['hint']
        ]" />
    </div>
@else
    <div class="text-red-500 text-xs font-bold p-4 border border-red-200 bg-red-50 rounded">
        Setor "{{ $id }}" não encontrado.
    </div>
@endif