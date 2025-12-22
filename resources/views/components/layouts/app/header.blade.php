@php
    $notificacoesFake = [
        [
            'id' => 'n1',
            'area' => 'Educação',
            'icon' => 'mortarboard-fill',
            'title' => 'Matrículas atualizadas',
            'msg' => 'Novas matrículas registradas e painel recalculado.',
            'time' => 'há 5 min',
            'unread' => true,
        ],
        [
            'id' => 'n2',
            'area' => 'Finanças',
            'icon' => 'cash-coin',
            'title' => 'Relatório publicado',
            'msg' => 'Relatório financeiro do mês disponível para consulta.',
            'time' => 'há 18 min',
            'unread' => true,
        ],
        [
            'id' => 'n3',
            'area' => 'Saúde',
            'icon' => 'heart-pulse-fill',
            'title' => 'Atendimentos sincronizados',
            'msg' => 'Atualização concluída com sucesso.',
            'time' => 'há 32 min',
            'unread' => true,
        ],
        [
            'id' => 'n4',
            'area' => 'Finanças',
            'icon' => 'file-earmark-text-fill',
            'title' => 'CAPEX registrado',
            'msg' => 'Novo lançamento de CAPEX (Obras/Equipamentos).',
            'time' => 'há 1 h',
            'unread' => true,
        ],
        [
            'id' => 'n5',
            'area' => 'Educação',
            'icon' => 'book-fill',
            'title' => 'Frequência consolidada',
            'msg' => 'Frequência semanal pronta para análise.',
            'time' => 'há 2 h',
            'unread' => true,
        ],
        [
            'id' => 'n6',
            'area' => 'Saúde',
            'icon' => 'capsule-pill',
            'title' => 'Estoque atualizado',
            'msg' => 'Movimentações de insumos registradas no sistema.',
            'time' => 'há 3 h',
            'unread' => true,
        ],
        [
            'id' => 'n7',
            'area' => 'Saúde',
            'icon' => 'hospital-fill',
            'title' => 'Fila de regulação',
            'msg' => 'Atualização de status em solicitações pendentes.',
            'time' => 'há 6 h',
            'unread' => true,
        ],
        [
            'id' => 'n8',
            'area' => 'Finanças',
            'icon' => 'graph-up-arrow',
            'title' => 'Indicadores atualizados',
            'msg' => 'KPIs financeiros recalculados com os dados mais recentes.',
            'time' => 'ontem',
            'unread' => true,
        ],
    ];

    $tagClass = fn($area) => match ($area) {
        'Educação' => 'bg-emerald-600 text-white',
        'Finanças' => 'bg-amber-600 text-white',
        'Saúde' => 'bg-rose-600 text-white',
        default => 'bg-slate-600 text-white',
    };
@endphp

