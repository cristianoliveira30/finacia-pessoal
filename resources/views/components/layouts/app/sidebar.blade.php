{{-- CONFIGURAÇÃO DOS MENUS (DADOS) --}}
@php
    $menus = [
        [
            'id' => 'usuarios',
            'label' => 'Usuários',
            'popover_title' => 'Usuários',
            'color' => 'sky',
            'shade' => '400',
            'icon_main' => 'M17 20v-2a4 4 0 00-3-3.87M9 4a3 3 0 110 6 3 3 0 010-6zm6 3a3 3 0 11-6 0m-3 9a4 4 0 013-3.87',
            'items' => [
                ['label' => 'Adicionar', 'route' => 'usuario/cadastro', 'icon' => 'M12 4v16m8-8H4'],
                ['label' => 'Buscar', 'route' => 'usuario/buscar', 'icon' => 'M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z']
            ]
        ],
        [
            'id' => 'calendario',
            'label' => 'Calendário',
            'popover_title' => 'Agenda',
            'color' => 'violet',
            'shade' => '500',
            'icon_main' => 'M8 7V5m8 2V5M5 9h14M6 5h12a2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V7a2 2 0 012-2z',
            'items' => [
                ['label' => 'Agenda', 'route' => 'calendario/calendario', 'icon' => 'M8 7V5m8 2V5M5 9h14M6 5h12a2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V7a2 2 0 012-2z'],
                ['label' => 'Agenda pessoal', 'route' => 'calendario/calendario-pessoal', 'icon' => 'M8 7V5m8 2V5M5 9h14M6 5h12a2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V7a2 2 0 012-2z']
            ]
        ],
        [
            'id' => 'eleitores',
            'label' => 'Eleitores',
            'popover_title' => 'Eleitores',
            'color' => 'emerald',
            'shade' => '400',
            'icon_main' => 'M12 12a4 4 0 100-8 4 4 0 000 8zM4 20a8 8 0 1116 0',
            'items' => [
                ['label' => 'Adicionar', 'route' => 'eleitor/cadastro', 'icon' => 'M12 4v16m8-8H4'],
                ['label' => 'Buscar', 'route' => 'eleitor/buscar', 'icon' => 'M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z']
            ]
        ],
        [
            'id' => 'atendimentos',
            'label' => 'Atendimentos',
            'popover_title' => 'Atendimentos',
            'color' => 'amber',
            'shade' => '400',
            'icon_main' => 'M8 10h.01M12 10h.01M16 10h.01M21 12c0 4.418-4.03 8-9 8a9.86 9.86 0 01-3.5-.6L3 20l1.35-3.38A7.5 7.5 0 013 12c0-4.418 4.03-8 9-8s9 3.582 9 8z',
            'items' => [
                ['label' => 'Adicionar', 'route' => 'atendimento/cadastro', 'icon' => 'M12 4v16m8-8H4'],
                ['label' => 'Buscar', 'route' => 'atendimento/buscar', 'icon' => 'M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z']
            ]
        ],
        [
            'id' => 'acoes',
            'label' => 'Ações',
            'popover_title' => 'Ações',
            'color' => 'rose',
            'shade' => '500',
            'icon_main' => 'M12 6v12m6-6H6',
            'items' => [
                ['label' => 'Adicionar', 'route' => 'acoes/cadastro', 'icon' => 'M12 4v16m8-8H4'],
                ['label' => 'Buscar', 'route' => 'acoes/buscar', 'icon' => 'M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z']
            ]
        ],
        [
            'id' => 'mensagens',
            'label' => 'Mensagens',
            'popover_title' => 'Mensagens',
            'color' => 'cyan',
            'shade' => '400',
            'icon_main' => 'M4 6h16v10H5.17L4 17.17V6z',
            'items' => [
                ['label' => 'Enviar', 'route' => 'message/envio', 'icon' => 'M12 6v12m6-6H6']
            ]
        ]
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
                    
                    {{-- DASHBOARD (ÚNICO ITEM SEM DROPDOWN) --}}
                    <li>
                        <a href="{{ route('home') }}"
                            class="sidebar-link flex items-center gap-3 rounded-lg px-3 py-2.5 text-slate-100 hover:bg-slate-800"
                            data-tooltip="Dashboard">
                            <x-bi-tv class="w-5 h-5" />
                            <span class="sidebar-label whitespace-nowrap font-semibold">Dashboard</span>
                        </a>
                    </li>

                    {{-- LOOP PARA GERAR TODOS OS MENUS COM DROPDOWN --}}
                    @foreach($menus as $menu)
                        <li class="menu-group" data-open="false">
                            <div class="menu-highlight bg-{{ $menu['color'] }}-900/40 -z-10"></div>
                            
                            <button type="button"
                                    class="sidebar-link flex w-full items-center justify-between rounded-lg px-3 py-2.5 {{ $menu['id'] === 'calendario' ? 'text-slate-200' : '' }}"
                                    data-submenu-toggle="submenu-{{ $menu['id'] }}"
                                    data-popover-target="popover-{{ $menu['id'] }}" 
                                    data-popover-placement="right">
                                <div class="flex items-center gap-3">
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="{{ $menu['icon_main'] }}"/>
                                    </svg>
                                    <span class="inline-flex h-6 w-1 rounded-full bg-{{ $menu['color'] }}-{{ $menu['shade'] }}"></span>
                                    <span class="sidebar-label whitespace-nowrap">{{ $menu['label'] }}</span>
                                </div>
                                <svg class="chevron-icon w-3 h-3 text-{{ $menu['color'] }}-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                                </svg>
                            </button>

                            <div id="submenu-{{ $menu['id'] }}" class="submenu mt-1 pl-9 pr-3 p-1 text-xs {{ $menu['id'] === 'calendario' ? 'text-slate-200' : '' }}">
                                <div class="flex gap-3">
                                    <span class="w-px bg-slate-700 ml-2"></span>
                                    <div class="space-y-1">
                                        @foreach($menu['items'] as $item)
                                            <a href="{{ route($item['route']) }}" class="flex items-center gap-2 rounded-md px-1 py-1 hover:bg-slate-800 hover:text-{{ $menu['color'] }}-300">
                                                <span class="inline-flex h-4 w-1 rounded-full bg-{{ $menu['color'] }}-{{ $menu['shade'] }}"></span>
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
                    <span class="h-4 w-1 rounded-full bg-{{ $menu['color'] }}-{{ $menu['shade'] }}"></span>
                    <span class="font-semibold text-{{ $menu['color'] }}-500 dark:text-{{ $menu['color'] }}-400">{{ $menu['popover_title'] }}</span>
                </div>
                <ul class="space-y-1">
                    @foreach($menu['items'] as $item)
                        <li>
                            <a href="{{ route($item['route']) }}" class="flex items-center gap-2 px-2 py-1.5 rounded hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-white transition-colors">
                                {{-- CORREÇÃO AQUI: Usa 'shade' dinâmico para garantir a cor exata do sidebar --}}
                                <svg class="w-4 h-4 text-{{ $menu['color'] }}-{{ $menu['shade'] }} dark:text-{{ $menu['color'] }}-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="{{ $item['icon'] }}"/>
                                </svg>
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