@props([
    'id' => null,
])

@php
    $setores = [
        // --- FINANÇAS ---
        'fin_exec' => [
            'label'  => 'Despesas',
            'value'  => '14,2',
            'prefix' => 'R$ ',
            'suffix' => 'mi',
            'link'   => '/dashboard/financas', 
            'hint'   => 'Acima do teto (+2%)', // Dica visual do motivo
            'icon_name' => 'bi-currency-dollar',
            'color'  => 'text-red-600', // Ícone vermelho para combinar
            'status' => 'critical' // <--- SIMULAÇÃO: Valor ruim (Vermelho)
        ],
        'fin_arr' => [
            'label'  => 'Receita',
            'value'  => '22,8',
            'prefix' => 'R$ ',
            'suffix' => 'mi',
            'link'   => '/dashboard/financas/receita', 
            'hint'   => 'Meta batida',
            'icon_name' => 'bi-graph-up-arrow',
            'color'  => 'text-emerald-600',
            'status' => 'good' // <--- SIMULAÇÃO: Valor bom (Verde)
        ],

        // --- SAÚDE ---
        'saude_esp' => [
            'label'  => 'Saúde',
            'value'  => '42',
            'prefix' => '',
            'suffix' => 'min',
            'link'   => '/dashboard/saude', 
            'hint'   => 'Atenção média',
            'icon_name' => 'bi-heart-pulse',
            'color'  => 'text-amber-500', // Ícone amarelo
            'status' => 'warning' // <--- SIMULAÇÃO: Valor mediano (Amarelo)
        ],
        'saude_med' => [
            'label'  => 'Farmácia',
            'value'  => '8',
            'prefix' => '',
            'suffix' => '%',
            'link'   => '/dashboard/saude/farmacia', 
            'hint'   => 'Ruptura Estoque',
            'icon_name' => 'bi-capsule',
            'color'  => 'text-rose-600',
            'status' => 'neutral' // Padrão
        ],

        // --- EDUCAÇÃO ---
        'edu_freq' => [
            'label'  => 'Frequência',
            'value'  => '92',
            'prefix' => '',
            'suffix' => '%',
            'link'   => '/dashboard/educacao', 
            'hint'   => 'Rede Municipal',
            'icon_name' => 'bi-book',
            'color'  => 'text-blue-600',
            'status' => 'good'
        ],
        'edu_vagas' => [
            'label'  => 'Creche',
            'value'  => '340',
            'prefix' => '',
            'suffix' => '',
            'link'   => '/dashboard/educacao/vagas', 
            'hint'   => 'Fila de espera',
            'icon_name' => 'bi-backpack',
            'color'  => 'text-blue-600',
            'status' => 'neutral'
        ],
    ];

    $dados = $setores[$id] ?? null;

    // Lógica de Estilos Dinâmicos (Borda e Sombra Colorida)
    $status = $dados['status'] ?? 'neutral';

    $styles = [
        'good' => [
            'wrapper' => 'border-emerald-500 shadow-emerald-500/20 dark:border-emerald-500/50 dark:shadow-emerald-500/10',
            'blur'    => 'bg-emerald-500/10 group-hover:bg-emerald-500/20'
        ],
        'warning' => [
            'wrapper' => 'border-amber-400 shadow-amber-500/20 dark:border-amber-500/50 dark:shadow-amber-500/10',
            'blur'    => 'bg-amber-500/10 group-hover:bg-amber-500/20'
        ],
        'critical' => [
            'wrapper' => 'border-red-500 shadow-red-500/20 dark:border-red-500/50 dark:shadow-red-500/10',
            'blur'    => 'bg-red-500/10 group-hover:bg-red-500/20'
        ],
        'neutral' => [
            'wrapper' => 'border-slate-300 dark:border-slate-700 shadow-xl', // Sombra padrão
            'blur'    => 'bg-sky-500/5 dark:bg-sky-500/20 group-hover:bg-sky-500/10'
        ],
    ];

    $currentStyle = $styles[$status] ?? $styles['neutral'];
@endphp