<nav class="relative top-0 z-50 w-full bg-neutral-900 dark:bg-neutral-900 border-b border-default">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start rtl:justify-end">
                <button id="header-sidebar-toggle" type="button" aria-expanded="false"
                    class="text-heading bg-neutral-200 box-border border border-transparent
           hover:bg-slate-300 dark:focus:outline-2 dark:focus:outline-offset-2 dark:focus:ring-neutral-tertiary
           font-medium leading-5 rounded-base text-sm p-2 focus:outline-none mr-2">
                    <span class="sr-only">Alternar sidebar</span>
                    {{-- Já estava como componente, mantido --}}
                    <x-bi-justify-left class="w-6 h-6"/>
                </button>

                <a href="{{ route('home') }}" class="flex ms-2 md:me-6 me-2">
                    <img src="{{ asset('assets/img/belem.png') }}" class="h-6 me-3" alt="pará Logo" />
                    <span
                        class="self-center text-lg font-semibold whitespace-nowrap text-white dark:text-white">Core</span>
                </a>
                <div class="relative">
                    <button id="btn-tipotempo" data-dropdown-toggle="dropdown-tipotempo" type="button"
                        class="inline-flex items-center gap-1.5 px-3 py-2 text-xs md:text-sm font-medium
                               rounded-md border bg-neutral-200 text-slate-600 border-slate-200
                               hover:bg-slate-200 hover:text-slate-900
                               focus:outline-none focus:ring-2 focus:ring-slate-300
                               dark:bg-slate-800/80 dark:text-slate-300 dark:border-slate-600
                               dark:hover:bg-slate-700 dark:hover:text-slate-50 dark:focus:ring-sky-500/40">
                        <span class="whitespace-nowrap">Hoje</span>
                        {{-- SUBSTITUIÇÃO: SVG manual trocado por componente Blade --}}
                        <x-bi-chevron-down class="w-2.5 h-2.5" />
                    </button>

                    <div id="dropdown-tipotempo"
                        class="z-20 hidden mt-2 bg-neutral-50 hover:bg-slate-100 divide-y divide-slate-100 rounded-lg shadow-lg w-44
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
                <div class="relative ms-3">
                    <button type="button"
                        class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                        aria-expanded="false" data-dropdown-toggle="dropdown-user" data-dropdown-placement="bottom-end">
                        <span class="sr-only">Open user menu</span>
                        <span class="relative inline-block leading-none">
                            <img class="w-8 h-8 rounded-full object-cover block"
                                src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="user photo">
                            <span id="notif-avatar-badge"
                                class="hidden absolute -top-1 -right-1 min-w-[18px] h-[18px] px-1 rounded-full bg-rose-600 text-white text-[11px] flex items-center justify-center ring-2 ring-gray-800 dark:ring-gray-800">
                            </span>
                    </button>
        
                    <div id="dropdown-user"
                        class="absolute right-0 mt-2 z-50 hidden w-56
                               bg-neutral-primary-medium border border-default-medium rounded-base shadow-lg">
                        <div class="px-4 py-3 border-b border-default-medium" role="none">
                            <p class="text-sm font-medium text-heading" role="none">Neil Sims</p>
                            <p class="text-sm text-body truncate" role="none">neil.sims@flowbite.com</p>
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
                                    role="menuitem">
                                    {{-- Opcional: Adicionado ícone para consistência --}}
                                    <x-bi-speedometer2 class="w-4 h-4 mr-2" />
                                    Dashboard
                                </a>
                            </li>
                            <li>
                                {{-- APLICAÇÃO: Ícone + Gatilho da Modal --}}
                                <a href="#" onclick="openModal('profileModal'); return false;"
                                    class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded"
                                    role="menuitem">
                                    <x-bi-gear class="w-4 h-4 mr-2" />
                                    Configurações
                                </a>
                            </li>

                            <li>
                                <a href="#"
                                    class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded"
                                    role="menuitem">
                                    {{-- Opcional: Adicionado ícone para consistência --}}
                                    <x-bi-box-arrow-right class="w-4 h-4 mr-2" />
                                    Log out
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

