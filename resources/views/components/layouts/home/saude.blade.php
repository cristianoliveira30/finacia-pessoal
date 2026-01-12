{{-- saude.blade.php --}}
@php
    $menus = [
        // 1) Painel / Visão Geral
        [
            'id' => 'saude-painel',
            'label' => 'Painel',
            'popover_title' => 'Painel da Saúde',
            'hex_main' => '#38bdf8', // sky-400
            'hex_hover_bg' => 'rgba(12, 74, 110, 0.4)', // sky-900/40
            'hex_light' => '#7dd3fc', // sky-300
            'icon_main' => 'speedometer2',
            'items' => [
                ['label' => 'Dashboard Saúde', 'route' => 'saude.home', 'icon' => 'speedometer2'],
                ['label' => 'Indicadores (Resumo)', 'route' => 'saude.painel.indicadores', 'icon' => 'clipboard-data'],
                ['label' => 'Metas e Acompanhamento', 'route' => 'saude.painel.metas', 'icon' => 'bullseye'],
            ],
        ],

        // 2) Relatórios (BI)
        [
            'id' => 'saude-relatorios',
            'label' => 'Relatórios',
            'popover_title' => 'Relatórios de Saúde',
            'hex_main' => '#34d399', // emerald-400
            'hex_hover_bg' => 'rgba(6, 78, 59, 0.4)', // emerald-900/40
            'hex_light' => '#6ee7b7', // emerald-300
            'icon_main' => 'bar-chart',
            'items' => [
                [
                    'label' => 'Atendimentos (Volume)', 'route' => 'saude.relatorios.atendimentos', 'icon' => 'activity'
                ],
                [
                    'label' => 'Tempo de Espera (UBS/UPA)', 'route' => 'saude.relatorios.espera', 'icon' => 'stopwatch'
                ],
                [
                    'label' => 'Produção por Unidade',
                    'route' => 'saude.relatorios.producao_unidade', // Mantido _ pois no web.php o name() usa underscore
                    'icon' => 'building',
                ],
                [
                    'label' => 'Produção por Profissional',
                    'route' => 'saude.relatorios.producao_profissional', // Mantido _ pois no web.php o name() usa underscore
                    'icon' => 'person-badge',
                ],
                [
                    'label' => 'Absenteísmo (No-show)', 'route' => 'saude.relatorios.no_show', 'icon' => 'calendar-x'
                ],
                [
                    'label' => 'Encaminhamentos / Regulação',
                    'route' => 'saude.relatorios.regulacao',
                    'icon' => 'arrow-left-right',
                ],
                [
                    'label' => 'Indicadores SUS (Resumo)',
                    'route' => 'saude.relatorios.indicadores_sus', // Mantido _ pois no web.php o name() usa underscore
                    'icon' => 'graph-up',
                ],
            ],
        ],

        // 3) Atenção Básica (UBS/ESF)
        [
            'id' => 'saude-atencao-basica',
            'label' => 'Atenção Básica',
            'popover_title' => 'UBS / ESF / APS',
            'hex_main' => '#a78bfa', // violet-400
            'hex_hover_bg' => 'rgba(88, 28, 135, 0.35)', // violet-900/35
            'hex_light' => '#c4b5fd', // violet-300
            'icon_main' => 'house-heart',
            'items' => [
                ['label' => 'UBS / Unidades', 'route' => 'saude.atencao.ubs-unidades', 'icon' => 'building'],
                ['label' => 'Equipes ESF', 'route' => 'saude.atencao.equipes', 'icon' => 'people'],
                ['label' => 'Visitas Domiciliares', 'route' => 'saude.atencao.visitas', 'icon' => 'geo-alt'],
                ['label' => 'Acompanhamentos (Crônicos)', 'route' => 'saude.atencao.acompanhamentos', 'icon' => 'heart-pulse'],
            ],
        ],

        // 4) Urgência e Emergência (UPA/Hospital)
        [
            'id' => 'saude-urgencia',
            'label' => 'Urgência',
            'popover_title' => 'UPA / Emergência',
            'hex_main' => '#f43f5e', // rose-500
            'hex_hover_bg' => 'rgba(136, 19, 55, 0.35)', // rose-900/35
            'hex_light' => '#fda4af', // rose-300
            'icon_main' => 'hospital',
            'items' => [
                ['label' => 'UPA / Unidades', 'route' => 'saude.urgencia.unidades-upa', 'icon' => 'hospital'],
                [
                    'label' => 'Classificação de Risco',
                    'route' => 'saude.urgencia.classificacao-risco', // Alterado: Adicionado -risco conforme web.php
                    'icon' => 'exclamation-triangle',
                ],
                ['label' => 'Tempo Porta-Médico', 'route' => 'saude.urgencia.porta-medico', 'icon' => 'stopwatch'], // Alterado: _ para -
                [
                    'label' => 'Leitos (Disponibilidade)',
                    'route' => 'saude.urgencia.leitos',
                    'icon' => 'clipboard2-pulse',
                ],
            ],
        ],

        // 5) Vigilância em Saúde (epidemiológica/sanitária)
        [
            'id' => 'saude-vigilancia',
            'label' => 'Vigilância',
            'popover_title' => 'Vigilância em Saúde',
            'hex_main' => '#fbbf24', // amber-400
            'hex_hover_bg' => 'rgba(120, 53, 15, 0.4)', // amber-900/40
            'hex_light' => '#fcd34d', // amber-300
            'icon_main' => 'shield-check',
            'items' => [
                [
                    'label' => 'Notificações (SINAN)',
                    'route' => 'saude.vigilancia.notificacoes',
                    'icon' => 'clipboard-data',
                ],
                ['label' => 'Casos por Agravo', 'route' => 'saude.vigilancia.cas0-agravo', 'icon' => 'graph-up'], // ATENÇÃO: Mantido 'cas0' (com zero) pois está assim no web.php
                ['label' => 'Fiscalização Sanitária', 'route' => 'saude.vigilancia.fiscalizacao', 'icon' => 'search'],
                [
                    'label' => 'Indicadores Epidemiológicos',
                    'route' => 'saude.vigilancia.indicadores-epidermico',
                    'icon' => 'activity',
                ],
            ],
        ],

        // 6) Imunização (Vacinas)
        [
            'id' => 'saude-imunizacao',
            'label' => 'Imunização',
            'popover_title' => 'Vacinação / Cobertura',
            'hex_main' => '#22c55e', // green-500
            'hex_hover_bg' => 'rgba(20, 83, 45, 0.35)', // green-900/35
            'hex_light' => '#86efac', // green-300
            'icon_main' => 'capsule',
            'items' => [
                ['label' => 'Cobertura Vacinal', 'route' => 'saude.imunizacao.cobertura', 'icon' => 'bar-chart'], // Alterado: removido -vacinal para bater com web.php
                ['label' => 'Campanhas', 'route' => 'saude.imunizacao.campanhas', 'icon' => 'megaphone'],
                ['label' => 'Estoque de Vacinas', 'route' => 'saude.imunizacao.estoque-vacina', 'icon' => 'boxes'],
                [
                    'label' => 'Perdas / Vencimentos',
                    'route' => 'saude.imunizacao.perdas',
                    'icon' => 'exclamation-triangle',
                ],
            ],
        ],

        // 7) Farmácia / Medicamentos
        [
            'id' => 'saude-farmacia',
            'label' => 'Farmácia',
            'popover_title' => 'Farmácia / Medicamentos',
            'hex_main' => '#60a5fa', // blue-400
            'hex_hover_bg' => 'rgba(30, 58, 138, 0.35)', // blue-900/35
            'hex_light' => '#93c5fd', // blue-300
            'icon_main' => 'capsule-pill',
            'items' => [
                [
                    'label' => 'Disponibilidade de Itens',
                    'route' => 'saude.farmacia.disponibilidade',
                    'icon' => 'check2-circle',
                ],
                ['label' => 'Estoque / Almoxarifado', 'route' => 'saude.farmacia.almoxarifado', 'icon' => 'boxes'],
                ['label' => 'Consumo (Curva ABC)', 'route' => 'saude.farmacia.disponibilidade', 'icon' => 'pie-chart'], // Rota duplicada no web.php, apontei para a existente
                ['label' => 'Rupturas (Faltas)', 'route' => 'saude.farmacia.rupturas', 'icon' => 'x-circle'],
            ],
        ],

        // 8) Regulação / Exames / Fila
        [
            'id' => 'saude-regulacao',
            'label' => 'Regulação',
            'popover_title' => 'Regulação / Filas',
            'hex_main' => '#f97316', // orange-500
            'hex_hover_bg' => 'rgba(124, 45, 18, 0.35)', // orange-900/35
            'hex_light' => '#fdba74', // orange-300
            'icon_main' => 'list-check',
            'items' => [
                ['label' => 'Fila de Consultas', 'route' => 'saude.regulacao.fila-consultas', 'icon' => 'list-ol'], // Alterado: _ para -
                ['label' => 'Fila de Exames', 'route' => 'saude.regulacao.fila-exames', 'icon' => 'list-ol'], // Alterado: _ para - (embora a imagem mostrasse hifen, conferi com web.php)
                ['label' => 'SLA da Regulação', 'route' => 'saude.regulacao.sla-regulacao', 'icon' => 'stopwatch'], // Alterado: de .sla para .sla-regulacao
                ['label' => 'Oferta x Demanda', 'route' => 'saude.regulacao.oferta-demanda', 'icon' => 'bar-chart'], // Alterado: _ para -
            ],
        ],

        // 9) Financeiro da Saúde (SUS / despesas)
        [
            'id' => 'saude-financeiro',
            'label' => 'Financeiro',
            'popover_title' => 'Financeiro da Saúde',
            'hex_main' => '#64748b', // slate-500
            'hex_hover_bg' => 'rgba(15, 23, 42, 0.35)', // slate-950/35
            'hex_light' => '#cbd5e1', // slate-300
            'icon_main' => 'bank',
            'items' => [
                ['label' => 'Receitas SUS / Transferências', 'route' => 'saude.financeiro.receita-transferencia', 'icon' => 'cash'],
                ['label' => 'Despesas (Por Programa)', 'route' => 'saude.financeiro.despesas-programa', 'icon' => 'receipt'],
                [
                    'label' => 'Mínimo Constitucional (15%)', 'route' => 'saude.financeiro.minimo-constitucional', 'icon' => 'shield-check',
                ],
                ['label' => 'Contratos / Fornecedores', 'route' => 'saude.financeiro.contratos-fornecedores', 'icon' => 'people'],
            ],
        ],
    ];
