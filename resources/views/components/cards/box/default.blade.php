@props([
    'config' => [], // Array de configuração
    'cardId' => 'card-' . uniqid(), // Gera um ID único para o cartão
])

@php
    // Formatação de dados com valores padrão de fallback
    $valuePrefix = data_get($config, 'value_prefix', '$');
    $valueSuffix = data_get($config, 'value_suffix', '');
    $variationSuffix = data_get($config, 'variation_suffix', '%');

    // Dados do card semanal
    $weekLabel = data_get($config, 'week_label', 'vendas');
    $weekValue = data_get($config, 'week_value', '5678');
    $weekRanges = data_get($config, 'data_range_label', 'essa semana');

    // Dados do card mensal
    $monthLabel = data_get($config, 'month_label', 'faturamento');
    $monthValue = data_get($config, 'month_value', '24500');
    $monthRanges = data_get($config, 'data_range_label', 'esse mês');

    // Opcional: Calcular se é positivo ou negativo
    $isPositive = true;
@endphp

{{-- Wrapper Grid para os dois cards --}}
<div class="grid grid-cols-1 md:grid-cols-2 gap-4 w-full">

    {{-- CARD 1: VENDAS SEMANAIS (Tema Indigo) --}}
    <div
        class="relative w-full min-w-[260px] overflow-hidden
                bg-white dark:bg-gradient-to-br dark:from-slate-800 dark:to-slate-900
                p-5 rounded-2xl
                border border-slate-200 dark:border-slate-700
                shadow-sm hover:shadow-md dark:shadow-xl
                transition-all duration-300 group">

        <!-- Glow Indigo -->
        <div
            class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 rounded-full blur-2xl transition-all pointer-events-none
                    bg-indigo-500/5 dark:bg-indigo-500/20
                    group-hover:bg-indigo-500/10 dark:group-hover:bg-indigo-500/30">
        </div>

        <div class="relative z-10">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <p class="text-slate-500 dark:text-slate-400 text-sm font-medium mb-1 capitalize">
                        {{ $weekLabel }}
                    </p>
                    <h3 class="text-3xl font-bold text-slate-800 dark:text-white tracking-tight">
                        {{ $valuePrefix }}{{ $weekValue }}{{ $valueSuffix }}
                    </h3>
                </div>

                <!-- Ícone Indigo -->
                <div
                    class="p-2.5 rounded-xl border shadow-sm transition-colors
                            bg-indigo-50 border-indigo-100 text-indigo-600
                            dark:bg-slate-700/50 dark:border-slate-600 dark:text-indigo-400">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <rect width="20" height="14" x="2" y="5" rx="2" />
                        <line x1="2" x2="22" y1="10" y2="10" />
                    </svg>
                </div>
            </div>

            <div class="flex items-center text-sm">
                <span
                    class="font-medium flex items-center px-2 py-0.5 rounded border
                             bg-emerald-50 text-emerald-700 border-emerald-100
                             dark:bg-emerald-500/10 dark:text-emerald-400 dark:border-emerald-500/20">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="mr-1">
                        <path d="M7 7h10v10" />
                        <path d="M7 17 17 7" />
                    </svg>
                    <span>+12{{ $variationSuffix }}</span>
                </span>
                <span class="text-slate-500 dark:text-slate-500 ml-3 font-medium truncate">
                    {{ $weekRanges }}
                </span>
            </div>
        </div>
    </div>

    {{-- CARD 2: VENDAS MENSAIS (Tema Sky/Azul) --}}
    <div
        class="relative w-full min-w-[260px] overflow-hidden
                bg-white dark:bg-gradient-to-br dark:from-slate-800 dark:to-slate-900
                p-5 rounded-2xl
                border border-slate-200 dark:border-slate-700
                shadow-sm hover:shadow-md dark:shadow-xl
                transition-all duration-300 group">

        <!-- Glow Sky (Diferente do Indigo) -->
        <div
            class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 rounded-full blur-2xl transition-all pointer-events-none
                    bg-sky-500/5 dark:bg-sky-500/20
                    group-hover:bg-sky-500/10 dark:group-hover:bg-sky-500/30">
        </div>

        <div class="relative z-10">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <p class="text-slate-500 dark:text-slate-400 text-sm font-medium mb-1 capitalize">
                        {{ $monthLabel }}
                    </p>
                    <h3 class="text-3xl font-bold text-slate-800 dark:text-white tracking-tight">
                        {{ $valuePrefix }}{{ $monthValue }}{{ $valueSuffix }}
                    </h3>
                </div>

                <!-- Ícone Sky (Muda apenas a cor do acento para diferenciar) -->
                <div
                    class="p-2.5 rounded-xl border shadow-sm transition-colors
                            bg-sky-50 border-sky-100 text-sky-600
                            dark:bg-slate-700/50 dark:border-slate-600 dark:text-sky-400">
                    {{-- Ícone de Gráfico/Barra para diferenciar do cartão de crédito --}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M3 3v18h18" />
                        <path d="M18 17V9" />
                        <path d="M13 17V5" />
                        <path d="M8 17v-3" />
                    </svg>
                </div>
            </div>

            <div class="flex items-center text-sm">
                <span
                    class="font-medium flex items-center px-2 py-0.5 rounded border
                             bg-emerald-50 text-emerald-700 border-emerald-100
                             dark:bg-emerald-500/10 dark:text-emerald-400 dark:border-emerald-500/20">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="mr-1">
                        <path d="M7 7h10v10" />
                        <path d="M7 17 17 7" />
                    </svg>
                    <span>+8{{ $variationSuffix }}</span>
                </span>
                <span class="text-slate-500 dark:text-slate-500 ml-3 font-medium truncate">
                    {{ $monthRanges }}
                </span>
            </div>
        </div>
    </div>
</div>
