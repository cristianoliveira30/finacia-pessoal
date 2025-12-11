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

    html:not(.dark) {
        --sidebar-bg: #ffffff;
        --sidebar-border: #e5e7eb;
        --sidebar-text: #020617;
        --sidebar-hover-bg: #f3f4f6;
        --sidebar-submenu-bg: #ffffff;
        --sidebar-submenu-border: #e5e7eb;
        --sidebar-tooltip-bg: #4b5563;
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

    /* Links do sidebar herdam a cor do container (muda com o tema) */
    #top-bar-sidebar .sidebar-link {
        color: inherit;
    }

    #top-bar-sidebar .sidebar-link:hover {
        background-color: var(--sidebar-hover-bg);
    }

    /* ===== BASE DOS GRUPOS COM SUBMENU ===== */

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

    /* ===== SUBMENUS ===== */

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
        position: absolute;
        top: 0;
        left: calc(100% + 0.75rem);
        min-width: 230px;
        padding: 0.75rem 0.75rem;
        margin-top: 0;
        border-radius: 0.75rem;
        background-color: var(--sidebar-submenu-bg);
        border: 1px solid var(--sidebar-submenu-border);
        box-shadow: 0 10px 15px -3px rgba(15, 23, 42, 0.7);
        z-index: 9999;
        display: none !important;
    }

    body.sidebar-collapsed .menu-group:hover>.submenu {
        display: block !important;
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
</style>

<aside id="top-bar-sidebar"
    class="
        absolute inset-y-0 left-0 z-40 w-64
        -translate-x-full lg:translate-x-0
        border-e
        transition-transform duration-300
    "
    aria-label="Sidebar">

    <div class="h-full flex flex-col">
        <div class="h-full flex flex-col">
            <nav class="flex-1 px-2 pb-4 text-sm font-medium">
                <ul class="space-y-1">
                    {{-- DASHBOARD --}}
                    <li>
                        <a href="#"
                           class="sidebar-link flex items-center gap-3 rounded-lg px-3 py-2.5"
                           data-tooltip="Dashboard">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor" stroke-width="2" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M3 12l9-9 9 9M4.5 10.5V21h15V10.5"/>
                            </svg>
                            <span class="sidebar-label whitespace-nowrap font-semibold">Dashboard</span>
                        </a>
                    </li>

                    {{-- USUÁRIOS --}}
                    <li class="menu-group" data-open="false">
                        <div class="menu-highlight bg-sky-900/40 -z-10"></div>
                        <button type="button"
                                class="sidebar-link flex w-full items-center justify-between rounded-lg px-3 py-2.5"
                                data-submenu-toggle="submenu-usuarios">
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M17 20v-2a4 4 0 00-3-3.87M9 4a3 3 0 110 6 3 3 0 010-6zm6 3a3 3 0 11-6 0m-3 9a4 4 0 013-3.87"/>
                                </svg>
                                <span class="inline-flex h-6 w-1 rounded-full bg-sky-400"></span>
                                <span class="sidebar-label whitespace-nowrap">Usuários</span>
                            </div>
                            <svg class="chevron-icon w-3 h-3 text-sky-300" xmlns="http://www.w3.org/2000/svg"
                                 fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                 aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                            </svg>
                        </button>

                        <div id="submenu-usuarios" class="submenu mt-1 pl-9 pr-3 p-1 text-xs">
                            <div class="flex gap-3">
                                <span class="w-px bg-slate-700 ml-2"></span>
                                <div class="space-y-1">
                                    <a href="#"
                                       class="flex items-center gap-2 rounded-md px-1 py-1 hover:underline">
                                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                             aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M12 6v12m6-6H6"/>
                                        </svg>
                                        <span class="inline-flex h-4 w-1 rounded-full bg-sky-400"></span>
                                        <span>Adicionar</span>
                                    </a>
                                    <a href="#"
                                       class="flex items-center gap-2 rounded-md px-1 py-1 hover:underline">
                                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                             aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        <span class="inline-flex h-4 w-1 rounded-full bg-sky-400"></span>
                                        <span>Buscar / Editar</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>

                    {{-- AGENDA --}}
                    <li class="menu-group" data-open="false">
                        <div class="menu-highlight bg-violet-900/40 -z-10"></div>
                        <button type="button"
                                class="sidebar-link flex w-full items-center justify-between rounded-lg px-3 py-2.5"
                                data-submenu-toggle="submenu-agenda">
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M8 7V5m8 2V5M5 9h14M6 5h12a2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V7a2 2 0 012-2z"/>
                                </svg>
                                <span class="inline-flex h-6 w-1 rounded-full bg-violet-500"></span>
                                <span class="sidebar-label whitespace-nowrap">Agenda</span>
                            </div>
                            <svg class="chevron-icon w-3 h-3 text-violet-300" xmlns="http://www.w3.org/2000/svg"
                                 fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                 aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                            </svg>
                        </button>

                        <div id="submenu-agenda" class="submenu mt-1 p-1 pl-9 pr-3 text-xs">
                            <div class="flex gap-3">
                                <span class="w-px bg-slate-700 ml-2"></span>
                                <div class="space-y-1">
                                    <a href="#"
                                       class="flex items-center gap-2 rounded-md px-1 py-1 hover:underline">
                                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                             aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M8 7V5m8 2V5M5 9h14M6 5h12a2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V7a2 2 0 012-2z"/>
                                        </svg>
                                        <span class="inline-flex h-4 w-1 rounded-full bg-violet-400"></span>
                                        <span>Agenda</span>
                                    </a>
                                    <a href="#"
                                       class="flex items-center gap-2 rounded-md px-1 py-1 hover:underline">
                                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                             aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M8 7V5m8 2V5M5 9h14M6 5h12a2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V7a2 2 0 012-2z"/>
                                        </svg>
                                        <span class="inline-flex h-4 w-1 rounded-full bg-violet-400"></span>
                                        <span>Agenda pessoal</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>

                    {{-- ELEITORES --}}
                    <li class="menu-group" data-open="false">
                        <div class="menu-highlight bg-emerald-900/40 -z-10"></div>
                        <button type="button"
                                class="sidebar-link flex w-full items-center justify-between rounded-lg px-3 py-2.5"
                                data-submenu-toggle="submenu-eleitores">
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M12 12a4 4 0 100-8 4 4 0 000 8zM4 20a8 8 0 1116 0"/>
                                </svg>
                                <span class="inline-flex h-6 w-1 rounded-full bg-emerald-400"></span>
                                <span class="sidebar-label whitespace-nowrap">Eleitores</span>
                            </div>
                            <svg class="chevron-icon w-3 h-3 text-emerald-300" xmlns="http://www.w3.org/2000/svg"
                                 fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                 aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                            </svg>
                        </button>

                        <div id="submenu-eleitores" class="submenu mt-1 pl-9 p-1 pr-3 text-xs">
                            <div class="flex gap-3">
                                <span class="w-px bg-slate-700 ml-2"></span>
                                <div class="space-y-1">
                                    <a href="#"
                                       class="flex items-center gap-2 rounded-md px-1 py-1 hover:underline">
                                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                             aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M12 6v12m6-6H6"/>
                                        </svg>
                                        <span class="inline-flex h-4 w-1 rounded-full bg-emerald-400"></span>
                                        <span>Adicionar</span>
                                    </a>
                                    <a href="#"
                                       class="flex items-center gap-2 rounded-md px-1 py-1 hover:underline">
                                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                             aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        <span class="inline-flex h-4 w-1 rounded-full bg-emerald-400"></span>
                                        <span>Buscar / Editar</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>

                    {{-- ATENDIMENTOS --}}
                    <li class="menu-group" data-open="false">
                        <div class="menu-highlight bg-amber-900/40 -z-10"></div>
                        <button type="button"
                                class="sidebar-link flex w-full items-center justify-between rounded-lg px-3 py-2.5"
                                data-submenu-toggle="submenu-atendimentos">
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M8 10h.01M12 10h.01M16 10h.01M21 12c0 4.418-4.03 8-9 8a9.86 9.86 0 01-3.5-.6L3 20l1.35-3.38A7.5 7.5 0 013 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                </svg>
                                <span class="inline-flex h-6 w-1 rounded-full bg-amber-400"></span>
                                <span class="sidebar-label whitespace-nowrap">Atendimentos</span>
                            </div>
                            <svg class="chevron-icon w-3 h-3 text-amber-300" xmlns="http://www.w3.org/2000/svg"
                                 fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                 aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                            </svg>
                        </button>

                        <div id="submenu-atendimentos" class="submenu mt-1 pl-9 p-1 pr-3 text-xs">
                            <div class="flex gap-3">
                                <span class="w-px bg-slate-700 ml-2"></span>
                                <div class="space-y-1">
                                    <a href="#"
                                       class="flex items-center gap-2 rounded-md px-1 py-1 hover:underline">
                                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                             aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M12 6v12m6-6H6"/>
                                        </svg>
                                        <span class="inline-flex h-4 w-1 rounded-full bg-amber-400"></span>
                                        <span>Adicionar</span>
                                    </a>
                                    <a href="#"
                                       class="flex items-center gap-2 rounded-md px-1 py-1 hover:underline">
                                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                             aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        <span class="inline-flex h-4 w-1 rounded-full bg-amber-400"></span>
                                        <span>Buscar</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>

                    {{-- AÇÕES --}}
                    <li class="menu-group" data-open="false">
                        <div class="menu-highlight bg-rose-900/40 -z-10"></div>
                        <button type="button"
                                class="sidebar-link flex w-full items-center justify-between rounded-lg px-3 py-2.5"
                                data-submenu-toggle="submenu-acoes">
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6"/>
                                </svg>
                                <span class="inline-flex h-6 w-1 rounded-full bg-rose-500"></span>
                                <span class="sidebar-label whitespace-nowrap">Ações</span>
                            </div>
                            <svg class="chevron-icon w-3 h-3 text-rose-300" xmlns="http://www.w3.org/2000/svg"
                                 fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                 aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                            </svg>
                        </button>

                        <div id="submenu-acoes" class="submenu mt-1 pl-9 pr-3 p-1 text-xs">
                            <div class="flex gap-3">
                                <span class="w-px bg-slate-700 ml-2"></span>
                                <div class="space-y-1">
                                    <a href="#"
                                       class="flex items-center gap-2 rounded-md px-1 py-1 hover:underline">
                                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                             aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M12 6v12m6-6H6"/>
                                        </svg>
                                        <span class="inline-flex h-4 w-1 rounded-full bg-rose-500"></span>
                                        <span>Adicionar</span>
                                    </a>
                                    <a href="#"
                                       class="flex items-center gap-2 rounded-md px-1 py-1 hover:underline">
                                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                             aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        <span class="inline-flex h-4 w-1 rounded-full bg-rose-500"></span>
                                        <span>Buscar / Editar</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>

                    {{-- MENSAGENS --}}
                    <li class="menu-group" data-open="false">
                        <div class="menu-highlight bg-cyan-900/40 -z-10"></div>
                        <button type="button"
                                class="sidebar-link flex w-full items-center justify-between rounded-lg px-3 py-2.5"
                                data-submenu-toggle="submenu-mensagens">
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M4 6h16v10H5.17L4 17.17V6z"/>
                                </svg>
                                <span class="inline-flex h-6 w-1 rounded-full bg-cyan-400"></span>
                                <span class="sidebar-label whitespace-nowrap">Mensagens</span>
                            </div>
                            <svg class="chevron-icon w-3 h-3 text-cyan-300" xmlns="http://www.w3.org/2000/svg"
                                 fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                 aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                            </svg>
                        </button>

                        <div id="submenu-mensagens" class="submenu mt-1 pl-9 p-1 pr-3 text-xs">
                            <div class="flex gap-3">
                                <span class="w-px bg-slate-700 ml-2"></span>
                                <div class="space-y-1">
                                    <a href="#"
                                       class="flex items-center gap-2 rounded-md px-1 py-1 hover:underline">
                                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                             aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M12 6v12m6-6H6"/>
                                        </svg>
                                        <span class="inline-flex h-4 w-1 rounded-full bg-cyan-400"></span>
                                        <span>Enviar</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>

                </ul>
            </nav>
        </div>
    </div>
</aside>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sidebar = document.getElementById('top-bar-sidebar');
        const toggleBtn = document.getElementById('header-sidebar-toggle');
        const STORAGE_KEY = 'sidebarCollapsed';

        if (!sidebar || !toggleBtn) return;

        function isDesktop() {
            return window.innerWidth >= 1024;
        }

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

        function toggleMobileSidebar() {
            const isHidden = sidebar.classList.contains('-translate-x-full');
            if (isHidden) {
                sidebar.classList.remove('-translate-x-full');
            } else {
                sidebar.classList.add('-translate-x-full');
            }
            toggleBtn.setAttribute('aria-expanded', String(isHidden));
        }

        function toggleDesktopSidebar() {
            const collapsed = document.body.classList.toggle('sidebar-collapsed');
            localStorage.setItem(STORAGE_KEY, collapsed);
            toggleBtn.setAttribute('aria-expanded', String(!collapsed));
        }

        toggleBtn.addEventListener('click', function (e) {
            e.preventDefault();
            e.stopPropagation();

            if (isDesktop()) {
                toggleDesktopSidebar();
            } else {
                toggleMobileSidebar();
            }
        });

        document.addEventListener('click', function (e) {
            if (isDesktop()) return;

            const isOpen = !sidebar.classList.contains('-translate-x-full');
            if (!isOpen) return;

            const clickInsideSidebar = sidebar.contains(e.target);
            const clickOnBtn = toggleBtn.contains(e.target);
            if (clickInsideSidebar || clickOnBtn) return;

            sidebar.classList.add('-translate-x-full');
            toggleBtn.setAttribute('aria-expanded', 'false');
        });

        window.addEventListener('resize', function () {
            applyInitialState();
        });
    });

    (function () {
        const toggles = document.querySelectorAll('[data-submenu-toggle]');

        toggles.forEach((btn) => {
            const submenuId = btn.getAttribute('data-submenu-toggle');
            const submenu = document.getElementById(submenuId);
            const group = btn.closest('.menu-group');

            if (!submenu || !group) return;

            btn.addEventListener('click', function (e) {
                e.preventDefault();
                e.stopPropagation();

                const isOpen = group.dataset.open === 'true';
                group.dataset.open = isOpen ? 'false' : 'true';
            });
        });
    })();
</script>