@endphp

{{-- CSS específico do sidebar com suporte a tema --}}
<style>
    /* =================== CORES POR TEMA =================== */
    :root {
        --sidebar-bg: #ffffff;
        --sidebar-border: #e5e7eb;
        --sidebar-text: #020617;
        --sidebar-hover-bg: #f3f4f6;
        --sidebar-submenu-bg: #ffffff;
        --sidebar-submenu-border: #e5e7eb;
        --sidebar-tooltip-bg: #4b5563;
    }

    html.dark {
        --sidebar-bg: #020617; /* bg-slate-950 */
        --sidebar-border: #1e293b; /* border-slate-800 */
        --sidebar-text: #e5e7eb; /* text-slate-200 */
        --sidebar-hover-bg: #111827; /* bg-slate-900 */
        --sidebar-submenu-bg: #374151; /* bg-slate-700 */
        --sidebar-submenu-border: #4b5563;
        --sidebar-tooltip-bg: #4b5563; /* bg-slate-600 */
    }

    /* TEMA BLACK (ZINC) */
    html.black {
        --sidebar-bg: #18181b; /* zinc-900 */
        --sidebar-border: #27272a; /* zinc-800 */
        --sidebar-text: #e4e4e7; /* zinc-200 */
        --sidebar-hover-bg: #27272a; /* zinc-800 (Hover suave) */
        --sidebar-submenu-bg: #18181b; /* zinc-900 */
        --sidebar-submenu-border: #3f3f46; /* zinc-700 */
        --sidebar-tooltip-bg: #27272a; /* zinc-800 */
    }

    /* =================== LAYOUT / ESTILOS =================== */
    @media (min-width: 1024px) {
        body.sidebar-collapsed #top-bar-sidebar {
            width: 4.5rem;
        }

        body.sidebar-collapsed #top-bar-sidebar .sidebar-label {
            display: none;
        }

        body.sidebar-collapsed #top-bar-sidebar .sidebar-link {
            justify-content: center;
            padding-left: 0.75rem;
            padding-right: 0.75rem;
        }

        body:not(.sidebar-collapsed) .popover-flowbite {
            display: none !important;
            visibility: hidden !important;
            opacity: 0 !important;
            pointer-events: none !important;
        }
    }

    #top-bar-sidebar {
        overflow: visible;
        background-color: var(--sidebar-bg);
        color: var(--sidebar-text);
        border-color: var(--sidebar-border);
    }

    #top-bar-sidebar nav {
        overflow-y: auto;
        overflow-x: hidden;
    }

    #top-bar-sidebar .sidebar-link {
        color: inherit;
    }

    #top-bar-sidebar .sidebar-link:hover {
        background-color: var(--sidebar-hover-bg);
    }

    .menu-group {
        position: relative;
    }

    .menu-group .menu-highlight {
        position: absolute;
        inset: 0.15rem 0.25rem;
        border-radius: 0.75rem;
        opacity: 0;
        pointer-events: none;
        transition: opacity 150ms ease;
    }

    body:not(.sidebar-collapsed) .menu-group:hover .menu-highlight {
        opacity: 1;
    }

    body.sidebar-collapsed .menu-group .menu-highlight {
        display: none;
    }

    .menu-group .chevron-icon {
        transition: transform 150ms ease;
    }

    body:not(.sidebar-collapsed) .menu-group[data-open="true"] .chevron-icon {
        transform: rotate(90deg);
    }

    .submenu {
        display: none !important;
    }

    body:not(.sidebar-collapsed) .menu-group[data-open="true"]>.submenu {
        display: block !important;
        position: static;
        padding-left: 2.25rem;
        padding-right: 0.75rem;
        margin-top: 0.25rem;
        background: transparent;
        box-shadow: none;
    }

    body.sidebar-collapsed .menu-group>.submenu {
        display: none !important;
    }

    body.sidebar-collapsed .sidebar-link[data-tooltip] {
        position: relative;
    }

    body.sidebar-collapsed .sidebar-link[data-tooltip]::after {
        content: attr(data-tooltip);
        position: absolute;
        left: calc(100% + 0.75rem);
        top: 50%;
        transform: translateY(-50%);
        white-space: nowrap;
        background-color: var(--sidebar-tooltip-bg);
        color: #f9fafb;
        font-size: 0.75rem;
        padding: 0.25rem 0.5rem;
        border-radius: 0.5rem;
        opacity: 0;
        pointer-events: none;
        transition: opacity 150ms ease;
        z-index: 9999;
    }

    body.sidebar-collapsed .sidebar-link[data-tooltip]:hover::after {
        opacity: 1;
    }

    .scrollbar-hide {
        -ms-overflow-style: none;
        /* IE/Edge antigo */
        scrollbar-width: none;
        /* Firefox */
    }

    .scrollbar-hide::-webkit-scrollbar {
        width: 0;
        height: 0;
    }
