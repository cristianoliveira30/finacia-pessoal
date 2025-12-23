<nav class="relative top-0 z-50 w-full bg-neutral-900 dark:bg-neutral-900 border-b border-default">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start rtl:justify-end">
                {{-- BOTÃO ÚNICO PARA ABRIR/COLAPSAR O SIDEBAR (MOBILE + DESKTOP) --}}
                <button id="header-sidebar-toggle" type="button" aria-expanded="false"
                    class="text-white  box-border border border-transparent
           hover:bg-neutral-secondary-medium dark:focus:outline-2 dark:focus:outline-offset-2 dark:focus:ring-neutral-tertiary
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
                                @php
                                    // Dá pra deixar isso aqui ou mover pra dentro do modal.
                                    // Aqui só pra exibir o badge no sino.
                                    $notificacoesFake = [
                                        [
                                            'area' => 'Educação',
                                            'icon' => 'mortarboard-fill',
                                            'title' => 'Matrículas atualizadas',
                                            'msg' => 'Novas matrículas registradas e painel recalculado.',
                                            'time' => 'há 5 min',
                                            'unread' => true,
                                        ],
                                        [
                                            'area' => 'Finanças',
                                            'icon' => 'cash-coin',
                                            'title' => 'Relatório publicado',
                                            'msg' => 'Relatório financeiro do mês disponível para consulta.',
                                            'time' => 'há 18 min',
                                            'unread' => true,
                                        ],
                                        [
                                            'area' => 'Saúde',
                                            'icon' => 'heart-pulse-fill',
                                            'title' => 'Atendimentos sincronizados',
                                            'msg' => 'Atualização concluída com sucesso.',
                                            'time' => 'há 32 min',
                                            'unread' => false,
                                        ],
                                        [
                                            'area' => 'Finanças',
                                            'icon' => 'file-earmark-text-fill',
                                            'title' => 'CAPEX registrado',
                                            'msg' => 'Novo lançamento de CAPEX (Obras/Equipamentos).',
                                            'time' => 'há 1 h',
                                            'unread' => true,
                                        ],
                                        [
                                            'area' => 'Educação',
                                            'icon' => 'book-fill',
                                            'title' => 'Frequência consolidada',
                                            'msg' => 'Frequência semanal pronta para análise.',
                                            'time' => 'há 2 h',
                                            'unread' => false,
                                        ],
                                        [
                                            'area' => 'Saúde',
                                            'icon' => 'capsule-pill',
                                            'title' => 'Estoque atualizado',
                                            'msg' => 'Movimentações de insumos registradas no sistema.',
                                            'time' => 'há 3 h',
                                            'unread' => true,
                                        ],
                                    ];

                                    $unreadCount = collect($notificacoesFake)->where('unread', true)->count();
                                @endphp

                                <button type="button"
                                    class="inline-flex items-center w-full p-2 rounded hover:bg-neutral-tertiary-medium hover:text-heading"
                                    data-modal-target="notifications-modal" data-modal-toggle="notifications-modal"
                                    aria-controls="notifications-modal" aria-haspopup="dialog"
                                    aria-label="Notificações">

                                    <x-bi-bell class="w-5 h-5" />
                                    <span class="ml-2">Notificações</span>

                                    @if ($unreadCount > 0)
                                        <span
                                            class="ml-auto inline-flex items-center justify-center text-xs font-semibold
                         h-5 min-w-[1.25rem] px-1.5 rounded-full bg-rose-600 text-white">
                                            {{ $unreadCount }}
                                        </span>
                                    @endif
                                </button>
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
@php
    // Se você já definiu $notificacoesFake acima, pode remover esse bloco.
    // Aqui deixo novamente pra ficar “do zero” e independente.
    $notificacoesFake ??= [
        ['area' => 'Educação', 'icon' => 'mortarboard-fill', 'title' => 'Matrículas atualizadas', 'msg' => 'Novas matrículas registradas e painel recalculado.', 'time' => 'há 5 min', 'unread' => true],
        ['area' => 'Finanças', 'icon' => 'cash-coin', 'title' => 'Relatório publicado', 'msg' => 'Relatório financeiro do mês disponível para consulta.', 'time' => 'há 18 min', 'unread' => true],
        ['area' => 'Saúde', 'icon' => 'heart-pulse-fill', 'title' => 'Atendimentos sincronizados', 'msg' => 'Atualização concluída com sucesso.', 'time' => 'há 32 min', 'unread' => false],
        ['area' => 'Finanças', 'icon' => 'file-earmark-text-fill', 'title' => 'CAPEX registrado', 'msg' => 'Novo lançamento de CAPEX (Obras/Equipamentos).', 'time' => 'há 1 h', 'unread' => true],
        ['area' => 'Educação', 'icon' => 'book-fill', 'title' => 'Frequência consolidada', 'msg' => 'Frequência semanal pronta para análise.', 'time' => 'há 2 h', 'unread' => false],
        ['area' => 'Saúde', 'icon' => 'capsule-pill', 'title' => 'Estoque atualizado', 'msg' => 'Movimentações de insumos registradas no sistema.', 'time' => 'há 3 h', 'unread' => true],
        ['area' => 'Saúde', 'icon' => 'hospital-fill', 'title' => 'Fila de regulação', 'msg' => 'Atualização de status em solicitações pendentes.', 'time' => 'há 6 h', 'unread' => false],
        ['area' => 'Finanças', 'icon' => 'graph-up-arrow', 'title' => 'Indicadores atualizados', 'msg' => 'KPIs financeiros recalculados com os dados mais recentes.', 'time' => 'ontem', 'unread' => false],
    ];

    $tagClass = fn($area) => match ($area) {
        'Educação' => 'bg-emerald-600 text-white',
        'Finanças' => 'bg-amber-600 text-white',
        'Saúde' => 'bg-rose-600 text-white',
        default => 'bg-slate-600 text-white',
    };
