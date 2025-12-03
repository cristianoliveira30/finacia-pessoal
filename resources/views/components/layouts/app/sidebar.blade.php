<aside id="top-bar-sidebar"
    class="static lg:sticky top-0 left-0 z-40 w-64 h-screen transition-all duration-300 -translate-x-full lg:translate-x-0 bg-neutral-primary-soft dark:bg-slate-900 border-e border-default"
    aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-neutral-primary-soft dark:bg-slate-900 border-e border-default">
                <button id="sidebar-collapse-btn" type="button" aria-expanded="true"
                    class="inline-flex text-heading dark:text-fg-brand bg-transparent border border-transparent dark:hover:bg-neutral-secondary-medium hover:bg-neutral-tertiary font-medium leading-5 rounded-base text-sm p-2 focus:outline-none">
                    <span class="sr-only">Toggle sidebar</span>
                    <svg class="w-6 h-6 block" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                            d="M5 7h14M5 12h14M5 17h10" />
                    </svg>
                </button>
        <ul class="space-y-2 font-medium">
            <li>
                <a href="#"
                    class="flex items-center px-4 py-2.5 text-body rounded-base hover:bg-neutral-tertiary dark:hover:bg-slate-800 hover:text-fg-brand dark:hover:text-slate-100 group peer-checked:justify-center peer-checked:px-0">
                    <svg class="w-5 h-5 transition duration-75 group-hover:text-fg-brand" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 6.025A7.5 7.5 0 1 0 17.975 14H10V6.025Z" />
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13.5 3c-.169 0-.334.014-.5.025V11h7.975c.011-.166.025-.331.025-.5A7.5 7.5 0 0 0 13.5 3Z" />
                    </svg>
                    <span class="ms-3 sidebar-label peer-checked:hidden">Dashboard</span>
                </a>
            </li>

            {{-- Não lota de coisa por enquanto, foca nas funcionalidades --}}
            {{-- Tipo o collapse da sidebar --}}
        </ul>
    </div>
</aside>


<script>
    (function(){
        const btn = document.getElementById('sidebar-collapse-btn');
        const sidebar = document.getElementById('top-bar-sidebar');
        if(!btn || !sidebar) return;

        // Apply persisted state (apenas para desktop logic)
        const persisted = localStorage.getItem('sidebarCollapsed');
        if(window.innerWidth >= 1024 && persisted === 'true'){
            document.body.classList.add('sidebar-collapsed');
            btn.setAttribute('aria-expanded', 'false');
        }

        btn.addEventListener('click', function(){
            // Verifica se é tela pequena (Mobile/Tablet < 1024px)
            if (window.innerWidth < 1024) {
                // No mobile, removemos a classe que esconde a sidebar (-translate-x-full) para mostrá-la
                const isHidden = sidebar.classList.toggle('-translate-x-full');
                btn.setAttribute('aria-expanded', String(!isHidden));
            } else {
                // Lógica original para Desktop
                const collapsed = document.body.classList.toggle('sidebar-collapsed');
                localStorage.setItem('sidebarCollapsed', collapsed);
                btn.setAttribute('aria-expanded', String(!collapsed));
            }
        });
    })();
</script>