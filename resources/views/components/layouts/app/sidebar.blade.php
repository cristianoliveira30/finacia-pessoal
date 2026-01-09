{{-- sidebar.blade.php --}}
{{-- CONFIGURAÇÃO DOS MENUS (DADOS) --}}
@php
    $menus = [
        [
            'id' => 'financeiro',
            'label' => 'Financeiro',
            'popover_title' => 'Financeiro',
            'hex_main' => '#fbbf24',
            'hex_hover_bg' => 'rgba(120, 53, 15, 0.4)',
            'hex_light' => '#fcd34d',
            'icon_main' => 'bank',
            'items' => [
                ['label' => 'Dashboard', 'route' => 'financeiro.home', 'icon' => 'list'],
                
                // GRUPO: RELATÓRIOS
                [
                    'label' => 'Relatórios',
                    'icon' => 'file-text', 
                    'id_submenu' => 'fin-relatorios',
                    'submenu' => [
                        ['label' => 'Receitas x Despesas (Séries)', 'route' => 'financeiro.relatorios.rx_d', 'icon' => 'file-earmark-text-fill'],
                        ['label' => 'Execução Orçamentária (Mês/Ano)', 'route' => 'financeiro.relatorios.execucao', 'icon' => 'file-earmark-text-fill'],
                        ['label' => 'Despesas por Função/Subfunção', 'route' => 'financeiro.relatorios.despesas_funcao', 'icon' => 'file-earmark-text-fill'],
                        ['label' => 'Fornecedores (Top / Concentração)', 'route' => 'financeiro.relatorios.fornecedores', 'icon' => 'file-earmark-text-fill'],
                        ['label' => 'Empenhos / Liquidações / Pagamentos', 'route' => 'financeiro.relatorios.elp', 'icon' => 'file-earmark-text-fill'],

                    ]
                ],

                ['label' => 'Lançamentos', 'route' => 'financeiro.lancamentos', 'icon' => 'rocket-takeoff'],
                ['label' => 'Contas', 'route' => 'financeiro.contas', 'icon' => 'coin'],
            ],
        ],
        [
            'id' => 'educacao',
            'label' => 'Educação',
            'popover_title' => 'Educação',
            'hex_main' => '#34d399',
            'hex_hover_bg' => 'rgba(6, 78, 59, 0.4)',
            'hex_light' => '#6ee7b7',
            'icon_main' => 'journal-bookmark',
            'items' => [
                ['label' => 'Dashboard', 'route' => 'educacao.home', 'icon' => 'list'],
                
                // GRUPO: RELATÓRIOS
                [
                    'label' => 'Relatórios',
                    'icon' => 'file-text',
                    'id_submenu' => 'edu-relatorios',
                    'submenu' => [
                        ['label' => 'Frequência Escolar', 'route' => 'educacao.relatorios.frequencia', 'icon' => 'file-earmark-text-fill'],

                        ['label' => 'Evasão / Abandono', 'route' => 'educacao.relatorios.evasao', 'icon' => 'file-earmark-text-fill'],

                        ['label' => 'Aprendizagem (Indicadores)', 'route' => 'educacao.relatorios.aprendizagem', 'icon' => 'file-earmark-text-fill'],

                        ['label' => 'Matrículas (Evolução)', 'route' => 'educacao.relatorios.matriculas', 'icon' => 'file-earmark-text-fill'],

                        ['label' => 'Turmas / Lotação', 'route' => 'educacao.relatorios.turmas', 'icon' => 'file-earmark-text-fill'],

                        ['label' => 'Transferências', 'route' => 'educacao.relatorios.transferencias', 'icon' => 'file-earmark-text-fill'],

                        ['label' => 'Infraestrutura (Escolas)', 'route' => 'educacao.relatorios.infraestrutura', 'icon' => 'file-earmark-text-fill'],

                        ['label' => 'Merenda (Resumo', 'route' => 'educacao.relatorios.merenda', 'icon' => 'file-earmark-text-fill'],

                        ['label' => 'Transporte (Resumo)', 'route' => 'educacao.relatorios.transporte', 'icon' => 'file-earmark-text-fill'],

                        ['label' => 'Inclusão / AEE', 'route' => 'educacao.relatorios.inclusao', 'icon' => 'file-earmark-text-fill'],
                    ]
                ],

                ['label' => 'Lançamentos', 'route' => 'educacao.lancamentos', 'icon' => 'rocket-takeoff'],
                ['label' => 'Contas', 'route' => 'educacao.contas', 'icon' => 'coin'],
            ],
        ],
        [
            'id' => 'saude',
            'label' => 'Saúde',
            'popover_title' => 'Saúde',
            'hex_main' => '#f43f5e',
            'hex_hover_bg' => 'rgba(136, 19, 55, 0.4)',
            'hex_light' => '#fda4af',
            'icon_main' => 'plus-circle',
            'items' => [
                ['label' => 'Dashboard', 'route' => 'saude.home', 'icon' => 'list'],
                
                // GRUPO: RELATÓRIOS
                [
                    'label' => 'Relatórios',
                    'icon' => 'file-text',
                    'id_submenu' => 'saude-relatorios',
                    'submenu' => [
                        ['label' => 'Atendimentos (Volume)', 'route' => 'saude.relatorios.atendimentos', 'icon' => 'file-earmark-text-fill'],

                        ['label' => 'Tempo de Espera (UBS/UPA)', 'route' => 'saude.relatorios.espera', 'icon' => 'file-earmark-text-fill'],

                        ['label' => 'Produção por Unidade', 'route' => 'saude.relatorios.producao_unidade', 'icon' => 'file-earmark-text-fill'],

                        ['label' => 'Produção por Profissional', 'route' => 'saude.relatorios.producao_profissional', 'icon' => 'file-earmark-text-fill'],

                        ['label' => 'Absenteísmo (No-show)', 'route' => 'saude.relatorios.no_show', 'icon' => 'file-earmark-text-fill'],

                        ['label' => 'Encaminhamentos / Regulação', 'route' => 'saude.relatorios.regulacao', 'icon' => 'file-earmark-text-fill'],

                        ['label' => 'Indicadores SUS (Resumo)', 'route' => 'saude.relatorios.indicadores_sus', 'icon' => 'file-earmark-text-fill'],

                    ]
                ],

                ['label' => 'Lançamentos', 'route' => 'saude.lancamentos', 'icon' => 'rocket-takeoff'],
                ['label' => 'Contas', 'route' => 'saude.contas', 'icon' => 'coin'],
            ],
        ],
    ];

    $linkBase = 'sidebar-link flex items-center gap-3 rounded-lg px-3 py-2.5';
