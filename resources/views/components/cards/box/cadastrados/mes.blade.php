@props([
    'config' => [], // Array de configuração
    'cardId' => 'card-' . uniqid(), // Gera um ID único para o cartão
])

@php
    // Formatação de dados adaptada para PESSOAS/ELEITORES
    // Default prefix vazio (não é dinheiro)
    $valuePrefix = data_get($config, 'prefix', ''); 
    $valueSuffix = data_get($config, 'suffix', '');
    $variationSuffix = data_get($config, 'variation_suffix', '%');

    // Dados do card (Labels de Eleitorado)
    $monthLabel = data_get($config, 'label', 'Eleitores Cadastrados');
    $monthValue = data_get($config, 'value', '1.240'); // Valor numérico exemplo
    $monthRanges = data_get($config, 'data_range_label', 'neste período');

    // URL de redirecionamento
    $redirectUrl = data_get($config, 'link', '#');
@endphp

{{-- Wrapper Grid --}}
<div class="grid grid-cols-1 gap-2 w-full">
    
    {{-- CARD: ELEITORES (Mantendo o tema Sky/Azul que remete a confiança/governo) --}}
    <div class="relative w-full min-w-[260px] overflow-hidden
                bg-white dark:bg-gradient-to-br dark:from-slate-800 dark:to-slate-900
                p-5 rounded-2xl
                border border-slate-200 dark:border-slate-700
                shadow-sm hover:shadow-md dark:shadow-xl
                transition-all duration-300 group">

        {{-- Efeito de Blur no fundo --}}
        <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 rounded-full blur-2xl transition-all pointer-events-none
                    bg-sky-500/5 dark:bg-sky-500/20
                    group-hover:bg-sky-500/10 dark:group-hover:bg-sky-500/30"></div>

        <div class="relative z-10 flex justify-between h-full">

            {{-- COLUNA ESQUERDA: Textos e Badge --}}
            <div class="flex flex-col justify-between">
                {{-- Parte Superior: Label e Valor --}}
                <div class="mb-4">
                    <p class="text-slate-500 dark:text-slate-400 text-sm font-medium mb-1 capitalize">
                        {{ $monthLabel }}
                    </p>
                    <h3 class="text-3xl font-bold text-slate-800 dark:text-white tracking-tight">
                        {{ $valuePrefix }}{{ $monthValue }}{{ $valueSuffix}}
                    </h3>
                </div>

                {{-- Parte Inferior: Badge de Variação (Novos Cadastros) --}}
                <div class="flex items-center text-sm">
                    <span class="font-medium flex items-center px-2 py-0.5 rounded border
                                 bg-emerald-50 text-emerald-700 border-emerald-100
                                 dark:bg-emerald-500/10 dark:text-emerald-400 dark:border-emerald-500/20">
                        {{-- Ícone de Seta para Cima --}}
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-1">
                            <path d="M7 7h10v10"/><path d="M7 17 17 7"/>
                        </svg>
                        <span>+12{{ $variationSuffix }}</span>
                    </span>
                    <span class="text-slate-500 dark:text-slate-500 ml-3 font-medium truncate">
                        {{ $monthRanges }}
                    </span>
                </div>
            </div>

            {{-- COLUNA DIREITA: Ícones --}}
            <div class="flex flex-col justify-between items-end pl-4">

                {{-- 1. Ícone Representativo (Alterado para PESSOAS/ELEITORES) --}}
                <div class="p-2.5 rounded-xl border shadow-sm transition-colors
                            bg-sky-50 border-sky-100 text-sky-600
                            dark:bg-slate-700/50 dark:border-slate-600 dark:text-sky-400">
                    {{-- Ícone de "Users" / Grupo de Pessoas --}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                        <circle cx="9" cy="7" r="4"/>
                        <path d="M22 21v-2a4 4 0 0 0-3-3.87"/>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                    </svg>
                </div>

                {{-- 2. Ícone de Redirecionamento (FUNDO) --}}
                <a href="{{ $redirectUrl }}"
                   class="p-1.5 rounded-lg transition-colors cursor-pointer
                          text-slate-400 hover:text-sky-600 hover:bg-sky-50
                          dark:text-slate-600 dark:hover:text-sky-400 dark:hover:bg-slate-800"
                   title="Ver lista de eleitores">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14"/><path d="m12 5 7 7-7 7"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>