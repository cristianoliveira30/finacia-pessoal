@props([
    'config' => [], // Array de configuração
    'cardId' => 'card-' . uniqid(), // Gera um ID único para o cartão
])

@php
    // Formatação de dados com valores padrão de fallback
    $valuePrefix = data_get($config, 'prefix', 'R$');

    // Dados do card
    $monthLabel = data_get($config, 'label', 'faturamento');
    $monthValue = data_get($config, 'value', '24500');
@endphp

{{-- Wrapper Grid para os dois cards --}}
<div class="grid grid-cols-1 md:grid-cols-1 gap-2 w-full">
    {{-- CARD 2: VENDAS MENSAIS (Tema Sky/Azul) --}}
    <div class="relative w-full min-w-[260px] overflow-hidden
                bg-white dark:bg-gradient-to-br dark:from-slate-800 dark:to-slate-900
                p-5 rounded-2xl
                border border-slate-200 dark:border-slate-700
                shadow-sm hover:shadow-md dark:shadow-xl
                transition-all duration-300 group">

        <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 rounded-full blur-2xl transition-all pointer-events-none
                    bg-sky-500/5 dark:bg-sky-500/20
                    group-hover:bg-sky-500/10 dark:group-hover:bg-sky-500/30"></div>

        {{--
            ESTRUTURA FLEX: Divide o card em Coluna Esquerda (Texto) e Direita (Ícones)
            Mantém o alinhamento vertical e o afastamento solicitado.
        --}}
        <div class="relative z-10 flex justify-between h-full">

            {{-- COLUNA ESQUERDA: Textos e Badge --}}
            <div class="flex flex-col justify-between">
                {{-- Parte Superior: Label e Valor --}}
                <div class="mb-4">
                    <p class="text-slate-500 dark:text-slate-400 text-sm font-medium mb-1 capitalize">
                        {{ $monthLabel }}
                    </p>
                    <h3 class="text-3xl font-bold text-slate-800 dark:text-white tracking-tight">
                        {{ $valuePrefix }} {{ $monthValue }}
                    </h3>
                </div>
            </div>

            {{-- COLUNA DIREITA: Ícones (Topo e Fundo) --}}
            <div class="flex flex-col justify-between items-end pl-4">
                <div class="p-2.5 rounded-xl border shadow-sm transition-colors
                            bg-sky-50 border-sky-100 text-sky-600
                            dark:bg-slate-700/50 dark:border-slate-600 dark:text-sky-400">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 3v18h18"/><path d="M18 17V9"/><path d="M13 17V5"/><path d="M8 17v-3"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>