@endphp

<style>
    :root {
        --sidebar-bg: #f1f5f9;
        --sidebar-border: #cbd5e1;
        --sidebar-text: #0f172a;
        --sidebar-item-bg: rgba(255, 255, 255, .65);
        --sidebar-hover-bg: #ffffff;
        --sidebar-submenu-bg: rgba(255, 255, 255, .55);
        --sidebar-submenu-border: #e2e8f0;
        --sidebar-tooltip-bg: #0f172a;
    }

    html.dark {
        --sidebar-bg: #020617;
        --sidebar-border: #1e293b;
        --sidebar-text: #e5e7eb;
        --sidebar-hover-bg: #111827;
        --sidebar-submenu-bg: #374151;
        --sidebar-submenu-border: #4b5563;
        --sidebar-tooltip-bg: #4b5563;
    }

    @media (min-width: 1024px) {
        body.sidebar-collapsed #top-bar-sidebar {
            width: 4.5rem;
        }
        body.sidebar-collapsed #top-bar-sidebar .sidebar-label {
            display: none;
        }
        body.sidebar-collapsed #top-bar-sidebar .sidebar-link {
            justify-content: center;
            padding-left: .75rem;
            padding-right: .75rem;
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
    html:not(.dark) #top-bar-sidebar {
        box-shadow: 0 12px 30px rgba(2, 6, 23, .10);
    }
    html:not(.dark) #top-bar-sidebar .sidebar-link {
        background: var(--sidebar-item-bg);
        border: 1px solid rgba(203, 213, 225, .65);
    }
    html:not(.dark) #top-bar-sidebar .sidebar-link:hover {
        background: var(--sidebar-hover-bg) !important;
        border-color: rgba(148, 163, 184, .75);
    }
    html:not(.dark) #top-bar-sidebar .submenu a:hover {
        background: #ffffff !important;
    }
    .menu-group { position: relative; }
    .menu-highlight {
        position: absolute;
        inset: .15rem .25rem;
        border-radius: .75rem;
        opacity: 0;
        pointer-events: none;
        transition: opacity 150ms ease;
        background-color: var(--menu-hover-bg);
    }
    body:not(.sidebar-collapsed) .menu-group:hover .menu-highlight { opacity: 1; }
    body.sidebar-collapsed .menu-highlight { display: none; }
    .chevron-icon {
        transition: transform 150ms ease;
        color: var(--menu-light);
    }
    body:not(.sidebar-collapsed) .menu-group[data-open="true"] .chevron-icon { transform: rotate(90deg); }
    .submenu { display: none !important; }
    body:not(.sidebar-collapsed) .menu-group[data-open="true"]>.submenu {
        display: block !important;
        position: static;
        padding-left: 2.25rem;
        padding-right: .75rem;
        margin-top: .25rem;
        background: transparent;
        box-shadow: none;
    }
    .submenu a:hover { color: var(--menu-light); }
    body.sidebar-collapsed .sidebar-link[data-tooltip] { position: relative; }
    body.sidebar-collapsed .sidebar-link[data-tooltip]::after {
        content: attr(data-tooltip);
        position: absolute;
        left: calc(100% + .75rem);
        top: 50%;
        transform: translateY(-50%);
        white-space: nowrap;
        background-color: var(--sidebar-tooltip-bg);
        color: #f9fafb;
        font-size: .75rem;
        padding: .25rem .5rem;
        border-radius: .5rem;
        opacity: 0;
        pointer-events: none;
        transition: opacity 150ms ease;
        z-index: 9999;
    }
    body.sidebar-collapsed .sidebar-link[data-tooltip]:hover::after { opacity: 1; }
    .menu-bar { background-color: var(--menu-main); }
    .popover-accent { background-color: var(--menu-main); }
    .popover-title { color: var(--menu-main); }