@if($dados)
    {{-- WRAPPER EXTERNO --}}
    <div class="group relative w-full">
        
        {{-- Card Original com Classes Dinâmicas --}}
        <div class="relative w-full overflow-hidden h-full
                    bg-white dark:bg-gradient-to-br dark:from-slate-800 dark:to-slate-900
                    p-4 rounded-2xl
                    border shadow-lg transition-all duration-300 hover:-translate-y-1
                    {{ $currentStyle['wrapper'] }}"> {{-- <<< AQUI APLICAMOS A BORDA E SOMBRA --}}

            {{-- Decoração de Fundo (Blur) Dinâmica --}}
            <div class="absolute top-0 right-0 -mt-4 -mr-4 w-16 h-16 rounded-full blur-xl transition-all pointer-events-none
                        {{ $currentStyle['blur'] }}"></div>

            <div class="relative z-10 flex justify-between h-full items-start">

                {{-- COLUNA ESQUERDA --}}
                <div class="flex flex-col justify-between h-full space-y-2">
                    
                    {{-- Label --}}
                    <p class="text-slate-600 dark:text-slate-400 text-xs font-bold uppercase tracking-wider">
                        {{ $dados['label'] ?? $id }}
                    </p>

                    {{-- Valor Principal --}}
                    <div>
                        <h3 class="text-2xl font-bold text-slate-800 dark:text-white tracking-tight leading-none whitespace-nowrap">
                            @if(!empty($dados['prefix']))
                                <span class="text-sm text-slate-500 font-medium mr-0.5 align-middle">
                                    {{ $dados['prefix'] }}
                                </span>
                            @endif

                            {{ $dados['value'] ?? $dados['score'] ?? '0' }}

                            @if(!empty($dados['suffix']))
                                <span class="text-sm text-slate-500 font-medium ml-0.5 align-baseline">
                                    {{ $dados['suffix'] }}
                                </span>
                            @endif
                        </h3>
                    </div>

                    {{-- Hint --}}
                    <div class="flex items-center pt-1">
                        <span class="text-xs text-slate-600 dark:text-slate-500 font-semibold truncate">
                            {{ $dados['hint'] }}
                        </span>
                    </div>
                </div>

                {{-- COLUNA DIREITA --}}
                <div class="flex flex-col justify-between items-end h-full pl-2 space-y-3">

                    {{-- 1. Ícone Personalizado --}}
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
                       class="group/link relative p-1 rounded-lg transition-colors cursor-pointer block
                              text-slate-400 hover:text-sky-600 hover:bg-slate-100
                              dark:text-slate-600 dark:hover:text-sky-400 dark:hover:bg-slate-800">
                        
                        <x-bi-arrow-right-short class="w-5 h-5" />

                        {{-- TOOLTIP DA SETA --}}
                        <div class="absolute right-full top-1/2 -translate-y-1/2 mr-2 w-max px-2 py-1
                                    bg-slate-700 text-white text-[10px] font-bold rounded shadow-sm
                                    opacity-0 invisible group-hover/link:opacity-100 group-hover/link:visible
                                    transition-all duration-200 translate-x-2 group-hover/link:translate-x-0
                                    pointer-events-none z-20">
                            ir para relatorios
                            <div class="absolute top-1/2 right-0 -mr-1 -mt-1 w-2 h-2 bg-slate-700 rotate-45"></div>
                        </div>

                    </a>
                </div>
            </div>
        </div>

        {{-- TOOLTIP GERAL --}}
        <div class="absolute top-full left-1/2 -translate-x-1/2 mt-3 w-max px-3 py-1.5
                    bg-slate-800 text-white text-xs font-medium rounded-lg shadow-xl
                    opacity-0 invisible group-hover:opacity-100 group-hover:visible 
                    transition-all duration-300 transform -translate-y-2 group-hover:translate-y-0
                    z-[99] pointer-events-none">
            <div class="absolute bottom-full left-1/2 -translate-x-1/2 border-4 border-transparent border-b-slate-800"></div>
            Visualizar detalhes de {{ $dados['label'] ?? $id }}
        </div>

    </div>
@else
    <div class="text-red-600 text-xs font-bold p-4 border border-red-300 bg-red-50 rounded shadow-md">
        "{{ $id }}" n/a
    </div>
@endif