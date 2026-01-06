@props([
    'id' => null,
])

@php
    $setores = [
        // --- FINANÇAS: DESPESAS ---
        'fin_exec' => [
            'label'  => 'Despesas Empenhadas',
            'value'  => '14,2',
            'prefix' => 'R$ ',
            'suffix' => 'mi',
            'link'   => '/dashboard/financas', 
            'hint'   => 'Monitoramento LRF',
            'icon_name' => 'bi-currency-dollar',
            'color'  => 'text-red-600',
            'status' => 'critical',
            // Texto Rico Restaurado
            'tooltip_html' => '
                <div class="space-y-2 text-xs">
                    <p><strong>Definição:</strong> Valor comprometido do orçamento para pagamento futuro.</p>
                    <p class="text-red-200"><strong>Alerta:</strong> Despesa Total superior à Receita Total gera déficit e violação da LRF.</p>
                </div>
            '
        ],
        // --- FINANÇAS: RECEITAS ---
        'fin_arr' => [
            'label'  => 'Receita Arrecadada',
            'value'  => '22,8',
            'prefix' => 'R$ ',
            'suffix' => 'mi',
            'link'   => '/dashboard/financas/receita', 
            'hint'   => 'Superávit projetado',
            'icon_name' => 'bi-graph-up-arrow',
            'color'  => 'text-emerald-600',
            'status' => 'good',
            // Texto Rico Restaurado
            'tooltip_html' => '
                <div class="space-y-2 text-xs">
                    <p><strong>Definição:</strong> Recursos efetivamente entrados nos cofres públicos.</p>
                    <p class="text-emerald-300"><strong>Objetivo:</strong> Manter arrecadação superior às despesas para garantir equilíbrio fiscal (Art. 1º LRF).</p>
                </div>
            '
        ],

        // --- SAÚDE ---
        'saude_esp' => [
            'label'  => 'Tempo Espera',
            'value'  => '42',
            'prefix' => '',
            'suffix' => 'min',
            'link'   => '/dashboard/saude', 
            'hint'   => 'Média atend. porta',
            'icon_name' => 'bi-hourglass-split',
            'color'  => 'text-amber-500',
            'status' => 'warning',
            'tooltip_html' => 'Tempo médio de espera na fila de triagem da urgência e emergência.'
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
            'status' => 'neutral',
            'tooltip_html' => 'Percentual de medicamentos da lista padronizada indisponíveis no estoque.'
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
            'status' => 'good',
            'tooltip_html' => 'Média de presença dos alunos na rede municipal de ensino.'
        ],
        'edu_vagas' => [
            'label'  => 'Fila Creche',
            'value'  => '340',
            'prefix' => '',
            'suffix' => '',
            'link'   => '/dashboard/educacao/vagas', 
            'hint'   => 'Crianças aguardando',
            'icon_name' => 'bi-backpack',
            'color'  => 'text-blue-600',
            'status' => 'neutral',
            'tooltip_html' => 'Número absoluto de solicitações de vagas em creches ainda não atendidas.'
        ],
    ];

    $dados = $setores[$id] ?? null;

    $status = $dados['status'] ?? 'neutral';

    $styles = [
        'good' => ['wrapper' => 'border-emerald-500 shadow-emerald-500/20 dark:border-emerald-500/50', 'blur' => 'bg-emerald-500/10'],
        'warning' => ['wrapper' => 'border-amber-400 shadow-amber-500/20 dark:border-amber-500/50', 'blur' => 'bg-amber-500/10'],
        'critical' => ['wrapper' => 'border-red-500 shadow-red-500/20 dark:border-red-500/50', 'blur' => 'bg-red-500/10'],
        'neutral' => ['wrapper' => 'border-slate-200 dark:border-slate-700 shadow-sm', 'blur' => 'bg-slate-500/5 dark:bg-slate-500/10'],
    ];

    $currentStyle = $styles[$status] ?? $styles['neutral'];
@endphp

@if($dados)
    <div class="group relative w-full h-full">
        <div class="relative w-full overflow-hidden h-full
                    bg-white dark:bg-slate-800
                    p-4 rounded-xl
                    border transition-all duration-300 hover:-translate-y-1
                    {{ $currentStyle['wrapper'] }}">

            <div class="absolute top-0 right-0 -mt-4 -mr-4 w-16 h-16 rounded-full blur-xl transition-all pointer-events-none {{ $currentStyle['blur'] }}"></div>

            <div class="relative z-10 flex justify-between h-full items-start">
                <div class="flex flex-col justify-between h-full space-y-1">
                    <p class="text-slate-500 dark:text-slate-400 text-xs font-bold uppercase tracking-wider">
                        {{ $dados['label'] }}
                    </p>
                    <h3 class="text-2xl font-bold text-slate-800 dark:text-white tracking-tight whitespace-nowrap">
                        <span class="text-xs text-slate-400 mr-px font-normal align-middle">{{ $dados['prefix'] }}</span>{{ $dados['value'] }}<span class="text-xs text-slate-400 ml-px font-normal align-baseline">{{ $dados['suffix'] }}</span>
                    </h3>
                    <span class="text-xs text-slate-500 font-medium truncate">
                        {{ $dados['hint'] }}
                    </span>
                </div>

                <div class="flex flex-col justify-between items-end h-full pl-2 space-y-2">
                    <div class="p-1.5 rounded-lg border shadow-sm bg-slate-50 border-slate-100 dark:bg-slate-700/50 dark:border-slate-600 {{ $dados['color'] }}">
                        <x-dynamic-component :component="$dados['icon_name']" class="w-4 h-4" />
                    </div>
                    
                    {{-- Link com Tooltip Específico ("ir para relatorios") --}}
                    <a href="{{ $dados['link'] }}" 
                       class="group/link relative text-slate-300 hover:text-sky-500 transition-colors">
                        
                        <x-bi-arrow-right-short class="w-5 h-5" />

                        {{-- Tooltip do Link --}}
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

        {{-- TOOLTIP GRANDE (EXPLICAÇÃO) --}}
        <div class="absolute top-full left-1/2 -translate-x-1/2 mt-3 w-64 px-4 py-3
                    bg-slate-800 text-white text-xs font-medium rounded-xl shadow-2xl
                    opacity-0 invisible group-hover:opacity-100 group-hover:visible 
                    transition-all duration-300 transform -translate-y-2 group-hover:translate-y-0
                    z-[99] pointer-events-none whitespace-normal text-left border border-slate-700">
            <div class="absolute bottom-full left-1/2 -translate-x-1/2 border-8 border-transparent border-b-slate-800"></div>
            {!! $dados['tooltip_html'] ?? ('Detalhes de ' . $dados['label']) !!}
        </div>

    </div>
@else
    <div class="hidden"></div>
@endif