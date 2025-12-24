{{-- CONFIGURAÇÃO DOS MENUS (DADOS) --}}
@php
    $menus = [
        // 1) Relatórios (visão analítica)
        [
            'id' => 'fin-relatorios',
            'label' => 'Relatórios',
            'popover_title' => 'Relatórios Financeiros',
            'hex_main' => '#fbbf24', // amber-400
            'hex_hover_bg' => 'rgba(120, 53, 15, 0.4)', // amber-900/40
            'hex_light' => '#fcd34d', // amber-300
            'icon_main' => 'clipboard-data',
            'items' => [
                ['label' => 'Painel Financeiro (Geral)', 'route' => 'financeiro.home', 'icon' => 'speedometer2'],
                ['label' => 'Receitas x Despesas (Séries)', 'route' => 'financeiro.relatorios.rx_d', 'icon' => 'graph-up'],
                ['label' => 'Execução Orçamentária (Mês/Ano)', 'route' => 'financeiro.relatorios.execucao', 'icon' => 'bar-chart'],
                ['label' => 'Despesas por Função/Subfunção', 'route' => 'financeiro.relatorios.despesas_funcao', 'icon' => 'pie-chart'],
                ['label' => 'Fornecedores (Top / Concentração)', 'route' => 'financeiro.relatorios.fornecedores', 'icon' => 'people'],
                ['label' => 'Empenhos / Liquidações / Pagamentos', 'route' => 'financeiro.relatorios.elp', 'icon' => 'receipt'],
            ]
        ],

        // 2) Orçamento (PPA/LDO/LOA + execução)
        [
            'id' => 'fin-orcamento',
            'label' => 'Orçamento',
            'popover_title' => 'Orçamento (PPA/LDO/LOA)',
            'hex_main' => '#34d399', // emerald-400
            'hex_hover_bg' => 'rgba(6, 78, 59, 0.4)', // emerald-900/40
            'hex_light' => '#6ee7b7', // emerald-300
            'icon_main' => 'journal-bookmark',
            'items' => [
                ['label' => 'LOA (Dotação Inicial)', 'route' => 'financeiro.orcamento.loa', 'icon' => 'file-earmark-text'],
                ['label' => 'PPA / Programas e Ações', 'route' => 'financeiro.orcamento.ppa', 'icon' => 'file-earmark-text'],
                ['label' => 'LDO / Metas e Prioridades', 'route' => 'financeiro.orcamento.ldo', 'icon' => 'file-earmark-text'],
                ['label' => 'Alterações (Créditos Adicionais)', 'route' => 'financeiro.orcamento.creditos', 'icon' => 'arrow-left-right'],
                ['label' => 'Restos a Pagar (Processados/Não)', 'route' => 'financeiro.orcamento.restos_pagar', 'icon' => 'exclamation-triangle'],
            ]
        ],

        // 3) Receitas (arrecadação e projeções)
        [
            'id' => 'fin-receitas',
            'label' => 'Receitas',
            'popover_title' => 'Receitas',
            'hex_main' => '#38bdf8', // sky-400
            'hex_hover_bg' => 'rgba(12, 74, 110, 0.4)', // sky-900/40
            'hex_light' => '#7dd3fc', // sky-300
            'icon_main' => 'cash',
            'items' => [
                ['label' => 'Arrecadação (Real x Previsto)', 'route' => 'financeiro.receitas.arrecadacao', 'icon' => 'graph-up'],
                ['label' => 'Receita por Fonte (Própria/Transf.)', 'route' => 'financeiro.receitas.fontes', 'icon' => 'pie-chart'],
                ['label' => 'Transferências (FPM/ICMS/SUS/FUNDEB)', 'route' => 'financeiro.receitas.transferencias', 'icon' => 'bank'],
                ['label' => 'Dívida Ativa / Recuperação', 'route' => 'financeiro.receitas.divida_ativa', 'icon' => 'exclamation-triangle'],
                ['label' => 'Projeções (Forecast)', 'route' => 'financeiro.receitas.projecoes', 'icon' => 'bar-chart'],
            ]
        ],

        // 4) Despesas (controle fino)
        [
            'id' => 'fin-despesas',
            'label' => 'Despesas',
            'popover_title' => 'Despesas',
            'hex_main' => '#f43f5e', // rose-500
            'hex_hover_bg' => 'rgba(136, 19, 55, 0.4)', // rose-900/40
            'hex_light' => '#fda4af', // rose-300
            'icon_main' => 'receipt',
            'items' => [
                ['label' => 'Empenhos', 'route' => 'financeiro.despesas.empenhos', 'icon' => 'file-earmark-text'],
                ['label' => 'Liquidações', 'route' => 'financeiro.despesas.liquidacoes', 'icon' => 'file-earmark-text'],
                ['label' => 'Pagamentos', 'route' => 'financeiro.despesas.pagamentos', 'icon' => 'coin'],
                ['label' => 'Despesas por Elemento', 'route' => 'financeiro.despesas.elemento', 'icon' => 'bar-chart'],
                ['label' => 'Centros de Custo / Unidades', 'route' => 'financeiro.despesas.centros_custo', 'icon' => 'building'],
            ]
        ],

        // 5) Investimentos (CAPEX, emendas, convênios)
        [
            'id' => 'fin-investimentos',
            'label' => 'Investimentos',
            'popover_title' => 'Investimentos / CAPEX',
            'hex_main' => '#a78bfa', // violet-400
            'hex_hover_bg' => 'rgba(88, 28, 135, 0.35)', // violet-900/35
            'hex_light' => '#c4b5fd', // violet-300
            'icon_main' => 'graph-up',
            'items' => [
                ['label' => 'CAPEX (Obras/Equipamentos)', 'route' => 'financeiro.investimentos.capex', 'icon' => 'bar-chart'],
                ['label' => 'Emendas / Convênios', 'route' => 'financeiro.investimentos.convenios', 'icon' => 'file-earmark-text'],
                ['label' => 'Cronograma Físico-Financeiro', 'route' => 'financeiro.investimentos.cronograma', 'icon' => 'calendar3'],
                ['label' => 'Contrapartidas', 'route' => 'financeiro.investimentos.contrapartidas', 'icon' => 'arrow-left-right'],
            ]
        ],

        // 6) Tesouraria (caixa, bancos, conciliação)
        [
            'id' => 'fin-tesouraria',
            'label' => 'Tesouraria',
            'popover_title' => 'Tesouraria / Caixa',
            'hex_main' => '#60a5fa', // blue-400
            'hex_hover_bg' => 'rgba(30, 58, 138, 0.35)', // blue-900/35
            'hex_light' => '#93c5fd', // blue-300
            'icon_main' => 'bank',
            'items' => [
                ['label' => 'Saldos Bancários', 'route' => 'financeiro.tesouraria.saldos', 'icon' => 'bank'],
                ['label' => 'Fluxo de Caixa (D+30/D+90)', 'route' => 'financeiro.tesouraria.fluxo', 'icon' => 'graph-up'],
                ['label' => 'Conciliação Bancária', 'route' => 'financeiro.tesouraria.conciliacao', 'icon' => 'arrow-left-right'],
                ['label' => 'Aplicações / Rendimentos', 'route' => 'financeiro.tesouraria.aplicacoes', 'icon' => 'coin'],
            ]
        ],

        // 7) Compliance / LRF (alertas e limites)
        [
            'id' => 'fin-compliance',
            'label' => 'LRF & Compliance',
            'popover_title' => 'LRF / Alertas',
            'hex_main' => '#94a3b8', // slate-400
            'hex_hover_bg' => 'rgba(15, 23, 42, 0.35)', // slate-950/35
            'hex_light' => '#cbd5e1', // slate-300
            'icon_main' => 'shield-check',
            'items' => [
                ['label' => 'Gasto com Pessoal (Limites)', 'route' => 'financeiro.lrf.pessoal', 'icon' => 'exclamation-triangle'],
                ['label' => 'Saúde (Mínimo Constitucional)', 'route' => 'financeiro.lrf.saude', 'icon' => 'exclamation-triangle'],
                ['label' => 'Educação/FUNDEB (Mínimos)', 'route' => 'financeiro.lrf.educacao', 'icon' => 'exclamation-triangle'],
                ['label' => 'Endividamento / Precatórios', 'route' => 'financeiro.lrf.divida', 'icon' => 'file-earmark-text'],
            ]
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
        --sidebar-bg: #020617;          /* bg-slate-950 */
        --sidebar-border: #1e293b;      /* border-slate-800 */
        --sidebar-text: #e5e7eb;        /* text-slate-200 */
        --sidebar-hover-bg: #111827;    /* bg-slate-900 */
        --sidebar-submenu-bg: #374151;  /* bg-slate-700 */
        --sidebar-submenu-border: #4b5563;
        --sidebar-tooltip-bg: #4b5563;  /* bg-slate-600 */
    }

    /* =================== LAYOUT / ESTILOS =================== */
    @media (min-width: 1024px) {
        body.sidebar-collapsed #top-bar-sidebar { width: 4.5rem; }
        body.sidebar-collapsed #top-bar-sidebar .sidebar-label { display: none; }
        body.sidebar-collapsed #top-bar-sidebar .sidebar-link { justify-content: center; padding-left: 0.75rem; padding-right: 0.75rem; }

        body:not(.sidebar-collapsed) .popover-flowbite {
            display: none !important;
            visibility: hidden !important;
            opacity: 0 !important;
            pointer-events: none !important;
        }
    }

    #top-bar-sidebar { overflow: visible; background-color: var(--sidebar-bg); color: var(--sidebar-text); border-color: var(--sidebar-border); }
    #top-bar-sidebar nav { overflow-y: auto; overflow-x: hidden; }
    #top-bar-sidebar .sidebar-link { color: inherit; }
    #top-bar-sidebar .sidebar-link:hover { background-color: var(--sidebar-hover-bg); }

    .menu-group { position: relative; }
    .menu-group .menu-highlight { position: absolute; inset: 0.15rem 0.25rem; border-radius: 0.75rem; opacity: 0; pointer-events: none; transition: opacity 150ms ease; }
    body:not(.sidebar-collapsed) .menu-group:hover .menu-highlight { opacity: 1; }
    body.sidebar-collapsed .menu-group .menu-highlight { display: none; }
    .menu-group .chevron-icon { transition: transform 150ms ease; }
    body:not(.sidebar-collapsed) .menu-group[data-open="true"] .chevron-icon { transform: rotate(90deg); }

    .submenu { display: none !important; }
    body:not(.sidebar-collapsed) .menu-group[data-open="true"]>.submenu { display: block !important; position: static; padding-left: 2.25rem; padding-right: 0.75rem; margin-top: 0.25rem; background: transparent; box-shadow: none; }
    body.sidebar-collapsed .menu-group>.submenu { display: none !important; }

    body.sidebar-collapsed .sidebar-link[data-tooltip] { position: relative; }
    body.sidebar-collapsed .sidebar-link[data-tooltip]::after {
        content: attr(data-tooltip);
        position: absolute; left: calc(100% + 0.75rem); top: 50%; transform: translateY(-50%);
        white-space: nowrap; background-color: var(--sidebar-tooltip-bg); color: #f9fafb;
        font-size: 0.75rem; padding: 0.25rem 0.5rem; border-radius: 0.5rem;
        opacity: 0; pointer-events: none; transition: opacity 150ms ease; z-index: 9999;
    }
    body.sidebar-collapsed .sidebar-link[data-tooltip]:hover::after { opacity: 1; }
</style>

<aside id="top-bar-sidebar"
    class="absolute inset-y-0 left-0 z-40 w-64 -translate-x-full lg:translate-x-0 border-e transition-transform duration-300"
    aria-label="Sidebar">

    <div class="h-full flex flex-col">
        <div class="h-full flex flex-col">
            <nav class="flex-1 px-2 pb-4 text-sm font-medium">
                <ul class="space-y-1">

                    {{-- DASHBOARD --}}
                    <li>
                        <a href="{{ route('home') }}"
                            class="sidebar-link flex items-center gap-3 rounded-lg px-3 py-2.5 text-slate-100 hover:bg-slate-800"
                            data-tooltip="Dashboard" target="_blank" rel="noopener noreferrer">
                            {{-- ÍCONE DE TV (DASHBOARD) --}}
                            <x-bi-house class="w-5 h-5" />
                            <span class="sidebar-label whitespace-nowrap font-semibold">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="/tv"
                            class="sidebar-link flex items-center gap-3 rounded-lg px-3 py-2.5 text-slate-100 hover:bg-slate-800"
                            data-tooltip="Modo Tv" target="_blank" rel="noopener noreferrer">
                            <x-bi-tv class="w-5 h-5" />
                            <span class="sidebar-label whitespace-nowrap font-semibold">Modo TV</span>
                        </a>
                    </li>

                    {{-- LOOP PARA GERAR TODOS OS MENUS COM DROPDOWN --}}
                    @foreach($menus as $menu)
                        <li class="menu-group" data-open="false">
                            {{-- CORREÇÃO: Usando style inline para o background do hover --}}
                            <div class="menu-highlight -z-10" style="background-color: {{ $menu['hex_hover_bg'] }}"></div>

                            <button type="button"
                                    class="sidebar-link flex w-full items-center justify-between rounded-lg px-3 py-2.5 {{ $menu['id'] === 'calendario' ? 'text-slate-200' : '' }}"
                                    data-submenu-toggle="submenu-{{ $menu['id'] }}"
                                    data-popover-target="popover-{{ $menu['id'] }}"
                                    data-popover-placement="right">
                                <div class="flex items-center gap-3">
                                    {{-- ÍCONE PRINCIPAL DINÂMICO --}}
                                    <x-dynamic-component
                                        :component="'bi-'.$menu['icon_main']"
                                        class="w-5 h-5"
                                    />

                                    {{-- CORREÇÃO: Barra lateral colorida usando style inline --}}
                                    <span class="inline-flex h-6 w-1 rounded-full" style="background-color: {{ $menu['hex_main'] }}"></span>
                                    <span class="sidebar-label whitespace-nowrap">{{ $menu['label'] }}</span>
                                </div>

                                {{-- CHEVRON (SETA) - CORREÇÃO DE COR --}}
                                <x-bi-chevron-right class="chevron-icon w-3 h-3" style="color: {{ $menu['hex_light'] }}" />
                            </button>

                            <div id="submenu-{{ $menu['id'] }}" class="submenu mt-1 pl-9 pr-3 p-1 text-xs {{ $menu['id'] === 'calendario' ? 'text-slate-200' : '' }}">
                                <div class="flex gap-3">
                                    <span class="w-px bg-slate-700 ml-2"></span>
                                    <div class="space-y-1">
                                        @foreach($menu['items'] as $item)
                                            @php
                                                $r = $item['route'] ?? null;
                                                $href = ($r && \Illuminate\Support\Facades\Route::has($r)) ? route($r) : '#';
                                            @endphp
                                            <a href="{{ $href }}"
                                               class="flex items-center gap-2 rounded-md px-1 py-1 hover:bg-slate-800 transition-colors"
                                               {{-- Pequeno script inline para hover no texto do submenu, já que não temos classes --}}
                                               onmouseover="this.style.color='{{ $menu['hex_light'] }}'"
                                               onmouseout="this.style.color=''" target="_blank" rel="noopener noreferrer">
                                                {{-- CORREÇÃO: Bolinha do submenu --}}
                                                <span class="inline-flex h-4 w-1 rounded-full" style="background-color: {{ $menu['hex_main'] }}"></span>
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
    @foreach($menus as $menu)
        <div data-popover id="popover-{{ $menu['id'] }}" role="tooltip" class="popover-flowbite absolute z-50 invisible inline-block w-48 text-sm text-gray-900 dark:text-gray-200 transition-opacity duration-300 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow-xl opacity-0">
            <div class="p-3">
                <div class="flex items-center gap-2 mb-2 pb-2 border-b border-gray-200 dark:border-gray-700">
                    {{-- CORREÇÃO: Barra colorida do popover --}}
                    <span class="h-4 w-1 rounded-full" style="background-color: {{ $menu['hex_main'] }}"></span>
                    {{-- CORREÇÃO: Título colorido do popover --}}
                    <span class="font-semibold" style="color: {{ $menu['hex_main'] }}">{{ $menu['popover_title'] }}</span>
                </div>
                <ul class="space-y-1">
                    @foreach($menu['items'] as $item)
                        <li>
                            <a href="{{ route($item['route']) }}" class="flex items-center gap-2 px-2 py-1.5 rounded hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-white transition-colors" target="_blank" rel="noopener noreferrer">
                                {{-- ÍCONE INTERNO DO POPOVER --}}
                                <x-dynamic-component
                                    :component="'bi-'.$item['icon']"
                                    class="w-4 h-4"
                                />
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
    document.addEventListener('DOMContentLoaded', function () {
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
            e.preventDefault(); e.stopPropagation();
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
        btn.addEventListener('click', function (e) {
            if(document.body.classList.contains('sidebar-collapsed')) return;
            e.preventDefault(); e.stopPropagation();
            const group = this.closest('.menu-group');
            if(group) group.dataset.open = group.dataset.open === 'true' ? 'false' : 'true';
        });
    });
</script>
