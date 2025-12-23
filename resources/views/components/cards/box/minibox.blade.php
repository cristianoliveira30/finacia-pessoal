@props([
    'id' => null,
])

@php
    $setores = [
        'Finanças' => [
            'score' => 82, 
            'link' => '/dashboard/financas', 
            'hint' => 'Execução 76%',
            // Componente: bi-currency-dollar
            'icon_name' => 'bi-currency-dollar',
            'color' => 'text-emerald-500'
        ],
        'Obras' => [
            'score' => 71, 
            'link' => '/dashboard/obras', 
            'hint' => 'Prazo 68%',
            // Componente: bi-cone-striped
            'icon_name' => 'bi-cone-striped',
            'color' => 'text-orange-500'
        ],
        'Saúde' => [
            'score' => 74, 
            'link' => '/dashboard/saude', 
            'hint' => 'Espera 42 min',
            // Componente: bi-heart-pulse
            'icon_name' => 'bi-heart-pulse',
            'color' => 'text-rose-500'
        ],
        'Educação' => [
            'score' => 79, 
            'link' => '/dashboard/educacao', 
            'hint' => 'Freq. 92%',
            // Componente: bi-book
            'icon_name' => 'bi-book',
            'color' => 'text-blue-500'
        ],
        'Assist.' => [
            'score' => 77, 
            'link' => '/dashboard/assistencia', 
            'hint' => 'Famílias 3k',
            // Componente: bi-people
            'icon_name' => 'bi-people',
            'color' => 'text-purple-500'
        ],
        'Ouvidoria' => [
            'score' => 69, 
            'link' => '/dashboard/ouvidoria', 
            'hint' => 'Resp. 19h',
            // Componente: bi-headset
            'icon_name' => 'bi-headset',
            'color' => 'text-yellow-500'
        ],
    ];

    $dados = $setores[$id] ?? null;
@endphp

@if($dados)
    {{-- Container Principal (Estilo baseado no box-01, mas ajustado para tamanho Mini) --}}
    <div class="relative w-full overflow-hidden
                bg-white dark:bg-gradient-to-br dark:from-slate-800 dark:to-slate-900
                p-4 rounded-2xl
                border border-slate-200 dark:border-slate-700
                shadow-sm hover:shadow-md dark:shadow-xl
                transition-all duration-300 group">

        {{-- Decoração de Fundo (Blur) --}}
        <div class="absolute top-0 right-0 -mt-4 -mr-4 w-16 h-16 rounded-full blur-xl transition-all pointer-events-none
                    bg-sky-500/5 dark:bg-sky-500/20
                    group-hover:bg-sky-500/10 dark:group-hover:bg-sky-500/30"></div>

        <div class="relative z-10 flex justify-between h-full items-start">

            {{-- COLUNA ESQUERDA: Label, Valor e Hint --}}
            <div class="flex flex-col justify-between h-full space-y-2">
                
                {{-- Label --}}
                <p class="text-slate-500 dark:text-slate-400 text-xs font-semibold uppercase tracking-wider">
                    {{ $id }}
                </p>

                {{-- Valor (Score) --}}
                <div>
                    <h3 class="text-2xl font-bold text-slate-800 dark:text-white tracking-tight leading-none">
                        {{ $dados['score'] }}<span class="text-sm text-slate-400 font-normal ml-0.5">/100</span>
                    </h3>
                </div>

                {{-- Hint (Texto inferior) --}}
                <div class="flex items-center pt-1">
                    <span class="text-xs text-slate-500 dark:text-slate-500 font-medium truncate">
                        {{ $dados['hint'] }}
                    </span>
                </div>
            </div>

            {{-- COLUNA DIREITA: Ícone e Link --}}
            <div class="flex flex-col justify-between items-end h-full pl-2 space-y-3">

                {{-- 1. Ícone Personalizado --}}
                <div class="p-2 rounded-xl border shadow-sm transition-colors
                            bg-sky-50 border-sky-100 {{ $dados['color'] }}
                            dark:bg-slate-700/50 dark:border-slate-600">
                    
                    {{-- Renderização Dinâmica do Ícone Blade --}}
                    @if(isset($dados['icon_name']))
                        <x-dynamic-component :component="$dados['icon_name']" class="w-5 h-5" />
                    @else
                        <x-bi-clipboard-data class="w-5 h-5"/>
                    @endif
                </div>

                {{-- 2. Seta de Link --}}
                <a href="{{ $dados['link'] }}"
                   class="p-1 rounded-lg transition-colors cursor-pointer block
                          text-slate-400 hover:text-sky-600 hover:bg-sky-50
                          dark:text-slate-600 dark:hover:text-sky-400 dark:hover:bg-slate-800">
                    <x-bi-arrow-right-short class="w-5 h-5" />
                </a>
            </div>
        </div>
    </div>
@else
    <div class="text-red-500 text-xs font-bold p-4 border border-red-200 bg-red-50 rounded">
        "{{ $id }}" n/a
    </div>
@endif