</style>

{{-- Container Sidebar: black:bg-zinc-900 black:border-zinc-800 --}}
<aside id="top-bar-sidebar"
    class="fixed top-16 bottom-0 left-0 z-40 w-64 -translate-x-full lg:translate-x-0
         border-e transition-transform duration-300 bg-white dark:bg-gray-800 black:bg-zinc-900 black:border-zinc-800"
    aria-label="Sidebar">
    <div class="h-full flex flex-col">
        <div class="h-full flex flex-col">
            <nav class="flex-1 px-2 pb-4 text-sm font-medium scrollbar-hide">
                <ul class="space-y-1">

                    {{-- DASHBOARD --}}
                    <li>
                        {{-- Dashboard Link: black:hover:bg-zinc-800 black:text-zinc-200 --}}
                        <a href="{{ route('tv.saude') }}"
                            class="sidebar-link flex items-center gap-3 rounded-lg px-3 py-2.5 text-slate-100 hover:bg-slate-800 black:text-zinc-200 black:hover:bg-zinc-800"
                            data-tooltip="Modo Tv" target="_blank" rel="noopener noreferrer">
                            <x-bi-tv class="w-5 h-5" />
                            <span class="sidebar-label whitespace-nowrap font-semibold">Modo TV</span>
                        </a>
                    </li>

                    {{-- LOOP PARA GERAR TODOS OS MENUS COM DROPDOWN --}}
                    @foreach ($menus as $menu)
                        <li class="menu-group" data-open="false">
                            <div class="menu-highlight -z-10" style="background-color: {{ $menu['hex_hover_bg'] }}">
                            </div>

                            <button type="button"
                                class="sidebar-link flex w-full items-center justify-between rounded-lg px-3 py-2.5 {{ $menu['id'] === 'calendario' ? 'text-slate-200' : '' }}"
                                data-submenu-toggle="submenu-{{ $menu['id'] }}"
                                data-popover-target="popover-{{ $menu['id'] }}" data-popover-placement="right-start"
                                data-popover-offset="8">
                                <div class="flex items-center gap-3">
                                    <x-dynamic-component :component="'bi-' . $menu['icon_main']" class="w-5 h-5" />

                                    <span class="inline-flex h-6 w-1 rounded-full"
                                        style="background-color: {{ $menu['hex_main'] }}"></span>
                                    <span class="sidebar-label whitespace-nowrap">{{ $menu['label'] }}</span>
                                </div>

                                <x-bi-chevron-right class="chevron-icon w-3 h-3"
                                    style="color: {{ $menu['hex_light'] }}" />
                            </button>

                            <div id="submenu-{{ $menu['id'] }}"
                                class="submenu mt-1 pl-9 pr-3 p-1 text-xs {{ $menu['id'] === 'calendario' ? 'text-slate-200' : '' }}">
                                <div class="flex gap-3">
                                    {{-- Divisor do submenu: black:bg-zinc-700 --}}
                                    <span class="w-px bg-slate-700 ml-2 black:bg-zinc-700"></span>
                                    <div class="space-y-1">
                                        @foreach ($menu['items'] as $item)
                                            @php
                                                $r = $item['route'] ?? null;
                                                $href =
                                                    $r && \Illuminate\Support\Facades\Route::has($r) ? route($r) : '#';
                                            @endphp
                                            {{-- Submenu Link: black:hover:bg-zinc-800 --}}
                                            <a href="{{ $href }}"
                                                class="flex items-center gap-2 rounded-md px-1 py-1 hover:bg-slate-800 black:hover:bg-zinc-800 transition-colors"
                                                onmouseover="this.style.color='{{ $menu['hex_light'] }}'"
                                                onmouseout="this.style.color=''" target="_blank"
                                                rel="noopener noreferrer">
                                                <span class="inline-flex h-4 w-1 rounded-full"
                                                    style="background-color: {{ $menu['hex_main'] }}"></span>
                                                <span>{{ $item['label'] }}</span>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach

                </ul>
            </nav>
        </div>
    </div>

    {{-- LOOP PARA GERAR OS POPOVERS (FORA DO NAV) --}}
    @foreach ($menus as $menu)
        {{-- Popover Container: black:bg-zinc-900 black:border-zinc-800 black:text-zinc-200 --}}
        <div data-popover id="popover-{{ $menu['id'] }}" role="tooltip"
            class="popover-flowbite absolute z-50 invisible inline-block w-48 text-sm text-gray-900 dark:text-gray-200 black:text-zinc-200 transition-opacity duration-300 bg-white dark:bg-gray-800 black:bg-zinc-900 border border-gray-200 dark:border-gray-700 black:border-zinc-800 rounded-lg shadow-xl opacity-0">
            <div class="p-3">
                <div class="flex items-center gap-2 mb-2 pb-2 border-b border-gray-200 dark:border-gray-700 black:border-zinc-800">
                    <span class="h-4 w-1 rounded-full" style="background-color: {{ $menu['hex_main'] }}"></span>
                    <span class="font-semibold"
                        style="color: {{ $menu['hex_main'] }}">{{ $menu['popover_title'] }}</span>
                </div>
                <ul class="space-y-1">
                    @foreach ($menu['items'] as $item)
                        <li>
                            {{-- Popover Item: black:hover:bg-zinc-800 black:hover:text-zinc-100 --}}
                            <a href="{{ route($item['route']) }}"
                                class="flex items-center gap-2 px-2 py-1.5 rounded hover:bg-gray-100 dark:hover:bg-gray-700 black:hover:bg-zinc-800 hover:text-gray-900 dark:hover:text-white black:hover:text-zinc-100 transition-colors"
                                target="_blank"
                                rel="noopener noreferrer">
                                <x-dynamic-component :component="'bi-'
                                . $item['icon']" class="w-4 h-4" />
                            <span>{{ $item['label'] }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div data-popper-arrow></div>
        </div>
    @endforeach

</aside>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sidebar = document.getElementById('top-bar-sidebar');
        const toggleBtn = document.getElementById('header-sidebar-toggle');
        const STORAGE_KEY = 'sidebarCollapsed';

        if (!sidebar || !toggleBtn) return;

        const isDesktop = () => window.innerWidth >= 1024;

        function applyInitialState() {
            if (isDesktop()) {
                const collapsed = localStorage.getItem(STORAGE_KEY) === 'true';
                sidebar.classList.remove('-translate-x-full');
                document.body.classList.toggle('sidebar-collapsed', collapsed);
                toggleBtn.setAttribute('aria-expanded', String(!collapsed));
            } else {
                sidebar.classList.add('-translate-x-full');
                document.body.classList.remove('sidebar-collapsed');
                toggleBtn.setAttribute('aria-expanded', 'false');
            }
        }

        applyInitialState();

        toggleBtn.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
            if (isDesktop()) {
                const collapsed = document.body.classList.toggle('sidebar-collapsed');
                localStorage.setItem(STORAGE_KEY, collapsed);
                toggleBtn.setAttribute('aria-expanded', String(!collapsed));
            } else {
                const isHidden = sidebar.classList.contains('-translate-x-full');
                sidebar.classList.toggle('-translate-x-full');
                toggleBtn.setAttribute('aria-expanded', String(isHidden));
            }
        });

        document.addEventListener('click', (e) => {
            if (isDesktop()) return;
            if (sidebar.contains(e.target) || toggleBtn.contains(e.target)) return;
            if (!sidebar.classList.contains('-translate-x-full')) {
                sidebar.classList.add('-translate-x-full');
                toggleBtn.setAttribute('aria-expanded', 'false');
            }
        });

        window.addEventListener('resize', applyInitialState);
    });

    // Lógica dos submenus (Accordion)
    document.querySelectorAll('[data-submenu-toggle]').forEach((btn) => {
        btn.addEventListener('click', function(e) {
            if (document.body.classList.contains('sidebar-collapsed')) return;
            e.preventDefault();
            e.stopPropagation();
            const group = this.closest('.menu-group');
            if (group) group.dataset.open = group.dataset.open === 'true' ? 'false' : 'true';
        });
    });
</script>