{{-- 
    ========================================================================
    MODAL DE CONFIGURAÇÕES (REESTRUTURADA COM SIDEBAR)
    ========================================================================
--}}
<div id="profileModal" class="fixed inset-0 z-[60] hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    
    {{-- Backdrop (Mantido) --}}
    <div class="fixed inset-0 bg-gray-900/60 backdrop-blur-sm transition-opacity" onclick="closeModal('profileModal')"></div>

    {{-- Panel (Aumentado para max-w-5xl para acomodar a sidebar) --}}
    <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
        <div class="relative transform overflow-hidden rounded-2xl bg-white dark:bg-neutral-900 text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-5xl border border-slate-200 dark:border-neutral-700 h-[650px] flex flex-col md:flex-row">
            
            {{-- Botão Fechar (X) Absoluto no topo direito --}}
            <button type="button" onclick="closeModal('profileModal')" class="absolute top-4 right-4 z-20 text-gray-400 hover:text-gray-500 dark:hover:text-gray-300 focus:outline-none">
                <span class="sr-only">Fechar</span>
                <x-bi-x-lg class="w-5 h-5" />
            </button>

            {{-- 
               COLUNA 1: SIDEBAR (NAVEGAÇÃO) 
               Estilo baseado na referência image_94ccdd.png e image_94ccb8.jpg
            --}}
            <aside class="w-full md:w-64 bg-gray-50 dark:bg-[#0f1115] border-r border-gray-200 dark:border-neutral-700 flex-shrink-0 flex flex-col">
                <div class="p-6 border-b border-gray-200 dark:border-neutral-700">
                    <h2 class="text-lg font-bold text-gray-900 dark:text-white flex items-center gap-2">
                        <x-bi-sliders class="w-5 h-5 text-indigo-500"/>
                        Configurações
                    </h2>
                </div>
                
                <nav class="flex-1 overflow-y-auto p-4 space-y-1">
                    {{-- Botões da Sidebar (Lógica via JS 'switchTab') --}}
                    
                    <button onclick="switchTab('general')" id="nav-general" class="sidebar-tab-btn active flex items-center w-full px-3 py-2.5 text-sm font-medium rounded-lg transition-colors group">
                        <x-bi-person class="w-5 h-5 mr-3 text-gray-400 group-[.active]:text-indigo-500" />
                        <span class="text-gray-700 dark:text-gray-300 group-[.active]:text-indigo-600 dark:group-[.active]:text-white">Geral</span>
                    </button>

                    <button onclick="switchTab('security')" id="nav-security" class="sidebar-tab-btn flex items-center w-full px-3 py-2.5 text-sm font-medium rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-neutral-800 transition-colors group">
                        <x-bi-shield-lock class="w-5 h-5 mr-3 text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300" />
                        Segurança
                    </button>

                    <button onclick="switchTab('notifications')" id="nav-notifications" class="sidebar-tab-btn flex items-center w-full px-3 py-2.5 text-sm font-medium rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-neutral-800 transition-colors group">
                        <x-bi-bell class="w-5 h-5 mr-3 text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300" />
                        Notificações
                    </button>

                    {{-- <button onclick="switchTab('plan')" id="nav-plan" class="sidebar-tab-btn flex items-center w-full px-3 py-2.5 text-sm font-medium rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-neutral-800 transition-colors group">
                        <x-bi-box class="w-5 h-5 mr-3 text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300" />
                        Planos
                    </button>

                    <button onclick="switchTab('billing')" id="nav-billing" class="sidebar-tab-btn flex items-center w-full px-3 py-2.5 text-sm font-medium rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-neutral-800 transition-colors group">
                        <x-bi-credit-card class="w-5 h-5 mr-3 text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300" />
                        Cobrança
                    </button>

                    <button onclick="switchTab('team')" id="nav-team" class="sidebar-tab-btn flex items-center w-full px-3 py-2.5 text-sm font-medium rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-neutral-800 transition-colors group">
                        <x-bi-people class="w-5 h-5 mr-3 text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300" />
                        Membros
                    </button> --}}
                </nav>

                {{-- Footer da Sidebar (Opcional) --}}
                <div class="p-4 border-t border-gray-200 dark:border-neutral-700">
                   <div class="text-xs text-gray-400">v1.0.2 - Core System</div>
                </div>
            </aside>

            {{-- 
               COLUNA 2: ÁREA DE CONTEÚDO (FORMULÁRIOS)
               O conteúdo muda baseado na seleção da sidebar
            --}}
            <main class="flex-1 flex flex-col h-full bg-white dark:bg-neutral-800 overflow-hidden">
                <form action="#" method="POST" class="flex flex-col h-full">
                    
                    {{-- Scroll Area --}}
                    <div class="flex-1 overflow-y-auto p-6 md:p-10 space-y-6">

                        {{-- ================= TAB: GERAL ================= --}}
                        <div id="tab-general" class="tab-content block animate-fade-in">
                            <div class="mb-6 border-b border-gray-200 dark:border-neutral-700 pb-4">
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white">Informações Gerais</h3>
                                <p class="text-sm text-gray-500 mt-1">Atualize sua foto e detalhes pessoais.</p>
                            </div>

                            {{-- Foto de Perfil (Layout Horizontal) --}}
                            <div class="flex items-center gap-6 mb-8">
                                <div class="relative group shrink-0">
                                    <div class="w-24 h-24 rounded-full overflow-hidden border-4 border-gray-50 dark:border-neutral-700 shadow-sm">
                                        <img src="https://ui-avatars.com/api/?name=Usuario+Exemplo&background=4F46E5&color=fff" alt="Foto" class="w-full h-full object-cover">
                                    </div>
                                    <label for="profile_photo" class="absolute bottom-0 right-0 bg-indigo-600 text-white p-1.5 rounded-full cursor-pointer hover:bg-indigo-700 shadow-sm transition-all transform hover:scale-110">
                                        <x-bi-camera class="w-3.5 h-3.5" />
                                    </label>
                                    <input type="file" id="profile_photo" name="profile_photo" class="hidden">
                                </div>
                                <div>
                                    <h4 class="font-medium text-gray-900 dark:text-white">Sua Foto</h4>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1 mb-2">Isso será exibido no seu perfil.</p>
                                    <button type="button" class="text-xs font-medium text-red-500 hover:text-red-700">Remover foto</button>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Primeiro Nome</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <x-bi-person class="text-gray-400" />
                                        </div>
                                        <input type="text" name="nome" value="João" class="pl-10 block w-full rounded-lg border-gray-300 dark:border-neutral-600 bg-gray-50 dark:bg-neutral-900 text-gray-900 dark:text-white focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm p-2.5">
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Sobrenome</label>
                                    <input type="text" name="sobrenome" value="da Silva" class="block w-full rounded-lg border-gray-300 dark:border-neutral-600 bg-gray-50 dark:bg-neutral-900 text-gray-900 dark:text-white focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm p-2.5">
                                </div>
                            </div>

                            {{-- SEÇÃO DE TEMA (SOLICITADA) --}}
                            <div class="mt-8 pt-6 border-t border-gray-200 dark:border-neutral-700">
                                <h4 class="text-base font-semibold text-gray-900 dark:text-white mb-4">Aparência</h4>
                                <div class="flex items-center justify-between p-4 bg-gray-50 dark:bg-neutral-900 rounded-lg border border-gray-200 dark:border-neutral-700">
                                    <div class="flex items-center gap-3">
                                        <div class="p-2 bg-indigo-100 dark:bg-indigo-900/30 rounded-lg text-indigo-600 dark:text-indigo-400">
                                            <x-bi-moon class="w-5 h-5" />
                                        </div>
                                        <div>
                                            <p class="font-medium text-gray-900 dark:text-white text-sm">Modo Escuro</p>
                                            <p class="text-xs text-gray-500">Alternar entre tema claro e escuro</p>
                                        </div>
                                    </div>
                                    {{-- Toggle Switch --}}
                                    <label class="ui-switch relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" class="theme-toggle-input sr-only peer">
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-300 dark:peer-focus:ring-indigo-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-indigo-600"></div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        {{-- ================= TAB: SEGURANÇA ================= --}}
                        <div id="tab-security" class="tab-content hidden animate-fade-in">
                            <div class="mb-6 border-b border-gray-200 dark:border-neutral-700 pb-4">
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white">Login e Segurança</h3>
                                <p class="text-sm text-gray-500 mt-1">Gerencie sua senha e acesso à conta.</p>
                            </div>

                            <div class="space-y-5">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email de Acesso</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <x-bi-envelope class="text-gray-400" />
                                        </div>
                                        <input type="email" name="email" class="pl-10 block w-full rounded-lg border-gray-300 dark:border-neutral-600 bg-gray-50 dark:bg-neutral-900 text-gray-900 dark:text-white focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm p-2.5" placeholder="seu@email.com">
                                    </div>
                                </div>

                                <div class="border-t border-gray-100 dark:border-neutral-700 my-4"></div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nova Senha</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <x-bi-lock class="text-gray-400" />
                                        </div>
                                        <input type="password" name="password" class="pl-10 block w-full rounded-lg border-gray-300 dark:border-neutral-600 bg-gray-50 dark:bg-neutral-900 text-gray-900 dark:text-white focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm p-2.5" placeholder="••••••••">
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Confirmar Senha</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <x-bi-lock-fill class="text-gray-400" />
                                        </div>
                                        <input type="password" name="password_confirmation" class="pl-10 block w-full rounded-lg border-gray-300 dark:border-neutral-600 bg-gray-50 dark:bg-neutral-900 text-gray-900 dark:text-white focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm p-2.5" placeholder="••••••••">
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- ================= TABS PLACEHOLDER (OUTROS) ================= --}}
                        <div id="tab-notifications" class="tab-content hidden animate-fade-in">
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Notificações</h3>
                            <div class="p-4 bg-yellow-50 dark:bg-yellow-900/20 text-yellow-800 dark:text-yellow-200 rounded-lg text-sm border border-yellow-200 dark:border-yellow-800">
                                Conteúdo de notificações aqui...
                            </div>
                        </div>

                        <div id="tab-plan" class="tab-content hidden animate-fade-in">
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Meu Plano</h3>
                            <div class="p-4 bg-blue-50 dark:bg-blue-900/20 text-blue-800 dark:text-blue-200 rounded-lg text-sm border border-blue-200 dark:border-blue-800">
                                Detalhes do plano aqui...
                            </div>
                        </div>
                        
                        <div id="tab-billing" class="tab-content hidden animate-fade-in">
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Cobrança e Faturas</h3>
                            <div class="p-4 bg-green-50 dark:bg-green-900/20 text-green-800 dark:text-green-200 rounded-lg text-sm border border-green-200 dark:border-green-800">
                                Histórico de faturas aqui...
                            </div>
                        </div>

                        <div id="tab-team" class="tab-content hidden animate-fade-in">
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Membros da Equipe</h3>
                            <div class="p-4 bg-purple-50 dark:bg-purple-900/20 text-purple-800 dark:text-purple-200 rounded-lg text-sm border border-purple-200 dark:border-purple-800">
                                Lista de usuários aqui...
                            </div>
                        </div>

                    </div>

                    {{-- Footer (Botões de Ação) - Fixo no rodapé da área de conteúdo --}}
                    <div class="p-6 border-t border-gray-200 dark:border-neutral-700 bg-gray-50 dark:bg-[#0f1115] flex justify-end gap-3">
                        <button type="button" onclick="closeModal('profileModal')" class="px-4 py-2 border border-gray-300 dark:border-neutral-600 rounded-lg text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-white dark:hover:bg-neutral-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors shadow-sm">
                            Cancelar
                        </button>
                        <button type="submit" class="px-5 py-2 text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:outline-none focus:ring-indigo-200 dark:focus:ring-indigo-900 font-medium rounded-lg text-sm text-center shadow-md transition-all hover:shadow-lg">
                            Salvar Alterações
                        </button>
                    </div>

                </form>
            </main>
        </div>
    </div>
