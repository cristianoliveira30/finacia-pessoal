@props([
    'config' => [],
    'cardId' => 'card-eleitores-' . uniqid(),
])
@php
    $valuePrefix = data_get($config, 'value_prefix', '');
    $valueSuffix = data_get($config, 'value_suffix', '');
    $variationSuffix = data_get($config, 'variation_suffix', '%');
    
    // PADRÕES POLÍTICOS
    $label = data_get($config, 'label', 'Novos Eleitores'); // Ex: Cadastros Hoje
    $value = data_get($config, 'value', '124');
    $rangeLabel = data_get($config, 'range_label', 'hoje');
    $redirectUrl = data_get($config, 'redirect_url', '#'); 
@endphp

<div class="grid grid-cols-1 md:grid-cols-1 gap-2 w-full">
    {{-- LIGHT: Borda Slate-300 para contraste --}}
    <div class="relative w-full min-w-[260px] overflow-hidden
                bg-white dark:bg-gradient-to-br dark:from-slate-800 dark:to-slate-900
                p-5 rounded-2xl
                border border-slate-300 dark:border-slate-700
                shadow-sm hover:shadow dark:shadow-xl
                transition-all duration-300 group">
        
        {{-- Glow Effect: Light = Sombra cinza sutil / Dark = Azul original --}}
        <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 rounded-full blur-2xl transition-all pointer-events-none
                    bg-slate-900/5 dark:bg-blue-500/20
                    group-hover:bg-slate-900/10 dark:group-hover:bg-blue-500/30"></div>
        
        <div class="relative z-10 flex justify-between h-full">
            
            {{-- COLUNA ESQUERDA --}}
            <div class="flex flex-col justify-between">
                <div class="mb-4">
                    {{-- Label: Slate-600 Semibold --}}
                    <p class="text-slate-600 dark:text-slate-400 text-sm font-semibold mb-1 capitalize">
                        {{ $label }}
                    </p>
                    {{-- Value: Slate-950 (Preto profundo) --}}
                    <h3 class="text-3xl font-bold text-slate-950 dark:text-white tracking-tight">
                        {{ $valuePrefix }}{{ $value }}{{ $valueSuffix}}
                    </h3>
                </div>

                <div class="flex items-center text-sm">
                    {{-- Badge de Variação --}}
                    <span class="font-bold flex items-center px-2 py-0.5 rounded border
                                 bg-emerald-50 text-emerald-800 border-emerald-200
                                 dark:bg-emerald-500/10 dark:text-emerald-400 dark:border-emerald-500/20">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="mr-1">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="8.5" cy="7" r="4"></circle>
                            <line x1="20" y1="8" x2="20" y2="14"></line>
                            <line x1="23" y1="11" x2="17" y2="11"></line>
                        </svg>
                        <span>+15{{ $variationSuffix }}</span>
                    </span>
                    <span class="text-slate-600 dark:text-slate-500 ml-3 font-semibold truncate">
                        {{ $rangeLabel }}
                    </span>
                </div>
            </div>

            {{-- COLUNA DIREITA: Ícones --}}
            <div class="flex flex-col justify-between items-end pl-4">
                
                {{-- 1. Ícone Político --}}
                {{-- LIGHT: Cinza Sólido (Slate-100/700) --}}
                <div class="p-2.5 rounded-xl border shadow-sm transition-colors
                            bg-slate-100 border-slate-300 text-slate-700
                            dark:bg-slate-700/50 dark:border-slate-600 dark:text-blue-400">
                    {{-- Ícone: Users Group --}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                </div>

                {{-- 2. Link --}}  
                {{-- LIGHT: Hover Preto/Cinza --}}
                <a href="{{ $redirectUrl }}" 
                   class="p-1.5 rounded-lg transition-colors cursor-pointer
                          text-slate-500 hover:text-slate-900 hover:bg-slate-200 
                          dark:text-slate-600 dark:hover:text-blue-400 dark:hover:bg-slate-800">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14"/><path d="m12 5 7 7-7 7"/>
                    </svg>
                </a>

            </div>

        </div>
    </div>
</div>