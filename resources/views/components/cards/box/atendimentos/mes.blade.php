@props([
    'config' => [],
    'cardId' => 'card-' . uniqid(),
])
@php
    $valuePrefix = data_get($config, 'value_prefix', '');
    $valueSuffix = data_get($config, 'value_suffix', '');
    $variationSuffix = data_get($config, 'variation_suffix', '%');

    // Configurações padrão para Atendimentos Mês
    $weekLabel = data_get($config, 'week_label', 'Total Mensal');
    $weekValue = data_get($config, 'week_value', '842');
    $weekRanges = data_get($config, 'data_range_label', 'este mês');

    $variation = data_get($config, 'variation', 12);
    $variationText = (is_numeric($variation) && (float) $variation >= 0)
        ? '+' . $variation
        : (string) $variation;

    $redirectUrl = data_get($config, 'redirect_url', '#'); 
@endphp

<div class="grid grid-cols-1 md:grid-cols-1 gap-2 w-full">
    <div class="relative w-full min-w-[260px] overflow-hidden
                bg-white dark:bg-gradient-to-br dark:from-slate-800 dark:to-slate-900
                p-5 rounded-2xl
                border border-slate-200 dark:border-slate-700
                shadow-sm hover:shadow-md dark:shadow-xl
                transition-all duration-300 group">
        
        {{-- Glow Effect (Violeta) --}}
        <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 rounded-full blur-2xl transition-all pointer-events-none
                    bg-violet-500/5 dark:bg-violet-500/20
                    group-hover:bg-violet-500/10 dark:group-hover:bg-violet-500/30"></div>
        
        <div class="relative z-10 flex justify-between h-full">
            
            {{-- COLUNA ESQUERDA --}}
            <div class="flex flex-col justify-between">
                <div class="mb-4">
                    <p class="text-slate-500 dark:text-slate-400 text-sm font-medium mb-1 capitalize">
                        {{ $weekLabel }}
                    </p>
                    <h3 class="text-3xl font-bold text-slate-800 dark:text-white tracking-tight">
                        {{ $valuePrefix }}{{ $weekValue }}{{ $valueSuffix}}
                    </h3>
                </div>

                <div class="flex items-center text-sm">
                    <span class="font-medium flex items-center px-2 py-0.5 rounded border
                                 bg-emerald-50 text-emerald-700 border-emerald-100
                                 dark:bg-emerald-500/10 dark:text-emerald-400 dark:border-emerald-500/20">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-1">
                            <path d="M7 7h10v10"/><path d="M7 17 17 7"/>
                        </svg>
                        <span>{{ $variationText }}{{ $variationSuffix }}</span>
                    </span>
                    <span class="text-slate-500 dark:text-slate-500 ml-3 font-medium truncate">
                        {{ $weekRanges }}
                    </span>
                </div>
            </div>

            {{-- COLUNA DIREITA --}}
            <div class="flex flex-col justify-between items-end pl-4">
                
                {{-- Ícone de Histórico/Lista de Atendimentos --}}
                <div class="p-2.5 rounded-xl border shadow-sm transition-colors
                            bg-violet-50 border-violet-100 text-violet-600
                            dark:bg-slate-700/50 dark:border-slate-600 dark:text-violet-400">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                        <polyline points="14 2 14 8 20 8"/>
                        <line x1="16" y1="13" x2="8" y2="13"/>
                        <line x1="16" y1="17" x2="8" y2="17"/>
                        <polyline points="10 9 9 9 8 9"/>
                    </svg>
                </div>

                {{-- Seta de Redirecionamento --}}  
                <a href="{{ $redirectUrl }}" 
                   class="p-1.5 rounded-lg transition-colors cursor-pointer
                          text-slate-400 hover:text-violet-600 hover:bg-violet-50 
                          dark:text-slate-600 dark:hover:text-violet-400 dark:hover:bg-slate-800">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14"/><path d="m12 5 7 7-7 7"/>
                    </svg>
                </a>

            </div>

        </div>
    </div>
</div>