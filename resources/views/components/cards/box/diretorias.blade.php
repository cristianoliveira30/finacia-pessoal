{{-- resources/views/components/cards/box/diretorias.blade.php --}}
@props([
    'id' => 'financeiro', // 'financeiro', 'saude' ou 'educacao'
])

@php
    // Helper de formatação
    $fmt = fn($v, $d = 1) => number_format($v, $d, ',', '.');

    // -------------------------------------------------------------------------
    // 1. CONFIGURAÇÃO DE ESTILOS POR STATUS
    // -------------------------------------------------------------------------
    $statusStyles = [
        'estavel' => [
            'wrapper' => 'border-emerald-500 shadow-emerald-500/20 dark:border-emerald-500/50 dark:shadow-emerald-500/10',
            'blur'    => 'bg-emerald-500/10 group-hover:bg-emerald-500/20',
            'icon'    => 'text-emerald-500' 
        ],
        'instavel' => [
            'wrapper' => 'border-amber-400 shadow-amber-500/20 dark:border-amber-500/50 dark:shadow-amber-500/10',
            'blur'    => 'bg-amber-500/10 group-hover:bg-amber-500/20',
            'icon'    => 'text-amber-500'
        ],
        'critico' => [
            'wrapper' => 'border-red-500 shadow-red-500/20 dark:border-red-500/50 dark:shadow-red-500/10',
            'blur'    => 'bg-red-500/10 group-hover:bg-red-500/20',
            'icon'    => 'text-red-500'
        ],
        'neutro' => [
            'wrapper' => 'border-gray-200 dark:border-gray-700 shadow-sm',
            'blur'    => 'bg-gray-200 dark:bg-gray-600 opacity-40 group-hover:opacity-70',
            'icon'    => 'text-gray-500'
        ],
    ];

    // Helper para pegar o estilo
    $getStyle = fn($status) => $statusStyles[$status] ?? $statusStyles['neutro'];

    // -------------------------------------------------------------------------
    // DADOS: FINANCEIRO (Rotas Originais Restauradas)
    // -------------------------------------------------------------------------
    $financeiro = [
        'kpis' => [
            ['label' => 'Execução', 'value' => $fmt(76.4), 'suffix' => '%', 'hint' => 'realizado/previsto', 'link' => route('financeiro.orcamento.loa'), 'icon' => 'activity', 'color' => 'text-blue-500', 'status' => 'estavel'],
            // Restaurado "Caixa" no lugar de "Mín. Saúde/SIOPE"
            ['label' => 'Caixa', 'value' => $fmt(128.6), 'prefix' => 'R$ ', 'suffix' => ' mi', 'hint' => 'consolidado', 'link' => route('financeiro.tesouraria.saldos'), 'icon' => 'wallet2', 'color' => 'text-emerald-500', 'status' => 'estavel'],
            ['label' => 'Resultado', 'value' => $fmt(24.9), 'prefix' => 'R$ ', 'suffix' => ' mi', 'hint' => 'superávit', 'link' => route('financeiro.relatorios.rx_d'), 'icon' => 'graph-up-arrow', 'color' => 'text-indigo-500', 'status' => 'estavel'],
            ['label' => 'Pessoal/RCL', 'value' => $fmt(52.2), 'suffix' => '%', 'hint' => 'limite 54%', 'link' => route('financeiro.compliance.pessoal'), 'icon' => 'people', 'color' => 'text-amber-500', 'status' => 'instavel'],
        ],
        'modulos' => [
            'Receitas' => ['score' => 81, 'link' => route('financeiro.receitas.arrecadacao'), 'hint' => 'Própria 32%', 'icon' => 'arrow-up-circle', 'color' => 'text-emerald-500', 'status' => 'estavel'],
            'Despesas' => ['score' => 73, 'link' => route('financeiro.despesas.empenhos'), 'hint' => 'Empen. 68%', 'icon' => 'arrow-down-circle', 'color' => 'text-rose-500', 'status' => 'instavel'],
            'Tesouraria' => ['score' => 77, 'link' => route('financeiro.tesouraria.saldos'), 'hint' => 'Caixa D+90', 'icon' => 'bank', 'color' => 'text-cyan-600', 'status' => 'estavel'],
            'Orçamento' => ['score' => 55, 'link' => route('financeiro.orcamento.loa'), 'hint' => 'Créd. adic. excessivo', 'icon' => 'file-earmark-spreadsheet', 'color' => 'text-blue-600', 'status' => 'critico'],
            'Investimentos' => ['score' => 69, 'link' => route('financeiro.investimentos.capex'), 'hint' => 'CAPEX 41%', 'icon' => 'bricks', 'color' => 'text-orange-500', 'status' => 'instavel'],
            // Restaurado hint original e removido status SIOPS
            'Compliance' => ['score' => 80, 'link' => route('financeiro.compliance.pessoal'), 'hint' => 'Sem alertas', 'icon' => 'shield-check', 'color' => 'text-purple-500', 'status' => 'estavel'],
        ],
    ];

    // -------------------------------------------------------------------------
    // DADOS: SAÚDE (Rotas Originais Restauradas)
    // -------------------------------------------------------------------------
    $saude = [
        'kpis' => [
            ['label' => 'Atendimentos', 'value' => $fmt(128450, 0), 'suffix' => '', 'hint' => 'APS + Urgência', 'link' => route('saude.relatorios.atendimentos'), 'icon' => 'heart-pulse', 'color' => 'text-rose-500', 'status' => 'estavel'],
            ['label' => 'Espera', 'value' => $fmt(55, 0), 'suffix' => ' min', 'hint' => 'média porta', 'link' => route('saude.relatorios.espera'), 'icon' => 'hourglass-split', 'color' => 'text-orange-500', 'status' => 'critico'],
            ['label' => 'Vacinal', 'value' => $fmt(87.3), 'suffix' => '%', 'hint' => 'cobertura', 'link' => route('saude.imunizacao.cobertura'), 'icon' => 'shield-plus', 'color' => 'text-green-500', 'status' => 'estavel'],
            ['label' => 'Medicamentos', 'value' => $fmt(92.1), 'suffix' => '%', 'hint' => 'disponibilidade', 'link' => route('saude.farmacia.disponibilidade'), 'icon' => 'capsule', 'color' => 'text-teal-500', 'status' => 'estavel'],
            ['label' => 'Fila Reg.', 'value' => $fmt(3840, 0), 'suffix' => '', 'hint' => 'cons+exames', 'link' => route('saude.regulacao.fila-consultas'), 'icon' => 'list-task', 'color' => 'text-purple-500', 'status' => 'instavel'],
        ],
        'modulos' => [
            'Atenção Básica' => ['score' => 78, 'link' => route('saude.atencao.ubs-unidades'), 'hint' => 'ESF: 62%', 'icon' => 'hospital', 'color' => 'text-blue-500', 'status' => 'estavel'],
            'Urgência' => ['score' => 61, 'link' => route('saude.urgencia.unidades-upa'), 'hint' => 'Porta > 40min', 'icon' => 'truck-front', 'color' => 'text-red-500', 'status' => 'critico'],
            'Regulação' => ['score' => 66, 'link' => route('saude.regulacao.fila-consultas'), 'hint' => 'SLA 19 dias', 'icon' => 'signpost-split', 'color' => 'text-orange-500', 'status' => 'instavel'],
            'Imunização' => ['score' => 84, 'link' => route('saude.imunizacao.cobertura'), 'hint' => 'Cob. 87%', 'icon' => 'virus', 'color' => 'text-green-500', 'status' => 'estavel'],
            'Farmácia' => ['score' => 73, 'link' => route('saude.farmacia.disponibilidade'), 'hint' => 'Rupturas: 4', 'icon' => 'box2-heart', 'color' => 'text-teal-600', 'status' => 'estavel'],
            'Vigilância' => ['score' => 76, 'link' => route('saude.vigilancia.indicadores-epidermico'), 'hint' => 'Notif: 312', 'icon' => 'eye', 'color' => 'text-indigo-500', 'status' => 'estavel'],
        ],
    ];

    // -------------------------------------------------------------------------
    // DADOS: EDUCAÇÃO (Rotas Originais Restauradas)
    // -------------------------------------------------------------------------
    $educacao = [
        'kpis' => [
            ['label' => 'Matrículas', 'value' => $fmt(58420, 0), 'suffix' => '', 'hint' => 'ativas rede', 'link' => route('educacao.relatorios.matriculas'), 'icon' => 'backpack', 'color' => 'text-blue-500', 'status' => 'neutro'],
            ['label' => 'Frequência', 'value' => $fmt(92.6), 'suffix' => '%', 'hint' => 'média geral', 'link' => route('educacao.relatorios.frequencia'), 'icon' => 'calendar-check', 'color' => 'text-emerald-500', 'status' => 'estavel'],
            ['label' => 'Evasão', 'value' => $fmt(5.4), 'suffix' => '%', 'hint' => 'anual est.', 'link' => route('educacao.relatorios.evasao'), 'icon' => 'box-arrow-right', 'color' => 'text-red-500', 'status' => 'critico'],
            ['label' => 'Fila Creche', 'value' => $fmt(1260, 0), 'suffix' => '', 'hint' => 'demanda', 'link' => route('educacao.matriculas.fila-creche'), 'icon' => 'person-plus', 'color' => 'text-orange-500', 'status' => 'instavel'],
            ['label' => 'Aprovação', 'value' => $fmt(89.1), 'suffix' => '%', 'hint' => 'média rede', 'link' => route('educacao.relatorios.aprendizagem'), 'icon' => 'award', 'color' => 'text-indigo-500', 'status' => 'estavel'],
            ['label' => 'Aprendiz.', 'value' => $fmt(6.4), 'suffix' => '/10', 'hint' => 'índice sim.', 'link' => route('educacao.relatorios.aprendizagem'), 'icon' => '123', 'color' => 'text-purple-500', 'status' => 'instavel'],
        ],
        'modulos' => [
            'Rede Escolar' => ['score' => 80, 'link' => route('educacao.rede.escolas'), 'hint' => '118 escolas', 'icon' => 'building', 'color' => 'text-blue-500', 'status' => 'estavel'],
            'Matrículas' => ['score' => 77, 'link' => route('educacao.matriculas.gestao'), 'hint' => 'Transf 312', 'icon' => 'person-badge', 'color' => 'text-cyan-600', 'status' => 'estavel'],
            'Frequência' => ['score' => 83, 'link' => route('educacao.relatorios.frequencia'), 'hint' => '92,6% média', 'icon' => 'clock-history', 'color' => 'text-green-500', 'status' => 'estavel'],
            'Merenda' => ['score' => 64, 'link' => route('educacao.merenda.estoque'), 'hint' => 'Rupturas graves', 'icon' => 'basket', 'color' => 'text-orange-500', 'status' => 'critico'],
            'Transporte' => ['score' => 69, 'link' => route('educacao.transporte.rotas'), 'hint' => 'Atrasos 8%', 'icon' => 'bus-front', 'color' => 'text-yellow-600', 'status' => 'instavel'],
            'FUNDEB' => ['score' => 78, 'link' => route('educacao.fundeb.indicadores'), 'hint' => 'Aplic. 84%', 'icon' => 'cash-coin', 'color' => 'text-emerald-600', 'status' => 'estavel'],
        ],
    ];

    // SELEÇÃO DE DADOS
    $dados = match($id) {
        'saude' => $saude,
        'educacao' => $educacao,
        'financeiro' => $financeiro,
        default => $financeiro,
    };