@endphp

<div id="notifications-modal" tabindex="-1" aria-hidden="true"
     class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50
            justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-xl max-h-full">
        <div class="relative bg-white dark:bg-slate-900 rounded-lg shadow border border-slate-200 dark:border-slate-700">

            {{-- Header --}}
            <div class="flex items-center justify-between p-4 border-b border-slate-200 dark:border-slate-700">
                <div class="flex items-center gap-2">
                    <x-bi-bell class="w-5 h-5 text-slate-700 dark:text-slate-200" />
                    <h3 class="text-lg font-semibold text-slate-900 dark:text-slate-100">
                        Notificações
                    </h3>
                </div>

                <button type="button"
                        class="text-slate-400 hover:text-slate-900 dark:hover:text-white
                               rounded-lg text-sm w-9 h-9 inline-flex justify-center items-center"
                        data-modal-hide="notifications-modal"
                        aria-label="Fechar">
                    <x-bi-x-lg class="w-4 h-4" />
                </button>
            </div>

            {{-- Body --}}
            <div class="p-4 max-h-[60vh] overflow-y-auto scrollbar-hide">
                @if(empty($notificacoesFake))
                    <div class="text-sm text-slate-600 dark:text-slate-300">
                        Sem notificações no momento.
                    </div>
                @else
                    <ul class="space-y-2">
                        @foreach($notificacoesFake as $n)
                            <li class="p-3 rounded-lg border border-slate-200 dark:border-slate-700
                                       hover:bg-slate-50 dark:hover:bg-slate-800 transition">
                                <div class="flex items-start gap-3">
                                    <x-dynamic-component :component="'bi-'.$n['icon']" class="w-4 h-4 mt-0.5 shrink-0" />

                                    <div class="min-w-0 flex-1">
                                        <div class="flex items-center gap-2">
                                            <span class="text-sm font-semibold text-slate-900 dark:text-slate-100">
                                                {{ $n['title'] }}
                                            </span>

                                            <span class="text-[11px] px-2 py-0.5 rounded-full {{ $tagClass($n['area']) }}">
                                                {{ $n['area'] }}
                                            </span>

                                            @if(!empty($n['unread']))
                                                <span class="ml-auto h-2 w-2 rounded-full bg-sky-500" title="Não lida"></span>
                                            @else
                                                <span class="ml-auto text-[11px] text-slate-500 dark:text-slate-400">
                                                    {{ $n['time'] }}
                                                </span>
                                            @endif
                                        </div>

                                        <p class="text-xs text-slate-600 dark:text-slate-300 mt-1">
                                            {{ $n['msg'] }}
                                        </p>

                                        <div class="text-[11px] text-slate-500 dark:text-slate-400 mt-1">
                                            {{ $n['time'] }}
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
</div>
