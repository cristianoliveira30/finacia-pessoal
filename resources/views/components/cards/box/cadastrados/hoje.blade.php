@props([
    'config' => [],
    'cardId' => 'card-' . uniqid(),
])
@php
    // CONFIGURAÇÃO PARA DADOS DE ELEITORES
    // Padrão vazio para prefixo (não é dinheiro)
    $valuePrefix = data_get($config, 'prefix', '');
    $valueSuffix = data_get($config, 'suffix', '');
    $variationSuffix = data_get($config, 'variation_suffix', '%');
    
    // Labels adaptados para emissão de documentos/títulos
    $weekLabel = data_get($config, 'label', 'Títulos Emitidos');
    $weekValue = data_get($config, 'value', '342');
    $weekRanges = data_get($config, 'range_label', 'nesta semana');
    
    // Link
    $redirectUrl = data_get($config, 'link', '#');
@endphp

<div class="grid grid-cols-1 md:grid-cols-1 gap-2 w-full">
    {{-- 
        AJUSTES DE CONTRASTE (LIGHT MODE):
        - border-slate-300: Borda mais escura e visível (era 200).
        - shadow-sm: Sombra contida.
        - bg-white: Mantido, mas agora contido pela borda forte.
    --}}
    <div class="relative w-full min-w-[260px] overflow-hidden
                bg-gray-100/75 dark:bg-gradient-to-br dark:from-slate-800 dark:to-slate-900
                p-5 rounded-2xl
                border border-slate-300 dark:border-slate-700
                shadow-sm hover:shadow dark:shadow-xl
                transition-all duration-300 group">

        {{-- 
            Efeito de Fundo (Glow/Mancha):
            - Light Mode: Mudei de 'white/indigo' para 'slate-900/5'. 
              Isso cria uma mancha cinza muito sutil (não branca) para dar textura de papel.
        --}}
        <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 rounded-full blur-2xl transition-all pointer-events-none
                    bg-slate-900/5 dark:bg-indigo-500/20
                    group-hover:bg-slate-900/10 dark:group-hover:bg-indigo-500/30"></div>

        <div class="relative z-10 flex justify-between h-full">

            {{-- COLUNA ESQUERDA: Conteúdo --}}
            <div class="flex flex-col justify-between">
                {{-- Bloco Superior: Label e Valor --}}
                <div class="mb-4">
                    {{-- 
                       LABEL: text-slate-600 (Cinza Chumbo) e font-semibold.
                       Aumentei o peso da fonte e escureci para tirar o aspecto "lavado".
                    --}}
                    <p class="text-slate-600 dark:text-slate-400 text-sm font-semibold mb-1 capitalize">
                        {{ $weekLabel }}
                    </p>
                    {{-- 
                       VALOR: text-slate-950 (Quase preto). 
                       Contraste máximo no modo claro.
                    --}}
                    <h3 class="text-3xl font-bold text-slate-950 dark:text-white tracking-tight">
                        {{ $valuePrefix }}{{ $weekValue }}{{ $valueSuffix}}
                    </h3>
                </div>

                {{-- Bloco Inferior: Badge de Variação --}}
                <div class="flex items-center text-sm">
                    {{-- Badge Verde: Mantido, mas bordas levemente ajustadas --}}
                    <span class="font-bold flex items-center px-2 py-0.5 rounded border
                                 bg-emerald-50 text-emerald-800 border-emerald-200
                                 dark:bg-emerald-500/10 dark:text-emerald-400 dark:border-emerald-500/20">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="mr-1">
                            <path d="M7 7h10v10"/><path d="M7 17 17 7"/>
                        </svg>
                        <span>+5.4{{ $variationSuffix }}</span>
                    </span>
                    {{-- Texto de range: Slate-600 para leitura melhor --}}
                    <span class="text-slate-600 dark:text-slate-500 ml-3 font-semibold truncate">
                        {{ $weekRanges }}
                    </span>
                </div>
            </div>

            {{-- COLUNA DIREITA: Ícones --}}
            <div class="flex flex-col justify-between items-end pl-4">

                {{-- 
                    1. Ícone do Cartão (TOPO) - ESTILO OFFICE FORTE
                    - bg-slate-100: Fundo cinza sólido (não branco).
                    - border-slate-300: Borda definida.
                    - text-slate-700: Ícone escuro.
                --}}
                <div class="p-2.5 rounded-xl border shadow-sm transition-colors
                            bg-slate-100 border-slate-300 text-slate-700
                            dark:bg-slate-700/50 dark:border-slate-600 dark:text-indigo-400">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 10h2"/>
                        <path d="M16 14h2"/>
                        <path d="M6.17 15a3 3 0 0 1 5.66 0"/>
                        <circle cx="9" cy="11" r="2"/>
                        <rect x="2" y="5" width="20" height="14" rx="2"/>
                    </svg>
                </div>

                {{-- 
                    2. Ícone de Seta (FUNDO)
                    - text-slate-500: Cinza médio base.
                    - hover:text-slate-900: Preto no hover.
                --}}
                <a href="{{ $redirectUrl }}"
                   class="p-1.5 rounded-lg transition-colors cursor-pointer
                          text-slate-500 hover:text-slate-900 hover:bg-slate-200
                          dark:text-slate-600 dark:hover:text-indigo-400 dark:hover:bg-slate-800"
                   title="Ver detalhes de emissão">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14"/><path d="m12 5 7 7-7 7"/>
                    </svg>
                </a>

            </div>

        </div>
    </div>
</div>