</style>

<aside id="top-bar-sidebar"
    class="fixed top-16 bottom-0 left-0 z-40 w-64 -translate-x-full lg:translate-x-0
         border-e transition-transform duration-300 bg-white dark:bg-gray-800"
    aria-label="Sidebar">

    <div class="h-full flex flex-col pt-5 overflow-y-auto [&::-webkit-scrollbar]:hidden [-ms-overflow-style:'none'] [scrollbar-width:'none']">
        <nav class="flex-1 px-2 pb-4 text-sm font-medium">

            {{-- DASHBOARD --}}
            <li>
                <a href="{{ route('home') }}" class="{{ $linkBase }}" data-tooltip="Dashboard" target="_blank" rel="noopener noreferrer">
                    <x-bi-house class="w-5 h-5" />
                    <span class="sidebar-label whitespace-nowrap font-semibold">Dashboard</span>
                </a>
            </li>

            {{-- MODO TV --}}
            <li>
                <a href="/tv" class="{{ $linkBase }}" data-tooltip="Modo TV" target="_blank" rel="noopener noreferrer">
                    <x-bi-tv class="w-5 h-5" />
                    <span class="sidebar-label whitespace-nowrap font-semibold">Modo TV</span>
                </a>
            </li>

            {{-- MENUS PRINCIPAIS --}}
            @foreach ($menus as $menu)
                <li class="menu-group" data-open="false"
                    style="--menu-main: {{ $menu['hex_main'] }}; --menu-hover-bg: {{ $menu['hex_hover_bg'] }}; --menu-light: {{ $menu['hex_light'] }};">
                    <div class="menu-highlight -z-10"></div>

                    {{-- Botão Principal --}}
                    {{-- GATILHO PRINCIPAL (HOVER) --}}
                    <button type="button"
                        class="sidebar-link flex w-full items-center justify-between rounded-lg px-3 py-2.5"
                        data-submenu-toggle="submenu-{{ $menu['id'] }}"
                        data-popover-target="popover-{{ $menu['id'] }}" data-popover-placement="right-start"
                        data-popover-trigger="hover"
                        data-popover-offset="8">
                        <div class="flex items-center gap-3">
                            <x-dynamic-component :component="'bi-' . $menu['icon_main']" class="w-5 h-5" />
                            <span class="menu-bar inline-flex h-6 w-1 rounded-full"></span>
                            <span class="sidebar-label whitespace-nowrap">{{ $menu['label'] }}</span>
                        </div>
                        <x-bi-chevron-right class="chevron-icon w-3 h-3" />
                    </button>

                    {{-- Submenu (Acordeon - Apenas para sidebar expandida) --}}
                    <div id="submenu-{{ $menu['id'] }}" class="submenu mt-1 pl-9 pr-3 p-1 text-xs">
                        <div class="flex gap-3">
                            <span class="w-px bg-slate-300/80 dark:bg-slate-700 ml-2"></span>
                            <div class="space-y-1 w-full">
                                @foreach ($menu['items'] as $item)
                                    @if(isset($item['submenu']))
                                        {{-- Exibe itens agrupados se sidebar aberta --}}
                                        <div class="pt-1">
                                            <div class="flex items-center gap-2 px-1 py-1 text-gray-500 font-bold uppercase" style="font-size: 0.65rem;">
                                                <x-dynamic-component :component="'bi-' . $item['icon']" class="w-3 h-3" />
                                                {{ $item['label'] }}
                                            </div>
                                            @foreach($item['submenu'] as $sub)
                                                 <a href="{{ route($sub['route']) }}"
                                                    class="flex items-center gap-2 rounded-md pl-4 pr-1 py-1 hover:bg-slate-200/60 dark:hover:bg-slate-800 transition-colors"
                                                    target="_blank" rel="noopener noreferrer">
                                                    <span class="menu-bar inline-flex h-3 w-1 rounded-full opacity-50"></span>
                                                    <span>{{ $sub['label'] }}</span>
                                                </a>
                                            @endforeach
                                        </div>
                                    @else
                                        <a href="{{ route($item['route']) }}"
                                            class="flex items-center gap-2 rounded-md px-1 py-1 hover:bg-slate-200/60 dark:hover:bg-slate-800 transition-colors"
                                            target="_blank" rel="noopener noreferrer">
                                            <span class="menu-bar inline-flex h-4 w-1 rounded-full"></span>
                                            <span>{{ $item['label'] }}</span>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach

        </ul>
    </nav>
