@props([
    'config' => [],
    'cardId' => 'card-acoes-' . uniqid(),
])
@php
    $valuePrefix = data_get($config, 'value_prefix', '');
    $valueSuffix = data_get($config, 'value_suffix', '');
    $variationSuffix = data_get($config, 'variation_suffix', '%');

    // PADRÕES POLÍTICOS
    $weekLabel = data_get($config, 'week_label', 'Ações de Rua'); // Ex: Panfletagens, Comícios
    $weekValue = data_get($config, 'week_value', '42'); 
    $weekRange = data_get($config, 'data_range_label', 'vs. semana anterior');

    // Variação
    $variation = data_get($config, 'variation', 8); 
    $isPositive = (float) $variation >= 0;
    $variationText = $isPositive ? '+' . $variation : (string) $variation;

    // Cores (Amber/Laranja para Campanha Ativa)
    $badgeColors = $isPositive 
        ? 'bg-amber-50 text-amber-700 border-amber-100 dark:bg-amber-500/10 dark:text-amber-400 dark:border-amber-500/20'
        : 'bg-slate-50 text-slate-600 border-slate-100 dark:bg-slate-500/10 dark:text-slate-400 dark:border-slate-500/20';

    $redirectUrl = data_get($config, 'redirect_url', '#'); 
@endphp

<div class="grid grid-cols-1 md:grid-cols-1 gap-2 w-full">
    <div class="relative w-full min-w-[260px] overflow-hidden
                bg-white dark:bg-gradient-to-br dark:from-slate-800 dark:to-slate-900
                p-5 rounded-2xl
                border border-slate-200 dark:border-slate-700
                shadow-sm hover:shadow-md dark:shadow-xl
                transition-all duration-300 group">
        
        {{-- Glow Effect (Laranja para "Energia de Campanha") --}}
        <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 rounded-full blur-2xl transition-all pointer-events-none
                    bg-amber-500/5 dark:bg-amber-500/20
                    group-hover:bg-amber-500/10 dark:group-hover:bg-amber-500/30"></div>
        
        <div class="relative z-10 flex justify-between h-full">
            
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
                    <span class="font-medium flex items-center px-2 py-0.5 rounded border {{ $badgeColors }}">
                        {{-- Ícone de Tendência --}}
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-1">
                            @if($isPositive)
                                <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                <polyline points="17 6 23 6 23 12"></polyline>
                            @else
                                <polyline points="23 18 13.5 8.5 8.5 13.5 1 6"></polyline>
                                <polyline points="17 18 23 18 23 12"></polyline>
                            @endif
                        </svg>
                        <span>{{ $variationText }}{{ $variationSuffix }}</span>
                    </span>
                    <span class="text-slate-500 dark:text-slate-500 ml-3 font-medium truncate text-xs">
                        {{ $weekRange }}
                    </span>
                </div>
            </div>

            <div class="flex flex-col justify-between items-end pl-4">
                
                {{-- Ícone: Megafone (Campanha/Divulgação) --}}
                <div class="p-2.5 rounded-xl border shadow-sm transition-colors
                            bg-amber-50 border-amber-100 text-amber-600
                            dark:bg-slate-700/50 dark:border-slate-600 dark:text-amber-400">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m3 11 18-5v12L3 14v-3z"/>
                        <path d="M11.6 16.8a3 3 0 1 1-5.8-1.6"/>
                    </svg>
                </div>

                <a href="{{ $redirectUrl }}" 
                   class="p-1.5 rounded-lg transition-colors cursor-pointer
                          text-slate-400 hover:text-amber-600 hover:bg-amber-50 
                          dark:text-slate-600 dark:hover:text-amber-400 dark:hover:bg-slate-800">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14"/><path d="m12 5 7 7-7 7"/>
                    </svg>
                </a>

            </div>

        </div>
    </div>
</div>