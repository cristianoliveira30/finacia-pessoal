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
            'icon_bg' => 'bg-sky-100 dark:bg-sky-900/20',
            'icon_text' => 'text-sky-700 dark:text-sky-400',
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
        
        {{-- WRAPPER EXTERNO (Group) --}}
        <div class="group relative w-full h-full">

            {{-- Card Original --}}
            <div class="relative w-full min-w-[260px] overflow-hidden h-full
                        bg-white dark:bg-gradient-to-br dark:from-slate-800 dark:to-slate-900
                        p-5 rounded-2xl
                        border border-slate-300 dark:border-slate-700
                        shadow-xl transition-all duration-300 hover:-translate-y-1">

                {{-- Efeito de Glow no fundo --}}
                <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 rounded-full blur-2xl transition-all pointer-events-none
                            opacity-20 group-hover:opacity-40
                            {{ str_replace('text-', 'bg-', $card['icon_text']) }}"></div>

                <div class="relative z-10 flex justify-between h-full">

                    {{-- COLUNA ESQUERDA --}}
                    <div class="flex flex-col justify-between">
                        <div class="mb-4">
                            {{-- Label --}}
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
                            {{-- Subtexto --}}
                            <span class="text-slate-600 dark:text-slate-500 ml-1 font-medium truncate">
                                {{ $card['text'] }}
                            </span>
                        </div>
                    </div>

                    {{-- COLUNA DIREITA: ÍCONES --}}
                    <div class="flex flex-col justify-between items-end pl-4">

                        {{-- 1. Ícone Personalizado (TOPO) --}}
                        {{-- Adicionado group/icon e relative --}}
                        <div class="group/icon relative p-2.5 rounded-xl border shadow-sm transition-colors
                                    {{ $card['icon_bg'] }} {{ $card['icon_text'] }}
                                    border-slate-200 dark:border-slate-600">
                            
                            <x-dynamic-component :component="'bi-'.$card['icon']" class="w-6 h-6" />

                            {{-- Tooltip do Ícone (Aparece à esquerda) --}}
                            <div class="absolute right-full top-1/2 -translate-y-1/2 mr-3 w-max px-2 py-1
                                        bg-slate-800 text-white text-[10px] font-bold rounded shadow-lg
                                        opacity-0 invisible group-hover/icon:opacity-100 group-hover/icon:visible
                                        transition-all duration-200 translate-x-2 group-hover/icon:translate-x-0
                                        pointer-events-none z-20">
                                Ver {{ Str::limit($card['label'], 15) }}
                                {{-- Seta lateral --}}
                                <div class="absolute top-1/2 right-0 -mr-1 -mt-1 w-2 h-2 bg-slate-800 rotate-45"></div>
                            </div>
                        </div>

                        {{-- 2. Ícone de Redirecionamento (FUNDO) --}}
                        {{-- Adicionado group/link e relative --}}
                        <a href="{{ $card['link'] }}"
                           class="group/link relative p-1.5 rounded-lg transition-colors cursor-pointer
                                  text-slate-400 hover:text-sky-600 hover:bg-slate-100
                                  dark:text-slate-600 dark:hover:text-sky-400 dark:hover:bg-slate-800">
                            
                            <x-bi-arrow-right class="w-5 h-5" />

                            {{-- Tooltip da Seta (Aparece à esquerda) --}}
                            <div class="absolute right-full top-1/2 -translate-y-1/2 mr-2 w-max px-2 py-1
                                        bg-slate-700 text-white text-[10px] font-bold rounded shadow-sm
                                        opacity-0 invisible group-hover/link:opacity-100 group-hover/link:visible
                                        transition-all duration-200 translate-x-2 group-hover/link:translate-x-0
                                        pointer-events-none z-20">
                                ir para relatorios
                                {{-- Seta lateral --}}
                                <div class="absolute top-1/2 right-0 -mr-1 -mt-1 w-2 h-2 bg-slate-700 rotate-45"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            {{-- TOOLTIP GERAL (Abaixo do Card - Fora do overflow) --}}
            <div class="absolute top-full left-1/2 -translate-x-1/2 mt-3 w-max px-3 py-1.5
                        bg-slate-800 text-white text-xs font-medium rounded-lg shadow-xl
                        opacity-0 invisible group-hover:opacity-100 group-hover:visible 
                        transition-all duration-300 transform -translate-y-2 group-hover:translate-y-0
                        z-[99] pointer-events-none">
                
                {{-- Seta superior --}}
                <div class="absolute bottom-full left-1/2 -translate-x-1/2 border-4 border-transparent border-b-slate-800"></div>
                
                Visualizar detalhes de {{ $card['label'] }}
            </div>

        </div>
    </div>
@else
    {{-- Fallback --}}
    <div class="p-4 bg-red-50 border border-red-300 text-red-700 rounded-lg shadow-md">
        Erro: ID "<strong>{{ $id }}</strong>" não encontrado no mainbox.
    </div>
@endif