@props([
    'id' => null,
])

@php
    $setores = [
        'Finanças' => [
            'score' => 82, 
            'link' => '/dashboard/financas', 
            'hint' => 'Execução 76%',
            'icon_name' => 'bi-currency-dollar',
            'color' => 'text-emerald-600' // Ajustado para 600 para melhor contraste
        ],
        'Obras' => [
            'score' => 71, 
            'link' => '/dashboard/obras', 
            'hint' => 'Prazo 68%',
            'icon_name' => 'bi-cone-striped',
            'color' => 'text-orange-600'
        ],
        'Saúde' => [
            'score' => 74, 
            'link' => '/dashboard/saude', 
            'hint' => 'Espera 42 min',
            'icon_name' => 'bi-heart-pulse',
            'color' => 'text-rose-600'
        ],
        'Educação' => [
            'score' => 79, 
            'link' => '/dashboard/educacao', 
            'hint' => 'Freq. 92%',
            'icon_name' => 'bi-book',
            'color' => 'text-blue-600'
        ],
        'Assist.' => [
            'score' => 77, 
            'link' => '/dashboard/assistencia', 
            'hint' => 'Famílias 3k',
            'icon_name' => 'bi-people',
            'color' => 'text-purple-600'
        ],
        'Ouvidoria' => [
            'score' => 69, 
            'link' => '/dashboard/ouvidoria', 
            'hint' => 'Resp. 19h',
            'icon_name' => 'bi-headset',
            'color' => 'text-yellow-600'
        ],
    ];

    $dados = $setores[$id] ?? null;
@endphp

@if($dados)
    {{-- Container Principal --}}
    {{-- ALTERAÇÕES: border-slate-300 | shadow-xl | bg-white --}}
    <div class="relative w-full overflow-hidden
                bg-white dark:bg-gradient-to-br dark:from-slate-800 dark:to-slate-900
                p-4 rounded-2xl
                border border-slate-300 dark:border-slate-700
                shadow-xl transition-all duration-300 group hover:-translate-y-1">

        {{-- Decoração de Fundo (Blur) --}}
        <div class="absolute top-0 right-0 -mt-4 -mr-4 w-16 h-16 rounded-full blur-xl transition-all pointer-events-none
                    bg-sky-500/5 dark:bg-sky-500/20
                    group-hover:bg-sky-500/10 dark:group-hover:bg-sky-500/30"></div>

        <div class="relative z-10 flex justify-between h-full items-start">

            {{-- COLUNA ESQUERDA --}}
            <div class="flex flex-col justify-between h-full space-y-2">
                
                {{-- Label: text-slate-600 e font-bold --}}
                <p class="text-slate-600 dark:text-slate-400 text-xs font-bold uppercase tracking-wider">
                    {{ $id }}
                </p>

                {{-- Valor (Score) --}}
                <div>
                    <h3 class="text-2xl font-bold text-slate-800 dark:text-white tracking-tight leading-none">
                        {{ $dados['score'] }}<span class="text-sm text-slate-400 font-normal ml-0.5">/100</span>
                    </h3>
                </div>

                {{-- Hint: text-slate-600 --}}
                <div class="flex items-center pt-1">
                    <span class="text-xs text-slate-600 dark:text-slate-500 font-semibold truncate">
                        {{ $dados['hint'] }}
                    </span>
                </div>
            </div>

            {{-- COLUNA DIREITA --}}
            <div class="flex flex-col justify-between items-end h-full pl-2 space-y-3">

                {{-- 1. Ícone Personalizado --}}
                {{-- Border reforçada (border-slate-200) e bg-slate-50 para destaque --}}
                <div class="p-2 rounded-xl border shadow-sm transition-colors
                            bg-slate-50 border-slate-200 {{ $dados['color'] }}
                            dark:bg-slate-700/50 dark:border-slate-600">
                    
                    @if(isset($dados['icon_name']))
                        <x-dynamic-component :component="$dados['icon_name']" class="w-5 h-5" />
                    @else
                        <x-bi-clipboard-data class="w-5 h-5"/>
                    @endif
                </div>

                {{-- 2. Seta de Link --}}
                <a href="{{ $dados['link'] }}"
                   class="p-1 rounded-lg transition-colors cursor-pointer block
                          text-slate-400 hover:text-sky-600 hover:bg-slate-100
                          dark:text-slate-600 dark:hover:text-sky-400 dark:hover:bg-slate-800">
                    <x-bi-arrow-right-short class="w-5 h-5" />
                </a>
            </div>
        </div>
    </div>
@else
    <div class="text-red-600 text-xs font-bold p-4 border border-red-300 bg-red-50 rounded shadow-md">
        "{{ $id }}" n/a
    </div>
@endif