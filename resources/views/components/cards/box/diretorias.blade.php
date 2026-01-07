{{-- resources/views/components/cards/box/diretorias.blade.php --}}
@props([
    'id' => 'financeiro', // 'financeiro', 'saude' ou 'educacao'
])

@php
    // Helper de formatação
    $fmt = fn($v, $d = 1) => number_format($v, $d, ',', '.');

    // -------------------------------------------------------------------------
    // 1. CONFIGURAÇÃO DE ESTILOS (RESTRITO: CRITICO, INSTAVEL, OK)
    // -------------------------------------------------------------------------
    $statusStyles = [
        // CRITICO: Vermelho com Blur
        'critico' => [
            'wrapper' => 'border-red-500 shadow-xl shadow-red-500/20 dark:border-red-500/50',
            'blur'    => 'bg-red-500/10',
            'icon_bg' => 'bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400'
        ],
        // INSTAVEL: Amarelo com Blur
        'instavel' => [
            'wrapper' => 'border-amber-400 shadow-xl shadow-amber-500/20 dark:border-amber-500/50',
            'blur'    => 'bg-amber-500/10',
            'icon_bg' => 'bg-amber-100 text-amber-700 dark:bg-amber-900/30 dark:text-amber-400'
        ],
        // OK: Neutro (Slate), SEM Blur, SEM Destaque de cor
        'ok' => [
            'wrapper' => 'border-slate-300 dark:border-slate-700 shadow-sm',
            'blur'    => 'hidden', // Remove o brilho
            'icon_bg' => 'bg-slate-200 text-slate-600 dark:bg-slate-700 dark:text-slate-300'
        ],
    ];

    // Helper para pegar o estilo (Default é OK)
    $getStyle = fn($status) => $statusStyles[$status] ?? $statusStyles['ok'];

    // -------------------------------------------------------------------------
    // DADOS: FINANCEIRO (Dados em Bilhões/Milhões, Sem Verdes)
    // -------------------------------------------------------------------------
    $financeiro = [
        'kpis' => [
            // Neutro
            ['label' => 'Execução Orç.', 'value' => $fmt(82.1), 'suffix' => '%', 'hint' => 'Empenhado/Previsto', 'link' => route('financeiro.orcamento.loa'), 'icon' => 'activity', 'status' => 'ok'],
            // Neutro (Era verde)
            ['label' => 'Superávit Fin.', 'value' => $fmt(1.45), 'prefix' => 'R$ ', 'suffix' => ' bi', 'hint' => 'Disponibilidade', 'link' => route('financeiro.tesouraria.saldos'), 'icon' => 'bank', 'status' => 'ok'],
            // Neutro (Era azul/verde)
            ['label' => 'Receita Realiz.', 'value' => $fmt(3.2), 'prefix' => 'R$ ', 'suffix' => ' bi', 'hint' => 'Acumulado Ano', 'link' => route('financeiro.relatorios.rx_d'), 'icon' => 'graph-up-arrow', 'status' => 'ok'],
            // Instável (Amarelo)
            ['label' => 'Pessoal/RCL', 'value' => $fmt(52.8), 'suffix' => '%', 'hint' => 'Próx. Limite (54%)', 'link' => route('financeiro.compliance.pessoal'), 'icon' => 'people', 'status' => 'instavel'],
        ],
        'modulos' => [
            'Receitas'      => ['score' => 92, 'link' => route('financeiro.receitas.arrecadacao'), 'hint' => 'Metas atingidas', 'icon' => 'arrow-up-circle', 'status' => 'ok'],
            'Despesas'      => ['score' => 73, 'link' => route('financeiro.despesas.empenhos'), 'hint' => 'Contenção necessária', 'icon' => 'arrow-down-circle', 'status' => 'instavel'],
            'Tesouraria'    => ['score' => 88, 'link' => route('financeiro.tesouraria.saldos'), 'hint' => 'Conciliação em dia', 'icon' => 'wallet2', 'status' => 'ok'],
            'Orçamento'     => ['score' => 55, 'link' => route('financeiro.orcamento.loa'), 'hint' => 'Créditos s/ lastro', 'icon' => 'file-earmark-spreadsheet', 'status' => 'critico'],
            'Investimentos' => ['score' => 60, 'link' => route('financeiro.investimentos.capex'), 'hint' => 'Obras paradas', 'icon' => 'bricks', 'status' => 'instavel'],
            'Compliance'    => ['score' => 95, 'link' => route('financeiro.compliance.pessoal'), 'hint' => 'Certidões em dia', 'icon' => 'shield-check', 'status' => 'ok'],
        ],
    ];

    // -------------------------------------------------------------------------
    // DADOS: SAÚDE (Sem Verdes, Foco em Crítico/Instável)
    // -------------------------------------------------------------------------
    $saude = [
        'kpis' => [
            // Crítico (Vermelho)
            ['label' => 'Fila Cirurgias', 'value' => $fmt(4850, 0), 'suffix' => '', 'hint' => 'Eletivas atrasadas', 'link' => route('saude.relatorios.atendimentos'), 'icon' => 'heart-pulse', 'status' => 'critico'],
            // Instável (Amarelo)
            ['label' => 'Tempo Espera', 'value' => $fmt(4), 'suffix' => ' horas', 'hint' => 'Média UPA', 'link' => route('saude.relatorios.espera'), 'icon' => 'hourglass-split', 'status' => 'instavel'],
            // Neutro (Era verde)
            ['label' => 'Cobertura Vac.', 'value' => $fmt(89.5), 'suffix' => '%', 'hint' => 'PNI Geral', 'link' => route('saude.imunizacao.cobertura'), 'icon' => 'shield-plus', 'status' => 'ok'],
            // Neutro (Era verde)
            ['label' => 'Abastecimento', 'value' => $fmt(94.0), 'suffix' => '%', 'hint' => 'Medicamentos', 'link' => route('saude.farmacia.disponibilidade'), 'icon' => 'capsule', 'status' => 'ok'],
            // Instável
            ['label' => 'Fila Exames', 'value' => $fmt(12400, 0), 'suffix' => '', 'hint' => 'Alta complexidade', 'link' => route('saude.regulacao.fila-consultas'), 'icon' => 'list-task', 'status' => 'instavel'],
        ],
        'modulos' => [
            'Atenção Básica' => ['score' => 85, 'link' => route('saude.atencao.ubs-unidades'), 'hint' => 'Equipes completas', 'icon' => 'hospital', 'status' => 'ok'],
            'Urgência'       => ['score' => 45, 'link' => route('saude.urgencia.unidades-upa'), 'hint' => 'Superlotação', 'icon' => 'truck-front', 'status' => 'critico'],
            'Regulação'      => ['score' => 62, 'link' => route('saude.regulacao.fila-consultas'), 'hint' => 'Gargalo em exames', 'icon' => 'signpost-split', 'status' => 'instavel'],
            'Imunização'     => ['score' => 90, 'link' => route('saude.imunizacao.cobertura'), 'hint' => 'Metas ok', 'icon' => 'virus', 'status' => 'ok'],
            'Farmácia'       => ['score' => 88, 'link' => route('saude.farmacia.disponibilidade'), 'hint' => 'Estoque regular', 'icon' => 'box2-heart', 'status' => 'ok'],
            'Vigilância'     => ['score' => 82, 'link' => route('saude.vigilancia.indicadores-epidermico'), 'hint' => 'Monitoramento ativo', 'icon' => 'eye', 'status' => 'ok'],
        ],
    ];

    // -------------------------------------------------------------------------
    // DADOS: EDUCAÇÃO
    // -------------------------------------------------------------------------
    $educacao = [
        'kpis' => [
            // Neutro
            ['label' => 'Alunos Rede', 'value' => $fmt(145000, 0), 'suffix' => '', 'hint' => 'Matrículas Ativas', 'link' => route('educacao.relatorios.matriculas'), 'icon' => 'backpack', 'status' => 'ok'],
            // Neutro (Era verde)
            ['label' => 'Frequência', 'value' => $fmt(94.2), 'suffix' => '%', 'hint' => 'Média mensal', 'link' => route('educacao.relatorios.frequencia'), 'icon' => 'calendar-check', 'status' => 'ok'],
            // Crítico
            ['label' => 'Evasão Escolar', 'value' => $fmt(8.4), 'suffix' => '%', 'hint' => 'Acima da meta (5%)', 'link' => route('educacao.relatorios.evasao'), 'icon' => 'box-arrow-right', 'status' => 'critico'],
            // Instável
            ['label' => 'Déficit Creche', 'value' => $fmt(2100, 0), 'suffix' => '', 'hint' => 'Lista de espera', 'link' => route('educacao.matriculas.fila-creche'), 'icon' => 'person-plus', 'status' => 'instavel'],
            // Neutro
            ['label' => 'IDEB Projetado', 'value' => $fmt(6.1), 'suffix' => '', 'hint' => 'Anos Iniciais', 'link' => route('educacao.relatorios.aprendizagem'), 'icon' => 'award', 'status' => 'ok'],
            // Neutro
            ['label' => 'IDEB Final', 'value' => $fmt(5.2), 'suffix' => '', 'hint' => 'Anos Finais', 'link' => route('educacao.relatorios.aprendizagem'), 'icon' => '123', 'status' => 'ok'],
        ],
        'modulos' => [
            'Infraestrutura' => ['score' => 82, 'link' => route('educacao.rede.escolas'), 'hint' => 'Reformas em dia', 'icon' => 'building', 'status' => 'ok'],
            'Secretaria'     => ['score' => 88, 'link' => route('educacao.matriculas.gestao'), 'hint' => 'Digitalização', 'icon' => 'person-badge', 'status' => 'ok'],
            'Pedagógico'     => ['score' => 91, 'link' => route('educacao.relatorios.frequencia'), 'hint' => 'Planejamento ok', 'icon' => 'journal-bookmark', 'status' => 'ok'],
            'Merenda'        => ['score' => 58, 'link' => route('educacao.merenda.estoque'), 'hint' => 'Irregularidades', 'icon' => 'basket', 'status' => 'critico'],
            'Transporte'     => ['score' => 65, 'link' => route('educacao.transporte.rotas'), 'hint' => 'Frota envelhecida', 'icon' => 'bus-front', 'status' => 'instavel'],
            'FUNDEB'         => ['score' => 98, 'link' => route('educacao.fundeb.indicadores'), 'hint' => 'Aplicação 100%', 'icon' => 'cash-coin', 'status' => 'ok'],
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
                    $currentStatus = $kpi['status'] ?? 'ok';
                    $style = $getStyle($currentStatus);
                @endphp

                <div class="group relative w-full h-full">
                    {{-- ALTERADO: bg-white removido, usado bg-slate-50 --}}
                    <div class="relative w-full h-full overflow-hidden
                                bg-slate-50 dark:bg-gray-800
                                p-5 rounded-xl
                                border transition-all duration-300 hover:-translate-y-1
                                {{ $style['wrapper'] }}">
                        
                        {{-- Decoração Blur (Oculto se status = ok) --}}
                        <div class="absolute top-0 right-0 -mt-3 -mr-3 w-16 h-16 rounded-full blur-xl transition-all pointer-events-none 
                                    {{ $style['blur'] }}"></div>

                        <div class="relative z-10 flex justify-between items-start h-full gap-2">
                            <div class="flex flex-col justify-between h-full">
                                <p class="text-gray-500 dark:text-gray-400 text-xs font-bold uppercase tracking-wider truncate">
                                    {{ $kpi['label'] }}
                                </p>
                                <div class="mt-1">
                                    <h3 class="text-2xl font-bold text-gray-800 dark:text-white tracking-tight leading-none whitespace-nowrap">
                                        <span class="text-xs text-gray-400 font-normal mr-px align-middle">{{ $kpi['prefix'] ?? '' }}</span>{{ $kpi['value'] }}<span class="text-xs text-gray-400 font-normal ml-px align-baseline">{{ $kpi['suffix'] ?? '' }}</span>
                                    </h3>
                                </div>
                                <div class="mt-1">
                                    <span class="text-xs text-gray-400 dark:text-gray-500 truncate block">
                                        {{ $kpi['hint'] }}
                                    </span>
                                </div>
                            </div>

                            <div class="flex flex-col justify-between items-end h-full space-y-2">
                                {{-- ÍCONE com BG dinâmico (Cinza se OK, Colorido se Crítico/Instável) --}}
                                <div class="p-2 rounded-lg border shadow-sm transition-colors border-gray-100 dark:border-gray-600 {{ $style['icon_bg'] }}">
                                    <x-dynamic-component :component="'bi-' . $kpi['icon']" class="w-6 h-6" />
                                </div>
                                
                                <a href="{{ $kpi['link'] }}" target="_blank" 
                                   class="group/link relative text-gray-300 hover:text-sky-500 transition-colors">
                                    <x-bi-arrow-right-short class="w-6 h-6" />
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- Tooltip Simples --}}
                    @if($currentStatus !== 'ok')
                    <div class="absolute top-full left-1/2 -translate-x-1/2 mt-3 w-max px-3 py-1.5
                                bg-slate-800 text-white text-xs font-medium rounded-lg shadow-xl
                                opacity-0 invisible group-hover:opacity-100 group-hover:visible 
                                transition-all duration-300 transform -translate-y-2 group-hover:translate-y-0
                                z-[99] pointer-events-none">
                        <div class="absolute bottom-full left-1/2 -translate-x-1/2 border-4 border-transparent border-b-slate-800"></div>
                        Atenção: {{ ucfirst($currentStatus) }}
                    </div>
                    @endif
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
                    $currentStatus = $modulo['status'] ?? 'ok';
                    $style = $getStyle($currentStatus);
                @endphp

                <div class="group relative w-full h-full">
                    {{-- ALTERADO: bg-white removido, usado bg-slate-50 --}}
                    <div class="relative w-full h-full overflow-hidden
                                bg-slate-50 dark:bg-gray-800
                                p-5 rounded-xl
                                border transition-all duration-300 hover:-translate-y-1
                                {{ $style['wrapper'] }}">

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
                                <div class="p-2 rounded-lg border shadow-sm transition-colors border-gray-100 dark:border-gray-600 {{ $style['icon_bg'] }}">
                                    <x-dynamic-component :component="'bi-' . $modulo['icon']" class="w-6 h-6" />
                                </div>

                                <a href="{{ $modulo['link'] }}" target="_blank" 
                                   class="group/link relative text-gray-300 hover:text-sky-500 transition-colors">
                                    <x-bi-arrow-right-short class="w-6 h-6" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>