</div>

<style>
    /* Estilos auxiliares para a sidebar ativa */
    .sidebar-tab-btn.active {
        background-color: #F3F4F6; /* gray-100 */
    }
    .dark .sidebar-tab-btn.active {
        background-color: #262626; /* neutral-800 */
    }
    
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(5px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in {
        animation: fadeIn 0.3s ease-out forwards;
    }
</style>

{{-- SCRIPT PARA CONTROLE DA MODAL E TABS --}}
<script>
    function openModal(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
    }

    function closeModal(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
    }

    // Função para alternar abas da sidebar
    function switchTab(tabName) {
        // 1. Esconde todos os conteúdos
        const contents = document.querySelectorAll('.tab-content');
        contents.forEach(content => content.classList.add('hidden'));

        // 2. Mostra o conteúdo selecionado
        const selectedContent = document.getElementById('tab-' + tabName);
        if (selectedContent) {
            selectedContent.classList.remove('hidden');
        }

        // 3. Atualiza estilos dos botões da sidebar
        const buttons = document.querySelectorAll('.sidebar-tab-btn');
        buttons.forEach(btn => {
            btn.classList.remove('active');
            // Remove cores ativas de texto/ícone (reset para padrão)
            const icon = btn.querySelector('svg');
            const text = btn.querySelector('span'); // span pode não existir em todos se mudar layout, mas aqui existe
            
            // O CSS .group-[.active] cuida da maior parte, mas removemos a classe 'active'
        });

        // Adiciona active ao botão clicado
        const activeBtn = document.getElementById('nav-' + tabName);
        if (activeBtn) {
            activeBtn.classList.add('active');
        }
    }
</script>