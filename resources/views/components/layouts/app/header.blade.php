<nav class="relative top-0 z-50 w-full bg-neutral-900 dark:bg-neutral-900 border-b border-default">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start rtl:justify-end">
                {{-- BOTÃO ÚNICO PARA ABRIR/COLAPSAR O SIDEBAR (MOBILE + DESKTOP) --}}
                <button id="header-sidebar-toggle" type="button" aria-expanded="false"
                    class="text-heading bg-transparent box-border border border-transparent
           bg-neutral-secondary-medium dark:focus:outline-2 dark:focus:outline-offset-2 dark:focus:ring-neutral-tertiary
           font-medium leading-5 rounded-base text-sm p-2 focus:outline-none mr-2">
                    <span class="sr-only">Alternar sidebar</span>
                    <x-bi-justify-left class="w-6 h-6" />
                </button>

                <a href="{{ route('home') }}" class="flex ms-2 md:me-6 me-2">
                    <img src="{{ asset('assets/img/belem.png') }}" class="h-6 me-3" alt="pará Logo" />
                    <span
                        class="self-center text-lg font-semibold whitespace-nowrap text-white dark:text-white">Core</span>
                </a>
                {{-- Dropdown de range --}}
                <div class="relative">
                    <button id="btn-tipotempo" data-dropdown-toggle="dropdown-tipotempo" type="button"
                        class="inline-flex items-center gap-1.5 px-3 py-2 text-xs md:text-sm font-medium
                               rounded-md border bg-slate-50 text-slate-600 border-slate-200
                               hover:bg-slate-100 hover:text-slate-900
                               focus:outline-none focus:ring-2 focus:ring-slate-300
                               dark:bg-slate-800/80 dark:text-slate-300 dark:border-slate-600
                               dark:hover:bg-slate-700 dark:hover:text-slate-50 dark:focus:ring-sky-500/40">
                        <span id="tipotempo-label" class="whitespace-nowrap">Hoje</span>
                        <svg class="w-2.5 h-2.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>

                    <div id="dropdown-tipotempo"
                        class="z-20 hidden mt-2 bg-white divide-y divide-slate-100 rounded-lg shadow-lg w-44
                        border border-slate-100 dark:bg-slate-800 dark:divide-slate-700 dark:border-slate-700">
                        <ul class="py-2 text-sm text-slate-700 dark:text-slate-200" aria-labelledby="btn-tipotempo">
                            <li><a href="#" data-tempo="hoje"
                                    class="block px-4 py-2 hover:bg-slate-50 dark:hover:bg-slate-700/70 dark:hover:text-white">Hoje</a>
                            </li>
                            <li><a href="#" data-tempo="ontem"
                                    class="block px-4 py-2 hover:bg-slate-50 dark:hover:bg-slate-700/70 dark:hover:text-white">Ontem</a>
                            </li>
                            <li><a href="#" data-tempo="semana-atual"
                                    class="block px-4 py-2 hover:bg-slate-50 dark:hover:bg-slate-700/70 dark:hover:text-white">Semana
                                    Atual</a></li>
                            <li><a href="#" data-tempo="semana-passada"
                                    class="block px-4 py-2 hover:bg-slate-50 dark:hover:bg-slate-700/70 dark:hover:text-white">Semana
                                    Passada</a></li>
                            <li><a href="#" data-tempo="mes-atual"
                                    class="block px-4 py-2 hover:bg-slate-50 dark:hover:bg-slate-700/70 dark:hover:text-white">Mês
                                    Atual</a></li>
                            <li><a href="#" data-tempo="mes-passado"
                                    class="block px-4 py-2 hover:bg-slate-50 dark:hover:bg-slate-700/70 dark:hover:text-white">Mês
                                    Passado</a></li>
                            <li><a href="#" data-tempo="periodo"
                                    class="block px-4 py-2 hover:bg-slate-50 dark:hover:bg-slate-700/70 dark:hover:text-white">Período
                                    Personalizado</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="flex items-center">
                <div class="flex items-center ms-3">
                    <div>
                        <button type="button"
                            class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                            aria-expanded="false" data-dropdown-toggle="dropdown-user">
                            <span class="sr-only">Open user menu</span>
                            <img class="w-8 h-8 rounded-full"
                                src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="user photo">
                        </button>
                    </div>
                    <div class="z-50 hidden bg-neutral-primary-medium border border-default-medium rounded-base shadow-lg w-44"
                        id="dropdown-user">
                        <div class="px-4 py-3 border-b border-default-medium" role="none">
                            <p class="text-sm font-medium text-heading" role="none">
                                Neil Sims
                            </p>
                            <p class="text-sm text-body truncate" role="none">
                                neil.sims@flowbite.com
                            </p>
                        </div>
                        <ul class="p-2 text-sm text-body font-medium" role="none">
                            <li>
                                <div
                                    class="flex items-center px-4 py-2 hover:bg-neutral-tertiary-medium rounded cursor-pointer">
                                    <label class="ui-switch mr-3">
                                        <input type="checkbox" class="theme-toggle-input">
                                        <div class="slider">
                                            <div class="circle"></div>
                                        </div>
                                    </label>
                                    <span class="text-sm font-medium text-heading select-none">Trocar tema</span>
                                </div>
                            </li>
                            <li>
                                <a href="#"
                                    class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded"
                                    role="menuitem">Dashboard</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded"
                                    role="menuitem">Configurações</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded"
                                    role="menuitem">Log out</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</nav>
@once
    @push('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                const STORAGE_KEY = "tipotempo";
                const DEFAULT = "hoje";

                const btn = document.getElementById("btn-tipotempo");
                const labelEl = document.getElementById("tipotempo-label"); // AGORA EXISTE
                const dropdown = document.getElementById("dropdown-tipotempo");

                if (!btn || !labelEl || !dropdown) return;

                const items = Array.from(dropdown.querySelectorAll("a[data-tempo]"));

                function closeDropdown() {
                    dropdown.classList.add("hidden");
                    btn.setAttribute("aria-expanded", "false");
                }

                function pushTempoToUrl(tempo) {
                    const url = new URL(window.location.href);
                    url.searchParams.set("tempo", tempo);
                    history.pushState({}, "", url);
                }

                function applyTempo(tempo, label) {
                    localStorage.setItem(STORAGE_KEY, tempo);
                    labelEl.textContent = label ?? tempo;
                    pushTempoToUrl(tempo);

                    // faz um disparo global
                    window.dispatchEvent(new CustomEvent("tipotempo:change", {
                        detail: { tempo, label }
                    }));
                }

                // boot
                const saved = localStorage.getItem(STORAGE_KEY) || DEFAULT;
                const savedItem = items.find(a => a.dataset.tempo === saved);

                if (savedItem) applyTempo(savedItem.dataset.tempo, savedItem.textContent.trim());
                else applyTempo(DEFAULT, "Hoje");

                // click
                items.forEach((a) => {
                    a.addEventListener("click", (e) => {
                        e.preventDefault();
                        applyTempo(a.dataset.tempo, a.textContent.trim());
                        closeDropdown();
                    });
                });
            });
        </script>
    @endpush
@endonce