</div>

{{-- POPOVERS (PRIMEIRO NÍVEL - PASTA PRINCIPAL) --}}
@foreach ($menus as $menu)
    <div data-popover id="popover-{{ $menu['id'] }}" role="tooltip"
        {{-- ID Auxiliar para vinculo Pai-Filho no JS --}}
        data-parent-id="parent-group-{{ $menu['id'] }}"
        class="popover-flowbite absolute z-50 hidden lg:inline-block invisible w-48 text-sm text-gray-900 dark:text-gray-200 transition-opacity duration-300 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow-xl opacity-0"
        style="--menu-main: {{ $menu['hex_main'] }};">
        <div class="p-3">
            <div class="flex items-center gap-2 mb-2 pb-2 border-b border-gray-200 dark:border-gray-700">
                <span class="popover-accent h-4 w-1 rounded-full"></span>
                <span class="popover-title font-semibold">{{ $menu['popover_title'] }}</span>
            </div>

            <ul class="space-y-1">
                @foreach ($menu['items'] as $item)
                    <li>
                        @if(isset($item['submenu']))
                            {{-- GATILHO: Item que abre o popover filho --}}
                            {{-- ACIONADO POR HOVER (Mantido para fluidez) --}}
                            <div 
                                data-popover-target="popover-child-{{ $item['id_submenu'] }}" 
                                data-popover-placement="right-start"
                                data-popover-trigger="hover" 
                                class="flex w-full items-center justify-between px-2 py-1.5 rounded hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-white transition-colors cursor-pointer text-left">
                                <div class="flex items-center gap-2">
                                    <x-dynamic-component :component="'bi-' . $item['icon']" class="w-4 h-4 shrink-0" />
                                    <span>{{ $item['label'] }}</span>
                                </div>
                            </div>
                        @else
                            {{-- Item Normal (Link direto) --}}
                            <a href="{{ route($item['route']) }}"
                                class="flex items-center gap-2 px-2 py-1.5 rounded hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-white transition-colors"
                                target="_blank" rel="noopener noreferrer">
                                <x-dynamic-component :component="'bi-' . $item['icon']" class="w-4 h-4 shrink-0" />
                                <span>{{ $item['label'] }}</span>
                            </a>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
        <div data-popper-arrow></div>
    </div>