@endphp

<div class="space-y-6 w-full">

    {{-- SEÇÃO 1: VISÃO GERAL (KPIs) --}}
    <div>
        <h2 class="text-lg font-bold text-gray-700 dark:text-gray-300 mb-3 px-1 flex items-center gap-2 capitalize">
            <x-bi-speedometer2 class="w-5 h-5"/> Visão Geral: {{ $id }}
        </h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-6 gap-3">
            @foreach ($dados['kpis'] as $kpi)
                
                @php
                    // Recupera o estilo baseado no status (estavel, instavel, critico)
                    $currentStatus = $kpi['status'] ?? 'neutro';
                    $style = $getStyle($currentStatus);
                @endphp

                {{-- WRAPPER DO CARD --}}
                <div class="group relative w-full h-full">

                    {{-- CARD PRINCIPAL (Overflow Hidden) --}}
                    {{-- AQUI APLICAMOS AS CLASSES DINÂMICAS DE BORDA E SOMBRA ($style['wrapper']) --}}
                    <div class="relative w-full h-full overflow-hidden
                                bg-white dark:bg-gray-800
                                p-5 rounded-xl
                                border transition-all duration-300 hover:-translate-y-1
                                {{ $style['wrapper'] }}">
                        
                        {{-- Decoração Blur Dinâmica ($style['blur']) --}}
                        <div class="absolute top-0 right-0 -mt-3 -mr-3 w-16 h-16 rounded-full blur-xl transition-all pointer-events-none 
                                    {{ $style['blur'] }}"></div>

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
                                
                                {{-- 1. ÍCONE --}}
                                <div class="p-2 rounded-lg border shadow-sm transition-colors bg-gray-50 border-gray-100 {{ $kpi['color'] }} dark:bg-gray-700/50 dark:border-gray-600">
                                    <x-dynamic-component :component="'bi-' . $kpi['icon']" class="w-6 h-6" />
                                </div>
                                
                                {{-- 2. LINK COM TOOLTIP --}}
                                <a href="{{ $kpi['link'] }}" target="_blank" rel="noopener noreferrer" 
                                   class="group/link relative text-gray-300 hover:text-sky-500 transition-colors">
                                    <x-bi-arrow-right-short class="w-6 h-6" />

                                    {{-- Tooltip da Seta --}}
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
                        Status: {{ ucfirst($currentStatus) }} - Detalhes
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

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            @foreach ($dados['modulos'] as $nome => $modulo)
                
                @php
                    // Recupera o estilo baseado no status
                    $currentStatus = $modulo['status'] ?? 'neutro';
                    $style = $getStyle($currentStatus);
                @endphp

                {{-- WRAPPER DO CARD --}}
                <div class="group relative w-full h-full">

                    {{-- CARD PRINCIPAL (Overflow Hidden) --}}
                    {{-- AQUI APLICAMOS AS CLASSES DINÂMICAS ($style['wrapper']) --}}
                    <div class="relative w-full h-full overflow-hidden
                                bg-white dark:bg-gray-800
                                p-5 rounded-xl
                                border transition-all duration-300 hover:-translate-y-1
                                {{ $style['wrapper'] }}">

                        {{-- Decoração Blur Dinâmica ($style['blur']) --}}
                        <div class="absolute top-0 right-0 -mt-3 -mr-3 w-12 h-12 rounded-full blur-xl transition-all pointer-events-none
                                    {{ $style['blur'] }}"></div>

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
                                
                                {{-- 1. ÍCONE --}}
                                <div class="p-2 rounded-lg border shadow-sm transition-colors bg-gray-50 border-gray-100 {{ $modulo['color'] }} dark:bg-gray-700/50 dark:border-gray-600">
                                    <x-dynamic-component :component="'bi-' . $modulo['icon']" class="w-6 h-6" />
                                </div>

                                {{-- 2. LINK COM TOOLTIP --}}
                                <a href="{{ $modulo['link'] }}" target="_blank" rel="noopener noreferrer" 
                                   class="group/link relative text-gray-300 hover:text-sky-500 transition-colors">
                                    <x-bi-arrow-right-short class="w-6 h-6" />

                                    {{-- Tooltip da Seta --}}
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
                        Visualizar detalhes de {{ $nome }}
                    </div>

                </div>
            @endforeach
        </div>
    </div>
</div>