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
                ['label' => 'Execuções Orçamentárias', 'route' => 'financeiro.relatorios.execucao', 'icon' => 'file-earmark-text-fill'],
                ['label' => 'CAPEX (Obras/Equipamentos)', 'route' => 'financeiro.investimentos.capex', 'icon' => 'file-earmark-text-fill'],
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
                ['label' => 'Merendas Servidas', 'route' => 'educacao.relatorios.merenda', 'icon' => 'file-earmark-text-fill'],
                ['label' => 'Frequência Escolar', 'route' => 'educacao.relatorios.frequencia', 'icon' => 'file-earmark-text-fill'],
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
                ['label' => 'Cobertura Vacinal', 'route' => 'saude.imunizacao.cobertura', 'icon' => 'file-earmark-text-fill'],
                ['label' => 'Fila de Exames', 'route' => 'saude.regulacao.fila-exames', 'icon' => 'file-earmark-text-fill'],
                ['label' => 'Lançamentos', 'route' => 'saude.lancamentos', 'icon' => 'rocket-takeoff'],
                ['label' => 'Contas', 'route' => 'saude.contas', 'icon' => 'coin'],
            ],
        ],
        // --- GRUPO MENSAGENS (Apenas "Enviar") ---
        [
            'id' => 'mensagens',
            'label' => 'Mensagens',      
            'popover_title' => 'Mensagens', 
            'hex_main' => '#3b82f6',     
            'hex_hover_bg' => 'rgba(59, 130, 246, 0.4)',
            'hex_light' => '#60a5fa',
            'icon_main' => 'send',       
            'items' => [
                // OBS: Troquei 'route' para 'home' temporariamente para corrigir o erro 500.
                // Quando criar a rota no web.php, mude de volta para 'mensagens.create'
                ['label' => 'Enviar Mensagem',  'route' => 'home', 'icon' => 'plus-circle' ],
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

    .menu-group {
        position: relative;
    }

    .menu-highlight {
        position: absolute;
        inset: .15rem .25rem;
        border-radius: .75rem;
        opacity: 0;
        pointer-events: none;
        transition: opacity 150ms ease;
        background-color: var(--menu-hover-bg);
    }

    body:not(.sidebar-collapsed) .menu-group:hover .menu-highlight {
        opacity: 1;
    }

    body.sidebar-collapsed .menu-highlight {
        display: none;
    }

    .chevron-icon {
        transition: transform 150ms ease;
        color: var(--menu-light);
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
        padding-right: .75rem;
        margin-top: .25rem;
        background: transparent;
        box-shadow: none;
    }

    /* tira o hover inline: usa variável */
    .submenu a:hover {
        color: var(--menu-light);
    }

    body.sidebar-collapsed .sidebar-link[data-tooltip] {
        position: relative;
    }

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

    body.sidebar-collapsed .sidebar-link[data-tooltip]:hover::after {
        opacity: 1;
    }

    .menu-bar {
        background-color: var(--menu-main);
    }

    .popover-accent {
        background-color: var(--menu-main);
    }

    .popover-title {
        color: var(--menu-main);
    }
</style>

<aside id="top-bar-sidebar"
    class="fixed top-16 bottom-0 left-0 z-40 w-64 -translate-x-full lg:translate-x-0 border-e transition-transform duration-300 bg-white dark:bg-gray-800"
    aria-label="Sidebar">

    <div
        class="h-full flex flex-col pt-5 overflow-y-auto [&::-webkit-scrollbar]:hidden [-ms-overflow-style:'none'] [scrollbar-width:'none']">
        <nav class="flex-1 px-2 pb-4 text-sm font-medium">

            {{-- DASHBOARD --}}
            <li>
                <a href="{{ route('home') }}" class="{{ $linkBase }}" data-tooltip="Dashboard" target="_blank"
                    rel="noopener noreferrer">
                    <x-bi-house class="w-5 h-5" />
                    <span class="sidebar-label whitespace-nowrap font-semibold">Dashboard</span>
                </a>
            </li>

            {{-- MODO TV --}}
            <li>
                <a href="/tv" class="{{ $linkBase }}" data-tooltip="Modo TV" target="_blank"
                    rel="noopener noreferrer">
                    <x-bi-tv class="w-5 h-5" />
                    <span class="sidebar-label whitespace-nowrap font-semibold">Modo TV</span>
                </a>
            </li>

            {{-- 
                LOOP AUTOMÁTICO 
                (Gera Financeiro, Educação, Saúde e MENSAGENS com a mesma lógica)
            --}}
            @foreach ($menus as $menu)
                <li class="menu-group" data-open="false"
                    style="--menu-main: {{ $menu['hex_main'] }}; --menu-hover-bg: {{ $menu['hex_hover_bg'] }}; --menu-light: {{ $menu['hex_light'] }};">
                    <div class="menu-highlight -z-10"></div>

                    {{-- Botão Principal --}}
                    <button type="button"
                        class="sidebar-link flex w-full items-center justify-between rounded-lg px-3 py-2.5"
                        data-submenu-toggle="submenu-{{ $menu['id'] }}"
                        data-popover-target="popover-{{ $menu['id'] }}" 
                        data-popover-placement="right-start"
                        data-popover-trigger="hover"
                        data-popover-offset="8">
                        <div class="flex items-center gap-3">
                            <x-dynamic-component :component="'bi-' . $menu['icon_main']" class="w-5 h-5" />
                            <span class="menu-bar inline-flex h-6 w-1 rounded-full"></span>
                            <span class="sidebar-label whitespace-nowrap">{{ $menu['label'] }}</span>
                        </div>
                        <x-bi-chevron-right class="chevron-icon w-3 h-3" />
                    </button>

                    {{-- Submenu --}}
                    <div id="submenu-{{ $menu['id'] }}" class="submenu mt-1 pl-9 pr-3 p-1 text-xs">
                        <div class="flex gap-3">
                            <span class="w-px bg-slate-300/80 dark:bg-slate-700 ml-2"></span>
                            <div class="space-y-1">
                                @foreach ($menu['items'] as $item)
                                    <a href="{{ route($item['route']) }}"
                                        class="flex items-center gap-2 rounded-md px-1 py-1 hover:bg-slate-200/60 dark:hover:bg-slate-800 transition-colors"
                                        target="_blank" rel="noopener noreferrer">
                                        <span class="menu-bar inline-flex h-4 w-1 rounded-full"></span>
                                        <span>{{ $item['label'] }}</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach

        </nav>
    </div>

    {{-- POPOVERS (Gerados automaticamente pelo loop para TODOS os menus) --}}
    @foreach ($menus as $menu)
        <div data-popover id="popover-{{ $menu['id'] }}" role="tooltip"
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
                            <a href="{{ route($item['route']) }}"
                                class="flex items-center gap-2 px-2 py-1.5 rounded hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-white transition-colors"
                                target="_blank" rel="noopener noreferrer">
                                <x-dynamic-component :component="'bi-' . $item['icon']" class="w-4 h-4 shrink-0" />
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
    document.addEventListener('DOMContentLoaded', () => {
        // =================================================================
        // 1. CONFIGURAÇÃO DA SIDEBAR
        // =================================================================
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

        toggleBtn.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();

            if (isDesktop()) {
                const collapsed = document.body.classList.toggle('sidebar-collapsed');
                localStorage.setItem(KEY, collapsed);
                setAria(!collapsed);
                return;
            }

            const willOpen = sidebar.classList.contains('-translate-x-full');
            sidebar.classList.toggle('-translate-x-full');
            setAria(willOpen);
        });

        document.addEventListener('click', (e) => {
            if (isDesktop()) return;
            if (sidebar.contains(e.target) || toggleBtn.contains(e.target)) return;

            if (!sidebar.classList.contains('-translate-x-full')) {
                sidebar.classList.add('-translate-x-full');
                setAria(false);
            }
        });

        // Accordion submenus
        sidebar.querySelectorAll('[data-submenu-toggle]').forEach((btn) => {
            btn.addEventListener('click', function(e) {
                if (document.body.classList.contains('sidebar-collapsed')) return;
                e.preventDefault();
                e.stopPropagation();
                const group = this.closest('.menu-group');
                if (group) group.dataset.open = group.dataset.open === 'true' ? 'false' :
                    'true';
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

        // =================================================================
        // 2. SISTEMA DE POPOVER ROBUSTO (TRAVAMENTO DE CLICK)
        // =================================================================
        
        const closeTimers = {};

        // Função Recursiva: Marca a árvore genealógica como "Em uso"
        function cancelCloseTree(popoverId) {
            if (!popoverId) return;
            
            // Cancela timer deste elemento
            if (closeTimers[popoverId]) {
                clearTimeout(closeTimers[popoverId]);
                closeTimers[popoverId] = null;
            }

            const el = document.getElementById(popoverId);
            if (el) {
                el.classList.remove('hidden', 'invisible', 'opacity-0');
                el.classList.add('block', 'opacity-100');

                // Chama para o pai
                const parentId = el.getAttribute('data-parent-ref');
                if (parentId) cancelCloseTree(parentId);
            }
        }

        function showPopover(el, trigger) {
            if (!el) return;

            // Fecha outros que não sejam ancestrais
            document.querySelectorAll('.popover-flowbite').forEach(other => {
                if (other.id !== el.id && !isAncestor(el, other)) {
                    // SE o "other" estiver aberto via click (fixo), ou mouse em cima, não fecha agora
                    if (!other.matches(':hover') && !isClickOpened(other) && !hasActiveChild(other)) {
                        hidePopoverImmediate(other);
                    }
                }
            });

            cancelCloseTree(el.id);
            
            // --- POSICIONAMENTO ---
            const tRect = trigger.getBoundingClientRect();
            const pRect = el.getBoundingClientRect();
            
            let top = tRect.top;
            let left = 0;

            const parentContainer = trigger.closest('.popover-flowbite');
            if (parentContainer) {
                // Alinha EXATAMENTE ao lado do pai (sem overlay, sem gap)
                // Usamos o getBoundingClientRect do container pai
                const parentRect = parentContainer.getBoundingClientRect();
                left = parentRect.right; 
            } else {
                // Primeiro nível: ao lado do botão
                left = tRect.right + 10;
            }

            if (top + pRect.height > window.innerHeight) {
                top = window.innerHeight - pRect.height - 10;
            }

            el.style.position = 'fixed';
            el.style.top = `${top}px`;
            el.style.left = `${left}px`;
            el.style.zIndex = '9999';
        }

        function hidePopoverImmediate(el) {
            if(!el) return;
            el.classList.add('hidden', 'invisible', 'opacity-0');
            el.classList.remove('block', 'opacity-100');
            el.removeAttribute('data-click-opened');
            
            // Limpa flag no pai indicando que filho fechou
            const parentId = el.getAttribute('data-parent-ref');
            if(parentId) {
                const parent = document.getElementById(parentId);
                if(parent) parent.removeAttribute('data-has-active-child');
            }
        }

        function isAncestor(child, potentialParent) {
            let curr = child;
            while(curr) {
                const pid = curr.getAttribute('data-parent-ref');
                if(!pid) return false;
                if(pid === potentialParent.id) return true;
                curr = document.getElementById(pid);
            }
            return false;
        }

        // Verifica se o elemento foi aberto via click (Fixo)
        function isClickOpened(el) {
            return el.hasAttribute('data-click-opened');
        }

        // Verifica se o elemento tem um filho aberto (Travamento do Pai)
        function hasActiveChild(el) {
            return el.hasAttribute('data-has-active-child');
        }

        function scheduleClose(elId) {
            if (closeTimers[elId]) clearTimeout(closeTimers[elId]);

            closeTimers[elId] = setTimeout(() => {
                const el = document.getElementById(elId);
                if (!el) return;

                // --- REGRAS DE OURO PARA NÃO FECHAR ---
                // 1. Se foi clicado (fixo), não fecha via timer.
                if (isClickOpened(el)) return;
                // 2. Se tem um filho aberto (fixo ou hover), o pai não pode fechar.
                if (hasActiveChild(el)) return;
                // 3. Se o mouse está em cima.
                if (el.matches(':hover')) return; 
                // 4. Se o mouse está num input/botão dentro dele.
                if (el.querySelector(':hover')) return;

                // Se falhou em tudo, pode fechar
                hidePopoverImmediate(el);

                // E verifica se o pai deve fechar (recursão)
                const parentId = el.getAttribute('data-parent-ref');
                if (parentId) scheduleClose(parentId);

            }, 200);
        }

        // FECHAR AO CLICAR FORA (Global)
        document.addEventListener('click', (e) => {
            const target = e.target;
            if (target.closest('.popover-flowbite') || target.closest('[data-popover-target]')) return;
            
            // Fecha tudo
            document.querySelectorAll('.popover-flowbite').forEach(p => hidePopoverImmediate(p));
        });

        // --- ATRIBUIÇÃO DE EVENTOS ---
        const triggers = document.querySelectorAll('[data-popover-target]');

        triggers.forEach(trigger => {
            const targetId = trigger.getAttribute('data-popover-target');
            const triggerType = trigger.getAttribute('data-popover-trigger') || 'hover';
            const popoverEl = document.getElementById(targetId);

            if (!popoverEl) return;

            if (triggerType === 'click') {
                // --- CLICK (Submenus) ---
                trigger.addEventListener('click', (e) => {
                    e.stopPropagation();
                    e.preventDefault();

                    const isVisible = popoverEl.classList.contains('block');
                    
                    if (isVisible) {
                        hidePopoverImmediate(popoverEl);
                    } else {
                        // 1. Marca como aberto por Click
                        popoverEl.setAttribute('data-click-opened', 'true');
                        
                        // 2. AVISA O PAI QUE ELE TEM UM FILHO ATIVO (TRAVA O PAI)
                        const parentPopover = trigger.closest('.popover-flowbite');
                        if(parentPopover) {
                            parentPopover.setAttribute('data-has-active-child', 'true');
                            cancelCloseTree(parentPopover.id);
                        }

                        showPopover(popoverEl, trigger);
                    }
                });
            } else {
                // --- HOVER (Menu Principal) ---
                trigger.addEventListener('mouseenter', () => {
                    const parentPopover = trigger.closest('.popover-flowbite');
                    if(parentPopover) cancelCloseTree(parentPopover.id);
                    showPopover(popoverEl, trigger);
                });

                trigger.addEventListener('mouseleave', () => {
                    scheduleClose(targetId);
                });
            }
        });
        
        // Eventos no Popover para manter aberto
        document.querySelectorAll('.popover-flowbite').forEach(popover => {
            popover.addEventListener('mouseenter', () => {
                cancelCloseTree(popover.id);
            });
            popover.addEventListener('mouseleave', () => {
                // Se não for fixo por click e não tiver filho aberto, agenda fechamento
                if(!isClickOpened(popover) && !hasActiveChild(popover)) {
                    scheduleClose(popover.id);
                }
            });
        });
    });
</script>