@endforeach

{{-- POPOVERS (SEGUNDO NÍVEL - CONTEÚDO DA "PASTA") --}}
@foreach ($menus as $menu)
    @foreach ($menu['items'] as $item)
        @if(isset($item['submenu']))
            <div data-popover id="popover-child-{{ $item['id_submenu'] }}" role="tooltip"
                 {{-- Atributo personalizado para saber quem é o pai deste filho --}}
                 data-parent-ref="popover-{{ $menu['id'] }}"
                 class="popover-flowbite absolute z-50 hidden invisible w-56 text-sm text-gray-900 dark:text-gray-200 transition-opacity duration-300 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow-xl opacity-0"
                 style="--menu-main: {{ $menu['hex_main'] }};">
                
                <div class="p-3">
                     <div class="flex items-center gap-2 mb-2 pb-2 border-b border-gray-200 dark:border-gray-700">
                        <span class="popover-accent h-3 w-1 rounded-full opacity-70"></span>
                        <span class="font-semibold text-xs uppercase text-gray-500 dark:text-gray-400">{{ $item['label'] }}</span>
                    </div>

                    <ul class="space-y-1">
                        @foreach ($item['submenu'] as $subItem)
                            <li>
                                <a href="{{ route($subItem['route']) }}"
                                   class="flex items-center gap-2 px-2 py-1.5 rounded hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-white transition-colors"
                                   target="_blank" rel="noopener noreferrer">
                                    <x-dynamic-component :component="'bi-' . $subItem['icon']" class="w-4 h-4 shrink-0 text-gray-400" />
                                    <span>{{ $subItem['label'] }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div data-popper-arrow></div>
            </div>
        @endif
    @endforeach
@endforeach

</aside>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // --- 1. CONFIGURAÇÃO BÁSICA DA SIDEBAR ---
        const sidebar = document.getElementById('top-bar-sidebar');
        const toggleBtn = document.getElementById('header-sidebar-toggle');
        const KEY = 'sidebarCollapsed';
        const mq = window.matchMedia('(min-width: 1024px)');
        const isDesktop = () => mq.matches;
        
        const setAria = (expanded) => toggleBtn && toggleBtn.setAttribute('aria-expanded', String(expanded));

        const sync = () => {
            if(!sidebar) return;
            if (isDesktop()) {
                const collapsed = localStorage.getItem(KEY) === 'true';
                sidebar.classList.remove('-translate-x-full');
                document.body.classList.toggle('sidebar-collapsed', collapsed);
                setAria(!collapsed);
            } else {
                sidebar.classList.add('-translate-x-full');
                document.body.classList.remove('sidebar-collapsed');
                setAria(false);
            }
        };

        if(toggleBtn && sidebar) {
            toggleBtn.addEventListener('click', (e) => {
                e.preventDefault(); e.stopPropagation();
                if (isDesktop()) {
                    const collapsed = document.body.classList.toggle('sidebar-collapsed');
                    localStorage.setItem(KEY, collapsed);
                    setAria(!collapsed);
                } else {
                    sidebar.classList.toggle('-translate-x-full');
                    setAria(!sidebar.classList.contains('-translate-x-full'));
                }
            });

            document.addEventListener('click', (e) => {
                if (isDesktop()) return;
                if (sidebar.contains(e.target) || toggleBtn.contains(e.target)) return;
                if (!sidebar.classList.contains('-translate-x-full')) {
                    sidebar.classList.add('-translate-x-full');
                    setAria(false);
                }
            });

            sidebar.querySelectorAll('[data-submenu-toggle]').forEach((btn) => {
                btn.addEventListener('click', function(e) {
                    if (document.body.classList.contains('sidebar-collapsed')) return;
                    e.preventDefault(); e.stopPropagation();
                    const group = this.closest('.menu-group');
                    if (group) group.dataset.open = group.dataset.open === 'true' ? 'false' : 'true';
                });
            });
        }
        
        if (mq.addEventListener) mq.addEventListener('change', sync);
        window.addEventListener('resize', sync);
        sync();

        // --- 2. GERENCIAMENTO DE POPOVERS (HOVER COM PERSISTÊNCIA) ---
        const timers = {};

        function show(el, trigger, placement = 'right-start') {
            if(!el) return;
            el.classList.remove('hidden', 'invisible', 'opacity-0');
            el.classList.add('block', 'opacity-100');
            
            const tRect = trigger.getBoundingClientRect();
            const pRect = el.getBoundingClientRect();
            
            let top = tRect.top;
            let left = tRect.right + 8; 

            if (top + pRect.height > window.innerHeight) {
                top = window.innerHeight - pRect.height - 10;
            }
            
            el.style.position = 'fixed';
            el.style.top = `${top}px`;
            el.style.left = `${left}px`;
            el.style.zIndex = '9999';
        }

        function hide(el) {
            if(!el) return;
            el.classList.add('hidden', 'invisible', 'opacity-0');
            el.classList.remove('block', 'opacity-100');
        }

        function clearClose(id) {
            if(timers[id]) {
                clearTimeout(timers[id]);
                timers[id] = null;
            }
        }

        function scheduleClose(el, id, delay = 250) {
            clearClose(id);
            timers[id] = setTimeout(() => {
                hide(el);
            }, delay);
        }

        const triggers = document.querySelectorAll('[data-popover-target]');

        triggers.forEach(trigger => {
            const targetId = trigger.getAttribute('data-popover-target');
            const popoverEl = document.getElementById(targetId);
            
            if(!popoverEl) return;

            // MOUSE ENTER NO GATILHO
            trigger.addEventListener('mouseenter', () => {
                clearClose(targetId);

                // Se for um gatilho FILHO, mantem o PAI aberto
                const parentPopover = trigger.closest('.popover-flowbite');
                if(parentPopover) {
                    clearClose(parentPopover.id);
                } else {
                    // Se for PAI, fecha outros pais
                    document.querySelectorAll('.popover-flowbite[id^="popover-"]').forEach(p => {
                        if(p.id !== targetId && !p.hasAttribute('data-parent-ref')) {
                            hide(p);
                        }
                    });
                }
                show(popoverEl, trigger);
            });

            // MOUSE LEAVE NO GATILHO
            trigger.addEventListener('mouseleave', () => {
                scheduleClose(popoverEl, targetId);
            });

            // MOUSE ENTER NO PRÓPRIO POPOVER
            popoverEl.addEventListener('mouseenter', () => {
                clearClose(targetId);
                const parentIdRef = popoverEl.getAttribute('data-parent-ref');
                if(parentIdRef) clearClose(parentIdRef);
            });

            // MOUSE LEAVE NO PRÓPRIO POPOVER
            popoverEl.addEventListener('mouseleave', () => {
                scheduleClose(popoverEl, targetId);
                const parentIdRef = popoverEl.getAttribute('data-parent-ref');
                if(parentIdRef) {
                    const parentEl = document.getElementById(parentIdRef);
                    scheduleClose(parentEl, parentIdRef);
                }
            });
        });
    });
</script>