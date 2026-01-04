{{-- resources/views/components/cards/box/diretorias.blade.php --}}
@props([
    'id' => 'financeiro', // 'financeiro', 'saude' ou 'educacao'
])

@php
    // Helper de formatação
    $fmt = fn($v, $d = 1) => number_format($v, $d, ',', '.');

    // -------------------------------------------------------------------------
    // DADOS: FINANCEIRO
    // -------------------------------------------------------------------------
    $financeiro = [
        'kpis' => [
            ['label' => 'Execução', 'value' => $fmt(76.4), 'suffix' => '%', 'hint' => 'realizado/previsto', 'link' => route('financeiro.orcamento.loa'), 'icon' => 'activity', 'color' => 'text-blue-500'],
            ['label' => 'Caixa', 'value' => $fmt(128.6), 'prefix' => 'R$ ', 'suffix' => ' mi', 'hint' => 'consolidado', 'link' => route('financeiro.tesouraria.saldos'), 'icon' => 'wallet2', 'color' => 'text-emerald-500'],
            ['label' => 'Resultado', 'value' => $fmt(24.9), 'prefix' => 'R$ ', 'suffix' => ' mi', 'hint' => 'superávit', 'link' => route('financeiro.relatorios.rx_d'), 'icon' => 'graph-up-arrow', 'color' => 'text-indigo-500'],
            ['label' => 'Pessoal/RCL', 'value' => $fmt(49.2), 'suffix' => '%', 'hint' => 'limite 54%', 'link' => route('financeiro.lrf.pessoal'), 'icon' => 'people', 'color' => 'text-amber-500'],
        ],
        'modulos' => [
            'Receitas' => ['score' => 81, 'link' => route('financeiro.receitas.arrecadacao'), 'hint' => 'Própria 32%', 'icon' => 'arrow-up-circle', 'color' => 'text-emerald-500'],
            'Despesas' => ['score' => 73, 'link' => route('financeiro.despesas.empenhos'), 'hint' => 'Empen. 68%', 'icon' => 'arrow-down-circle', 'color' => 'text-rose-500'],
            'Tesouraria' => ['score' => 77, 'link' => route('financeiro.tesouraria.saldos'), 'hint' => 'Caixa D+90', 'icon' => 'bank', 'color' => 'text-cyan-600'],
            'Orçamento' => ['score' => 79, 'link' => route('financeiro.orcamento.loa'), 'hint' => 'Créd. adic. 6%', 'icon' => 'file-earmark-spreadsheet', 'color' => 'text-blue-600'],
            'Investimentos' => ['score' => 69, 'link' => route('financeiro.investimentos.capex'), 'hint' => 'CAPEX 41%', 'icon' => 'bricks', 'color' => 'text-orange-500'],
            'Compliance' => ['score' => 80, 'link' => route('financeiro.lrf.pessoal'), 'hint' => 'Sem alertas', 'icon' => 'shield-check', 'color' => 'text-purple-500'],
        ],
    ];

    // -------------------------------------------------------------------------
    // DADOS: SAÚDE (CORRIGIDO)
    // -------------------------------------------------------------------------
    $saude = [
        'kpis' => [
            ['label' => 'Atendimentos', 'value' => $fmt(128450, 0), 'suffix' => '', 'hint' => 'APS + Urgência', 'link' => route('saude.relatorios.atendimentos'), 'icon' => 'heart-pulse', 'color' => 'text-rose-500'],
            ['label' => 'Espera', 'value' => $fmt(42, 0), 'suffix' => ' min', 'hint' => 'média porta', 'link' => route('saude.relatorios.espera'), 'icon' => 'hourglass-split', 'color' => 'text-orange-500'],
            ['label' => 'Vacinal', 'value' => $fmt(87.3), 'suffix' => '%', 'hint' => 'cobertura', 'link' => route('saude.imunizacao.cobertura'), 'icon' => 'shield-plus', 'color' => 'text-green-500'],
            ['label' => 'Medicamentos', 'value' => $fmt(92.1), 'suffix' => '%', 'hint' => 'disponibilidade', 'link' => route('saude.farmacia.disponibilidade'), 'icon' => 'capsule', 'color' => 'text-teal-500'],
            
            // CORREÇÃO DO ERRO: fila_consultas -> fila-consultas
            ['label' => 'Fila Reg.', 'value' => $fmt(3840, 0), 'suffix' => '', 'hint' => 'cons+exames', 'link' => route('saude.regulacao.fila-consultas'), 'icon' => 'list-task', 'color' => 'text-purple-500'],
        ],
        'modulos' => [
            // CORREÇÃO: saude.aps.unidades -> saude.atencao.ubs-unidades (para bater com web.php)
            'Atenção Básica' => ['score' => 78, 'link' => route('saude.atencao.ubs-unidades'), 'hint' => 'ESF: 62%', 'icon' => 'hospital', 'color' => 'text-blue-500'],
            
            // CORREÇÃO: saude.urgencia.unidades -> saude.urgencia.unidades-upa (para bater com web.php)
            'Urgência' => ['score' => 71, 'link' => route('saude.urgencia.unidades-upa'), 'hint' => 'Porta 28min', 'icon' => 'truck-front', 'color' => 'text-red-500'],
            
            // CORREÇÃO DO ERRO: fila_consultas -> fila-consultas
            'Regulação' => ['score' => 66, 'link' => route('saude.regulacao.fila-consultas'), 'hint' => 'SLA 19 dias', 'icon' => 'signpost-split', 'color' => 'text-orange-500'],
            
            'Imunização' => ['score' => 84, 'link' => route('saude.imunizacao.cobertura'), 'hint' => 'Cob. 87%', 'icon' => 'virus', 'color' => 'text-green-500'],
            'Farmácia' => ['score' => 73, 'link' => route('saude.farmacia.disponibilidade'), 'hint' => 'Rupturas: 4', 'icon' => 'box2-heart', 'color' => 'text-teal-600'],
            
            // CORREÇÃO: saude.vigilancia.indicadores -> saude.vigilancia.indicadores-epidermico (para bater com web.php)
            'Vigilância' => ['score' => 76, 'link' => route('saude.vigilancia.indicadores-epidermico'), 'hint' => 'Notif: 312', 'icon' => 'eye', 'color' => 'text-indigo-500'],
        ],
    ];

    // -------------------------------------------------------------------------
    // DADOS: EDUCAÇÃO
    // -------------------------------------------------------------------------
    $educacao = [
        'kpis' => [
            ['label' => 'Matrículas', 'value' => $fmt(58420, 0), 'suffix' => '', 'hint' => 'ativas rede', 'link' => route('educacao.relatorios.matriculas'), 'icon' => 'backpack', 'color' => 'text-blue-500'],
            ['label' => 'Frequência', 'value' => $fmt(92.6), 'suffix' => '%', 'hint' => 'média geral', 'link' => route('educacao.relatorios.frequencia'), 'icon' => 'calendar-check', 'color' => 'text-emerald-500'],
            ['label' => 'Evasão', 'value' => $fmt(2.4), 'suffix' => '%', 'hint' => 'anual est.', 'link' => route('educacao.relatorios.evasao'), 'icon' => 'box-arrow-right', 'color' => 'text-red-500'],
            ['label' => 'Fila Creche', 'value' => $fmt(1260, 0), 'suffix' => '', 'hint' => 'demanda', 'link' => route('educacao.matriculas.fila_creche'), 'icon' => 'person-plus', 'color' => 'text-orange-500'],
            ['label' => 'Aprovação', 'value' => $fmt(89.1), 'suffix' => '%', 'hint' => 'média rede', 'link' => route('educacao.relatorios.aprendizagem'), 'icon' => 'award', 'color' => 'text-indigo-500'],
            ['label' => 'Aprendiz.', 'value' => $fmt(6.4), 'suffix' => '/10', 'hint' => 'índice sim.', 'link' => route('educacao.relatorios.aprendizagem'), 'icon' => '123', 'color' => 'text-purple-500'],
        ],
        'modulos' => [
            'Rede Escolar' => ['score' => 80, 'link' => route('educacao.rede.escolas'), 'hint' => '118 escolas', 'icon' => 'building', 'color' => 'text-blue-500'],
            'Matrículas' => ['score' => 77, 'link' => route('educacao.matriculas.gestao'), 'hint' => 'Transf 312', 'icon' => 'person-badge', 'color' => 'text-cyan-600'],
            'Frequência' => ['score' => 83, 'link' => route('educacao.relatorios.frequencia'), 'hint' => '92,6% média', 'icon' => 'clock-history', 'color' => 'text-green-500'],
            'Merenda' => ['score' => 74, 'link' => route('educacao.merenda.estoque'), 'hint' => 'Rupturas: 3', 'icon' => 'basket', 'color' => 'text-orange-500'],
            'Transporte' => ['score' => 69, 'link' => route('educacao.transporte.rotas'), 'hint' => 'Atrasos 8%', 'icon' => 'bus-front', 'color' => 'text-yellow-600'],
            'FUNDEB' => ['score' => 78, 'link' => route('educacao.fundeb.indicadores'), 'hint' => 'Aplic. 84%', 'icon' => 'cash-coin', 'color' => 'text-emerald-600'],
        ],
    ];

    // SELEÇÃO DE DADOS
    $dados = match($id) {
        'saude' => $saude,
        'educacao' => $educacao,
        'financeiro' => $financeiro, // caso precise explicitar o default
        default => $financeiro,
    };
