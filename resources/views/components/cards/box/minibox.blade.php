@props([
    'id' => null,
])

@php
    $setores = [
        // --- FINANÇAS ---
        'fin_exec' => [
            'label'  => 'Despesas Empenhadas',
            'value'  => '14,2',
            'prefix' => 'R$ ',
            'suffix' => 'mi',
            'link'   => route('financeiro.despesas.empenhos'),
            'hint'   => 'Monitoramento LRF',
            'icon_name' => 'bi-currency-dollar',
            'color'  => 'text-red-600',
            'status' => 'critical',
            'tooltip_html' => 'Valor empenhado acumulado no exercício.'
        ],
        'fin_arr' => [
            'label'  => 'Receita Arrecadada',
            'value'  => '22,8',
            'prefix' => 'R$ ',
            'suffix' => 'mi',
            'link'   => route('financeiro.receitas.arrecadacao'),
            'hint'   => 'Superávit projetado',
            'icon_name' => 'bi-graph-up-arrow',
            'color'  => 'text-emerald-600',
            'status' => 'good',
            'tooltip_html' => 'Receita total arrecadada até o momento.'
        ],

        // --- SAÚDE ---
        'saude_esp' => [
            'label'  => 'Fila Especialista',
            'value'  => '45', 
            'prefix' => '',
            'suffix' => 'dias',
            'link'   => route('saude.regulacao.fila-consultas'),
            'hint'   => 'Média espera',
            'icon_name' => 'bi-hourglass-split',
            'color'  => 'text-orange-600',
            'status' => 'critical',
            'tooltip_html' => 'Tempo médio de espera para consultas especializadas.'
        ],
        'saude_med' => [
            'label'  => 'Farmácia',
            'value'  => '8',
            'prefix' => '',
            'suffix' => '%',
            'link'   => route('saude.farmacia.rupturas'),
            'hint'   => 'Ruptura Estoque',
            'icon_name' => 'bi-capsule',
            'color'  => 'text-rose-600',
            'status' => 'neutral',
            'tooltip_html' => 'Índice de falta de medicamentos na rede.'
        ],

        // --- EDUCAÇÃO ---
        'edu_freq' => [
            'label'  => 'Frequência',
            'value'  => '92',
            'prefix' => '',
            'suffix' => '%',
            'link'   => route('educacao.relatorios.frequencia'),
            'hint'   => 'Rede Municipal',
            'icon_name' => 'bi-book',
            'color'  => 'text-blue-600',
            'status' => 'good',
            'tooltip_html' => 'Frequência escolar média da rede.'
        ],
        'edu_vagas' => [
            'label'  => 'Fila Creche',
            'value'  => '340',
            'prefix' => '',
            'suffix' => '',
            'link'   => route('educacao.matriculas.fila-creche'),
            'hint'   => 'Crianças aguardando',
            'icon_name' => 'bi-backpack',
            'color'  => 'text-indigo-600',
            'status' => 'warning',
            'tooltip_html' => 'Solicitações de vagas em creches não atendidas.'
        ],
    ];

    $dados = $setores[$id] ?? null;
    $status = $dados['status'] ?? 'neutral';

    $styles = [
        'good' => ['wrapper' => 'border-emerald-500 shadow-lg shadow-emerald-500/30 dark:border-emerald-500/50', 'blur' => 'bg-emerald-500/10'],
        'warning' => ['wrapper' => 'border-amber-400 shadow-lg shadow-amber-500/30 dark:border-amber-500/50', 'blur' => 'bg-amber-500/10'],
        'critical' => ['wrapper' => 'border-red-500 shadow-lg shadow-red-500/30 dark:border-red-500/50', 'blur' => 'bg-red-500/10'],
        'neutral' => ['wrapper' => 'border-slate-200 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none', 'blur' => 'bg-slate-500/5 dark:bg-slate-500/10'],
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
                    
                    {{-- Tooltip no Link Adicionado Aqui --}}
                    <a href="{{ $dados['link'] }}" class="group/link relative text-slate-300 hover:text-sky-500 transition-colors">
                        <x-bi-arrow-right-short class="w-5 h-5" />
                        <span class="absolute bottom-full right-0 mb-1 px-1.5 py-0.5 bg-slate-700 text-white text-[10px] font-medium rounded shadow-sm opacity-0 invisible group-hover/link:opacity-100 group-hover/link:visible transition-all duration-200 whitespace-nowrap z-20 pointer-events-none">
                            Abrir relatório
                        </span>
                    </a>
                </div>
            </div>
        </div>
        
        {{-- Tooltip Principal (Card) --}}
        <div class="absolute top-full left-1/2 -translate-x-1/2 mt-3 w-64 px-4 py-3 bg-slate-800 text-white text-xs font-medium rounded-xl shadow-2xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-[99] pointer-events-none whitespace-normal text-left border border-slate-700">
             <div class="absolute bottom-full left-1/2 -translate-x-1/2 border-8 border-transparent border-b-slate-800"></div>
            {!! $dados['tooltip_html'] ?? '' !!}
        </div>
    </div>
@else
    <div class="p-4 border border-dashed border-slate-300 rounded-xl flex items-center justify-center text-xs text-slate-400">
        Box "{{ $id }}" não definido
    </div>
@endif