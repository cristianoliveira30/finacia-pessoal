@props([
    'id' => null,           // Identificador do card (ex: 'gestao', 'financas')
    'value' => '0',         // Valor dinâmico vindo do Controller
])

@php
    // Definição Centralizada das Configurações dos Cards
    $definitions = [
        'gestao' => [
            'label'  => 'Índice Geral de Gestão',
            'suffix' => '/100',
            'text'   => 'composto por setores',
            'link'   => '/dashboard/central',
            'icon'   => 'speedometer2', 
            'icon_bg' => 'bg-sky-100 dark:bg-sky-900/20', // Background mais forte (100)
            'icon_text' => 'text-sky-700 dark:text-sky-400', // Texto mais escuro (700)
        ],
        'financas' => [
            'label'  => 'Execução Orçamentária',
            'suffix' => '%',
            'text'   => 'realizado / previsto',
            'link'   => '/dashboard/financas',
            'icon'   => 'currency-dollar',
            'icon_bg' => 'bg-emerald-100 dark:bg-emerald-900/20',
            'icon_text' => 'text-emerald-700 dark:text-emerald-400',
        ],
        'pendencias' => [
            'label'  => 'Pendências Críticas',
            'suffix' => '',
            'text'   => 'itens vencidos/atrasados',
            'link'   => '/dashboard/ouvidoria',
            'icon'   => 'exclamation-circle',
            'icon_bg' => 'bg-rose-100 dark:bg-rose-900/20',
            'icon_text' => 'text-rose-700 dark:text-rose-400',
        ],
        'nps' => [
            'label'  => 'Satisfação (NPS)',
            'suffix' => '',
            'text'   => 'pesquisas do cidadão',
            'link'   => '/dashboard/ouvidoria',
            'icon'   => 'emoji-smile',
            'icon_bg' => 'bg-indigo-100 dark:bg-indigo-900/20',
            'icon_text' => 'text-indigo-700 dark:text-indigo-400',
        ],
    ];

    $card = $definitions[$id] ?? null;
@endphp

@if($card)
    {{-- Wrapper Grid --}}
    <div class="grid grid-cols-1 md:grid-cols-1 gap-2 w-full">
        {{-- ALTERAÇÕES: border-slate-300 | shadow-xl | bg-white --}}
        <div class="relative w-full min-w-[260px] overflow-hidden
                    bg-white dark:bg-gradient-to-br dark:from-slate-800 dark:to-slate-900
                    p-5 rounded-2xl
                    border border-slate-300 dark:border-slate-700
                    shadow-xl transition-all duration-300 group hover:-translate-y-1">

            {{-- Efeito de Glow no fundo --}}
            <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 rounded-full blur-2xl transition-all pointer-events-none
                        opacity-20 group-hover:opacity-40
                        {{ str_replace('text-', 'bg-', $card['icon_text']) }}"></div>

            <div class="relative z-10 flex justify-between h-full">

                {{-- COLUNA ESQUERDA --}}
                <div class="flex flex-col justify-between">
                    <div class="mb-4">
                        {{-- Label: font-bold e text-slate-600 --}}
                        <p class="text-slate-600 dark:text-slate-400 text-sm font-bold mb-1 capitalize">
                            {{ $card['label'] }}
                        </p>
                        
                        {{-- Área do Valor --}}
                        <div>
                            <h3 class="text-3xl font-bold text-slate-800 dark:text-white tracking-tight">
                                {{ $value }}{{ $card['suffix'] }}
                            </h3>
                        </div>
                    </div>

                    <div class="flex items-center text-sm">
                        {{-- Subtexto: text-slate-600 --}}
                        <span class="text-slate-600 dark:text-slate-500 ml-1 font-medium truncate">
                            {{ $card['text'] }}
                        </span>
                    </div>
                </div>

                {{-- COLUNA DIREITA: ÍCONES --}}
                <div class="flex flex-col justify-between items-end pl-4">

                    {{-- 1. Ícone Personalizado (TOPO) --}}
                    {{-- Borda reforçada (border-slate-200) --}}
                    <div class="p-2.5 rounded-xl border shadow-sm transition-colors
                                {{ $card['icon_bg'] }} {{ $card['icon_text'] }}
                                border-slate-200 dark:border-slate-600">
                        
                        <x-dynamic-component :component="'bi-'.$card['icon']" class="w-6 h-6" />
                    </div>

                    {{-- 2. Ícone de Redirecionamento (FUNDO) --}}
                    <a href="{{ $card['link'] }}"
                       class="p-1.5 rounded-lg transition-colors cursor-pointer
                              text-slate-400 hover:text-sky-600 hover:bg-slate-100
                              dark:text-slate-600 dark:hover:text-sky-400 dark:hover:bg-slate-800">
                        <x-bi-arrow-right class="w-5 h-5" />
                    </a>
                </div>
            </div>
        </div>
    </div>
@else
    {{-- Fallback --}}
    <div class="p-4 bg-red-50 border border-red-300 text-red-700 rounded-lg shadow-md">
        Erro: ID "<strong>{{ $id }}</strong>" não encontrado no mainbox.
    </div>
@endif