@endphp

<div class="space-y-6 w-full">

    {{-- SEÇÃO 1: VISÃO GERAL (KPIs) --}}
    <div>
        <h2 class="text-lg font-bold text-gray-700 dark:text-gray-300 mb-3 px-1 flex items-center gap-2 capitalize">
            <x-bi-speedometer2 class="w-5 h-5"/> Visão Geral: {{ $id }}
        </h2>
        
        {{-- GRID UNIFICADO: 6 colunas no desktop (lg) --}}
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-6 gap-3">
            @foreach ($dados['kpis'] as $kpi)
                {{-- CARD ESTILO MINIBOX (Compacto para caber 6 na linha) --}}
                <div class="relative w-full overflow-hidden
                            bg-white dark:bg-gray-800
                            p-5 rounded-xl
                            border border-gray-200 dark:border-gray-700
                            shadow-sm hover:shadow-md transition-all duration-300 group">
                    
                    {{-- Decoração Blur --}}
                    <div class="absolute top-0 right-0 -mt-3 -mr-3 w-12 h-12 rounded-full blur-xl transition-all pointer-events-none opacity-40 bg-gray-200 dark:bg-gray-600 group-hover:opacity-70"></div>

                    <div class="relative z-10 flex justify-between items-start h-full gap-2">
                        {{-- Esquerda --}}
                        <div class="flex flex-col justify-between h-full">
                            <p class="text-gray-500 dark:text-gray-400 text-xs font-bold uppercase tracking-wider truncate">
                                {{ $kpi['label'] }}
                            </p>
                            <div class="mt-1">
                                <h3 class="text-3xl font-bold text-gray-800 dark:text-white tracking-tight leading-none whitespace-nowrap">
                                    <span class="text-xs text-gray-400 font-normal mr-px align-middle">{{ $kpi['prefix'] ?? '' }}</span>{{ $kpi['value'] }}<span class="text-xs text-gray-400 font-normal ml-px align-baseline">{{ $kpi['suffix'] ?? '' }}</span>
                                </h3>
                            </div>
                            <div class="mt-1">
                                <span class="text-xs text-gray-400 dark:text-gray-500 truncate block">
                                    {{ $kpi['hint'] }}
                                </span>
                            </div>
                        </div>

                        {{-- Direita --}}
                        <div class="flex flex-col justify-between items-end h-full space-y-2">
                            <div class="p-2 rounded-lg border shadow-sm transition-colors bg-gray-50 border-gray-100 {{ $kpi['color'] }} dark:bg-gray-700/50 dark:border-gray-600">
                                <x-dynamic-component :component="'bi-' . $kpi['icon']" class="w-6 h-6" />
                            </div>
                            
                            <a href="{{ $kpi['link'] }}" class="text-gray-300 hover:text-sky-500 transition-colors">
                                <x-bi-arrow-right-short class="w-6 h-6" />
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- SEÇÃO 2: ÁREAS DE GESTÃO (Módulos) --}}
    <div>
        <h2 class="text-lg font-bold text-gray-700 dark:text-gray-300 mb-3 px-1 flex items-center gap-2">
            <x-bi-grid-fill class="w-5 h-5"/> Áreas de Gestão
        </h2>

        {{-- GRID UNIFICADO: 6 colunas no desktop (lg) --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            @foreach ($dados['modulos'] as $nome => $modulo)
                <div class="relative w-full overflow-hidden
                            bg-white dark:bg-gray-800
                            p-5 rounded-xl
                            border border-gray-200 dark:border-gray-700
                            shadow-sm hover:shadow-md transition-all duration-300 group">

                    <div class="absolute top-0 right-0 -mt-3 -mr-3 w-12 h-12 rounded-full blur-xl transition-all pointer-events-none bg-gray-500/10 dark:bg-gray-500/20 group-hover:bg-sky-500/10"></div>

                    <div class="relative z-10 flex justify-between items-start h-full gap-2">
                        <div class="flex flex-col justify-between h-full">
                            <p class="text-gray-500 dark:text-gray-400 text-xs font-bold uppercase tracking-wider truncate" title="{{ $nome }}">
                                {{ Str::limit($nome, 13) }}
                            </p>
                            <div class="mt-1">
                                <h3 class="text-3xl font-bold text-gray-800 dark:text-white tracking-tight leading-none">
                                    {{ $modulo['score'] }}<span class="text-xs text-gray-400 font-normal ml-0.5">/100</span>
                                </h3>
                            </div>
                            <div class="mt-1">
                                <span class="text-xs text-gray-400 dark:text-gray-500 truncate block">
                                    {{ $modulo['hint'] }}
                                </span>
                            </div>
                        </div>

                        <div class="flex flex-col justify-between items-end h-full space-y-2">
                            <div class="p-2 rounded-lg border shadow-sm transition-colors bg-gray-50 border-gray-100 {{ $modulo['color'] }} dark:bg-gray-700/50 dark:border-gray-600">
                                <x-dynamic-component :component="'bi-' . $modulo['icon']" class="w-6 h-6" />
                            </div>

                            <a href="{{ $modulo['link'] }}" class="text-gray-300 hover:text-sky-500 transition-colors">
                                <x-bi-arrow-right-short class="w-6 h-6" />
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>