<nav id="app-header"
    class="fixed top-0 inset-x-0 z-50 h-16 w-full bg-neutral-900 dark:bg-neutral-900 border-b border-default">
    <div class="h-full px-3 lg:px-5 lg:pl-3">
        <div class="h-full flex items-center justify-between">
            <div class="flex items-center justify-start rtl:justify-end">
                <button id="header-sidebar-toggle" type="button" aria-expanded="false"
                    class="text-heading bg-neutral-200 box-border border border-transparent
           hover:bg-slate-300 dark:focus:outline-2 dark:focus:outline-offset-2 dark:focus:ring-neutral-tertiary
           font-medium leading-5 rounded-base text-sm p-2 focus:outline-none mr-2">
                    <span class="sr-only">Alternar sidebar</span>
                    {{-- Já estava como componente, mantido --}}
                    <x-bi-justify-left class="w-6 h-6"/>
                </button>

                <a href="{{ route('home') }}" class="flex ms-2 md:me-6 me-2 items-center">
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
                        <span id="tipotempo-label" class="whitespace-nowrap">Hoje</span>
                        <svg class="w-2.5 h-2.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
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
                            {{-- FOTO DE PERFIL DINÂMICA --}}
                            <img class="w-8 h-8 rounded-full object-cover block"
                                src="{{ auth()->user()->profile_photo_url ?? 'https://ui-avatars.com/api/?name='.urlencode(auth()->user()->name).'&background=E2E8F0&color=64748B' }}"
                                alt="Foto de {{ Auth::user()->name }}">
                                
                            <span id="notif-avatar-badge"
                                class="hidden absolute -top-1 -right-1 min-w-[18px] h-[18px] px-1 rounded-full bg-rose-600 text-white text-[11px] flex items-center justify-center ring-2 ring-gray-800 dark:ring-gray-800">
                            </span>
                        </span>
                    </button>

                    <div id="dropdown-user"
                        class="absolute right-0 mt-2 z-50 hidden w-56
                               bg-neutral-primary-medium border border-default-medium rounded-base shadow-lg">
                        <div class="px-4 py-3 border-b border-default-medium" role="none">
                            <p class="text-sm font-medium text-heading" role="none">{{ Auth::user()->name }}</p>
                            <p class="text-sm text-body truncate" role="none">{{ Auth::user()->email }}</p>
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
                                <button type="button"
                                    class="inline-flex items-center w-full p-2 rounded hover:bg-neutral-tertiary-medium hover:text-heading"
                                    data-modal-target="notifications-modal" data-modal-toggle="notifications-modal"
                                    aria-controls="notifications-modal" aria-haspopup="dialog"
                                    aria-label="Notificações">
                                    <x-bi-bell class="w-5 h-5" />
                                    <span class="ml-2">Notificações</span>
                                    <span id="notif-menu-badge"
                                        class="hidden ml-auto text-xs font-semibold h-5 min-w-[1.25rem] px-1.5 rounded-full bg-rose-600 text-white inline-flex items-center justify-center"></span>
                                </button>
                            </li>

                            <li>
                                {{-- APLICAÇÃO: Ícone + Gatilho da Modal --}}
                                <a href="{{ route('configuracoes')}}"
                                    class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded"
                                    role="menuitem">Configurações</a>
                            </li>

                            <li>
                                <a href="{{ route('logout') }}"
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

{{-- Modal (Flowbite) - O restante do arquivo permanece idêntico --}}
<div id="notifications-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50
           justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">

    <div class="relative p-4 w-full max-w-3xl max-h-full">
        <div
            class="relative bg-white dark:bg-slate-900 rounded-lg shadow border border-slate-200 dark:border-slate-700 overflow-hidden">

            {{-- HEADER --}}
            <div class="flex items-center justify-between p-4 border-b border-slate-200 dark:border-slate-700">
                <div class="flex items-center gap-2">
                    <x-bi-bell class="w-5 h-5 text-slate-700 dark:text-slate-200" />
                    <h3 class="text-lg font-semibold text-slate-900 dark:text-slate-100">Central de Notificações</h3>
                </div>
                
                <nav class="flex-1 overflow-y-auto p-4 space-y-1">
                    {{-- Botões da Sidebar (Lógica via JS 'switchTab') --}}
                    
                    <button onclick="switchTab('general')" id="nav-general" class="sidebar-tab-btn active flex items-center w-full px-3 py-2.5 text-sm font-medium rounded-lg transition-colors group">
                        <x-bi-person class="w-5 h-5 mr-3 text-gray-400 group-[.active]:text-indigo-500" />
                        <span class="text-gray-700 dark:text-gray-300 group-[.active]:text-indigo-600 dark:group-[.active]:text-white">Geral</span>
                    </button>

                <div class="flex items-center gap-2">
                    {{-- Tabs --}}
                    <div class="inline-flex rounded-lg border border-slate-200 dark:border-slate-700 overflow-hidden">
                        <button type="button" data-notif-tab="inbox"
                            class="px-3 py-1.5 text-xs md:text-sm font-semibold
                                   bg-slate-100 text-slate-900
                                   dark:bg-slate-800 dark:text-slate-100">
                            Recebidas
                        </button>
                        <button type="button" data-notif-tab="send"
                            class="px-3 py-1.5 text-xs md:text-sm font-semibold
                                   bg-white text-slate-600 hover:bg-slate-50
                                   dark:bg-slate-900 dark:text-slate-300 dark:hover:bg-slate-800">
                            Enviar
                        </button>
                    </div>

                    <button type="button"
                        class="text-slate-400 hover:text-slate-900 dark:hover:text-white rounded-lg text-sm w-9 h-9 inline-flex items-center justify-center hover:bg-slate-100 dark:hover:bg-slate-800"
                        data-modal-hide="notifications-modal" aria-label="Fechar">
                        <x-bi-x-lg class="w-4 h-4" />
                    </button>
                </div>
            </div>

            {{-- BODY --}}
            <div class="p-4">
                {{-- ABA: RECEBIDAS --}}
                <section data-notif-panel="inbox">
                    <div class="max-h-[60vh] overflow-y-auto scrollbar-hide">
                        <ul class="space-y-2" id="notifications-list">
                            @php
                                // Quando tiver backend, o controller passa $notifications.
                                // Se não vier nada, usa fake.
                                $notifications = $notifications ?? [
                                    [
                                        'id' => 1,
                                        'title' => 'Relatório publicado',
                                        'message' => 'Financeiro atualizado. Confira o relatório.',
                                        'time' => 'agora',
                                        'unread' => true,
                                        'flag_text' => 'Urgente',
                                        'flag_color' => 'rose',
                                        'url' => '/financeiro/relatorios',
                                        'read_url' => '', // depois: route('notifications.read', 1)
                                    ],
                                    [
                                        'id' => 2,
                                        'title' => 'Atualização',
                                        'message' => 'Entraram 12 registros novos.',
                                        'time' => '2h',
                                        'unread' => true,
                                        'flag_text' => 'Info',
                                        'flag_color' => 'sky',
                                        'url' => '/geral/home',
                                        'read_url' => '',
                                    ],
                                    [
                                        'id' => 3,
                                        'title' => 'Reunião',
                                        'message' => 'Hoje às 15:00 (sala 2).',
                                        'time' => 'ontem',
                                        'unread' => false,
                                        'flag_text' => '',
                                        'flag_color' => 'slate',
                                        'url' => '',
                                        'read_url' => '',
                                    ],
                                ];

                                $flagClass = [
                                    'sky' => 'bg-sky-100 text-sky-800 dark:bg-sky-900/30 dark:text-sky-200',
                                    'emerald' =>
                                        'bg-emerald-100 text-emerald-800 dark:bg-emerald-900/30 dark:text-emerald-200',
                                    'amber' => 'bg-amber-100 text-amber-900 dark:bg-amber-900/30 dark:text-amber-200',
                                    'rose' => 'bg-rose-100 text-rose-900 dark:bg-rose-900/30 dark:text-rose-200',
                                    'violet' =>
                                        'bg-violet-100 text-violet-900 dark:bg-violet-900/30 dark:text-violet-200',
                                    'slate' => 'bg-slate-100 text-slate-800 dark:bg-slate-800 dark:text-slate-100',
                                ];
                            @endphp

                            @foreach ($notifications as $n)
                                @php
                                    $unread = !empty($n['unread']);
                                    $flagText = trim($n['flag_text'] ?? '');
                                    $flagColor = $n['flag_color'] ?? 'slate';
                                    $readUrl = $n['read_url'] ?? '';
                                    $url = $n['url'] ?? '';
                                @endphp

                                <li>
                                    <button type="button"
                                        class="notif-item w-full text-left rounded-xl border border-slate-200 bg-white p-3
                                             hover:bg-slate-50 dark:bg-slate-900 dark:border-slate-700 dark:hover:bg-slate-800 transition"
                                        data-notif-id="{{ $n['id'] }}"
                                        data-unread-default="{{ $unread ? '1' : '0' }}"
                                        data-read-url="{{ $readUrl }}" data-url="{{ $url }}">
                                        <div class="flex items-start gap-3">
                                            <span data-notif-dot
                                                class="mt-1.5 w-2 h-2 rounded-full bg-sky-50 {{ $unread ? '' : 'hidden' }}"></span>

                                            <div class="min-w-0 flex-1">
                                                <div class="flex items-center gap-2">
                                                    <div
                                                        class="font-semibold text-slate-900 dark:text-slate-100 truncate">
                                                        {{ $n['title'] ?? '' }}
                                                    </div>

                                                    @if ($flagText !== '')
                                                        <span
                                                            class="shrink-0 inline-flex items-center rounded-full px-2.5 py-1 text-xs font-semibold
                           {{ $flagClass[$flagColor] ?? $flagClass['slate'] }}">
                                                            {{ $flagText }}
                                                        </span>
                                                    @endif

                                                    <div class="ml-auto text-xs text-slate-500 dark:text-slate-400">
                                                        {{ $n['time'] ?? '' }}
                                                    </div>
                                                </div>

                                                <div class="mt-1 text-sm text-slate-600 dark:text-slate-200">
                                                    {{ $n['message'] ?? '' }}
                                                </div>
                                            </div>
                                        </div>
                                    </button>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </section>
                <section data-notif-panel="send" class="hidden">
                    <form id="send-notification-form" method="POST" action="#">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">

                            {{-- Destino (cards com ícones) --}}
                            <div class="md:col-span-2">
                                <label class="block text-xs font-semibold text-slate-700 dark:text-slate-200 mb-1">
                                    Enviar para
                                </label>

                                <div class="grid grid-cols-1 sm:grid-cols-3 gap-2" id="notif-destino-group">

                                    {{-- Todos --}}
                                    <label class="cursor-pointer">
                                        <input class="sr-only peer" type="radio" name="destino" value="todos"
                                            checked>
                                        <div
                                            class="rounded-xl border border-slate-200 bg-white p-3 hover:bg-slate-50 transition
                                           dark:bg-slate-900 dark:border-slate-700 dark:hover:bg-slate-800
                                           peer-checked:border-sky-500 peer-checked:ring-2 peer-checked:ring-sky-500/20">
                                            <div class="flex items-center gap-2">
                                                <x-bi-people class="w-5 h-5" />
                                                <div class="text-sm font-semibold text-slate-900 dark:text-slate-100">
                                                    Todos</div>
                                            </div>
                                        </div>
                                    </label>

                                    {{-- Por setor --}}
                                    <label class="cursor-pointer">
                                        <input class="sr-only peer" type="radio" name="destino" value="setor">
                                        <div
                                            class="rounded-xl border border-slate-200 bg-white p-3  hover:bg-slate-50 transition dark:bg-slate-900 dark:border-slate-700 dark:hover:bg-slate-800
                                                   peer-checked:border-sky-500 peer-checked:ring-2 peer-checked:ring-sky-500/20">
                                            <div class="flex items-center gap-2">
                                                <x-bi-diagram-3 class="w-5 h-5" />
                                                <div class="text-sm font-semibold text-slate-900 dark:text-slate-100">
                                                    Por setor</div>
                                            </div>

                                        </div>
                                    </label>

                                    {{-- Usuário específico --}}
                                    <label class="cursor-pointer">
                                        <input class="sr-only peer" type="radio" name="destino" value="usuario">
                                        <div
                                            class="rounded-xl border border-slate-200 bg-white p-3 hover:bg-slate-50 transition dark:bg-slate-900 dark:border-slate-700 dark:hover:bg-slate-800 peer-checked:border-sky-500 peer-checked:ring-2 peer-checked:ring-sky-500/20">
                                            <div class="flex items-center gap-2">
                                                <x-bi-person class="w-5 h-5 " />
                                                <div class="text-sm font-semibold text-slate-900 dark:text-slate-100">
                                                    Usuário</div>
                                            </div>
                                        </div>
                                    </label>

                                </div>
                            </div>
                            {{-- Setores (DESTINO) - só quando destino = setor --}}
                            <div id="notif-setores-wrap" class="hidden md:col-span-2">
                                <label class="block text-xs font-semibold text-slate-700 dark:text-slate-200 mb-1">
                                    Setores (destino)
                                </label>
                                <div class="relative">
                                    {{-- “Input” clicável --}}
                                    <button type="button" id="notif-setores-btn"
                                        class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm text-slate-700 dark:bg-slate-900 dark:border-slate-700 dark:text-slate-100 flex items-center justify-between gap-2 hover:bg-slate-50 dark:hover:bg-slate-800">
                                        <span id="notif-setores-label" class="truncate">Selecione um ou mais
                                            setores…</span>
                                        <x-bi-chevron-down class="w-4 h-4" />
                                    </button>
                                    {{-- Dropdown --}}
                                    <div id="notif-setores-menu"
                                        class="hidden absolute left-0 mt-2 w-full z-[70] bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-700 rounded-lg shadow-xl overflow-hidden">
                                        @php
                                            $setores = [
                                                'Finanças',
                                                'Educação',
                                                'Saúde',
                                                'Obras',
                                                'Ouvidoria',
                                                'Assistência',
                                            ];

                                            $setorColors = [
                                                'Finanças' =>
                                                    'bg-emerald-100 text-emerald-800 dark:bg-emerald-900/30 dark:text-emerald-200',
                                                'Educação' =>
                                                    'bg-sky-100 text-sky-800 dark:bg-sky-900/30 dark:text-sky-200',
                                                'Saúde' =>
                                                    'bg-rose-100 text-rose-800 dark:bg-rose-900/30 dark:text-rose-200',
                                                'Obras' =>
                                                    'bg-amber-100 text-amber-800 dark:bg-amber-900/30 dark:text-amber-200',
                                                'Ouvidoria' =>
                                                    'bg-violet-100 text-violet-800 dark:bg-violet-900/30 dark:text-violet-200',
                                                'Assistência' =>
                                                    'bg-indigo-100 text-indigo-800 dark:bg-indigo-900/30 dark:text-indigo-200',
                                            ];
                                        @endphp

                                        <div class="max-h-56 overflow-y-auto p-2 scrollbar-hide">
                                            <div class="flex flex-wrap gap-2">
                                                @foreach ($setores as $s)
                                                    <label class="cursor-pointer">
                                                        {{-- checkbox “real”, mas invisível (usa peer pra estilizar a pill) --}}
                                                        <input type="checkbox"
                                                            class="sr-only peer notif-setor-checkbox" name="setores[]"
                                                            value="{{ $s }}">

                                                        {{-- SOMENTE A OPÇÃO COLORIDA --}}
                                                        <span
                                                            class="inline-flex items-center rounded-full px-3 py-1 text-xs font-semibold select-none transition
                                                                                          {{ $setorColors[$s] ?? 'bg-slate-100 text-slate-700 dark:bg-slate-800 dark:text-slate-200' }}
                                                                                           peer-checked:ring-2 peer-checked:ring-slate-900/15 dark:peer-checked:ring-white/20 peer-checked:scale-[1.02]">
                                                            {{ $s }}
                                                        </span>
                                                    </label>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div
                                            class="flex items-center justify-between gap-2 p-2 border-t border-slate-200 dark:border-slate-700">
                                            <button type="button" id="notif-setores-clear"
                                                class="px-3 py-2 text-sm font-semibold rounded-lg border border-slate-200 text-slate-700 hover:bg-slate-50
                                                           dark:border-slate-700 dark:text-slate-200 dark:hover:bg-slate-800">
                                                Limpar
                                            </button>

                                            <button type="button" id="notif-setores-close"
                                                class="px-3 py-2 text-sm font-semibold rounded-lg bg-sky-600 text-white hover:bg-sky-700">
                                                OK
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                {{-- Chips --}}
                                <div id="notif-setores-chips" class="mt-2 flex flex-wrap gap-1"></div>

                                <p class="mt-1 text-[11px] text-slate-500 dark:text-slate-400">
                                    Dica: você pode escolher vários setores.
                                </p>
                            </div>

                            {{-- Usuário (só quando destino = usuario) --}}
                            <div id="notif-por-usuario" class="hidden md:col-span-2">
                                <label
                                    class="block text-xs font-semibold text-slate-700 dark:text-slate-200 mb-1">Usuário</label>
                                <input name="usuario" type="text" placeholder="ID, nome ou e-mail…"
                                    class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm
                                              dark:bg-slate-900 dark:border-slate-700 dark:text-slate-100" />
                            </div>

                            {{-- Título + Flag (badge ao lado) --}}
                            <div class="md:col-span-2">
                                <label
                                    class="block text-xs font-semibold text-slate-700 dark:text-slate-200 mb-1">Título</label>

                                <div class="flex items-center gap-2">
                                    <input id="notif-title" name="title" type="text" maxlength="80"
                                        placeholder="Ex: Relatório publicado"
                                        class="flex-1 rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm
                                     dark:bg-slate-900 dark:border-slate-700 dark:text-slate-100" />

                                    {{-- Badge da flag (aparece quando definir) --}}
                                    <span id="notif-flag-badge"
                                        class="hidden shrink-0 inline-flex items-center rounded-full px-2.5 py-1 text-xs font-semibold">

                                    </span>
                                </div>
                            </div>
                            {{-- Flag opcional --}}
                            <div class="md:col-span-2">
                                <button type="button" id="notif-flag-toggle"
                                    class="inline-flex items-center gap-2 px-3 py-2 rounded-lg text-sm font-semibold border border-slate-200 text-slate-700 hover:bg-slate-50
                                             dark:border-slate-700 dark:text-slate-200 dark:hover:bg-slate-800">
                                    <x-bi-flag class="w-4 h-4" />
                                </button>

                                <div id="notif-flag-editor"
                                    class="hidden mt-2 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 p-2">
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-3 items-end">

                                        <div class="md:col-span-2">
                                            <label
                                                class="block text-xs font-semibold text-slate-700 dark:text-slate-200 mb-1">
                                                Texto da flag <span
                                                    class="text-[11px] font-normal text-slate-500 dark:text-slate-400">(opcional)</span>
                                            </label>
                                            <input id="notif-flag-text" name="flag_text" type="text"
                                                maxlength="24" placeholder="Ex: Urgente, Atenção…"
                                                class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm dark:bg-slate-950 dark:border-slate-700 dark:text-slate-100" />
                                        </div>

                                        <div>
                                            <label
                                                class="block text-xs font-semibold text-slate-700 dark:text-slate-200 mb-1">
                                                Cor
                                            </label>

                                            <div class="flex flex-wrap gap-2">
                                                @php
                                                    $flagCores = [
                                                        ['v' => 'sky', 'dot' => 'bg-sky-600', 't' => ''],
                                                        ['v' => 'emerald', 'dot' => 'bg-emerald-600', 't' => ''],
                                                        ['v' => 'amber', 'dot' => 'bg-amber-500', 't' => ''],
                                                        ['v' => 'rose', 'dot' => 'bg-rose-600', 't' => ''],
                                                        ['v' => 'violet', 'dot' => 'bg-violet-600', 't' => ''],
                                                    ];
                                                @endphp

                                                @foreach ($flagCores as $c)
                                                    <label class="cursor-pointer" title="{{ $c['t'] }}">
                                                        <input class="sr-only peer" type="radio" name="flag_color"
                                                            value="{{ $c['v'] }}" @checked($loop->first)>
                                                        <span
                                                            class="inline-flex items-center gap-2 px-2.5 py-1 rounded-full text-xs font-semibold border border-slate-200 bg-white text-slate-700
                                                                dark:border-slate-700 dark:bg-slate-950 dark:text-slate-200 peer-checked:ring-2 peer-checked:ring-sky-500/25 peer-checked:border-sky-500">
                                                            <span
                                                                class="w-2.5 h-2.5 rounded-full {{ $c['dot'] }}"></span>
                                                            {{ $c['t'] }}
                                                        </span>
                                                    </label>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-3 flex items-center justify-end gap-2">
                                        <button type="button" id="notif-flag-clear"
                                            class="px-3 py-2 rounded-lg text-sm font-semibold border border-slate-200 text-slate-700 hover:bg-slate-50  dark:border-slate-700 dark:text-slate-200 dark:hover:bg-slate-800">
                                            Remover
                                        </button>

                                        <button type="button" id="notif-flag-done"
                                            class="px-3 py-2 rounded-lg text-sm font-semibold bg-sky-600 text-white hover:bg-sky-700">
                                            OK
                                        </button>
                                    </div>
                                </div>
                            </div>

                            {{-- Mensagem --}}
                            <div class="md:col-span-2">
                                <label
                                    class="block text-xs font-semibold text-slate-700 dark:text-slate-200 mb-1">Mensagem</label>
                                <textarea name="message" rows="4" maxlength="300" placeholder="Escreva a notificação…"
                                    class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm dark:bg-slate-900 dark:border-slate-700 dark:text-slate-100"></textarea>
                            </div>

                            {{-- Link (opcional) --}}
                            <div class="md:col-span-2">
                                <label class="block text-xs font-semibold text-slate-700 dark:text-slate-200 mb-1">Link
                                    (opcional)</label>
                                <input name="url" type="text" placeholder="/financeiro/relatorios"
                                    class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm
                 dark:bg-slate-900 dark:border-slate-700 dark:text-slate-100" />
                            </div>

                        </div>

                        <div class="mt-4 flex items-center justify-end gap-2">
                            <button type="button" data-notif-tab="inbox"
                                class="px-3 py-2 rounded-lg text-sm font-semibold
                             border border-slate-200 text-slate-700 hover:bg-slate-50
                             dark:border-slate-700 dark:text-slate-200 dark:hover:bg-slate-800">
                                Voltar
                            </button>

                            <button type="submit"
                                class="px-4 py-2 rounded-lg text-sm font-semibold bg-sky-600 text-white hover:bg-sky-700">
                                Enviar
                            </button>
                        </div>
                    </form>
                </section>

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
@once
    @push('scripts')
        <script>
            (() => {
                const D = document;
                const hide = (el, v) => el && el.classList.toggle('hidden', !!v);

                const setBadge = (el, n) => {
                    if (!el) return;
                    el.textContent = n ? String(n) : '';
                    el.classList.toggle('hidden', !n);
                };

                const clsOn = ['bg-slate-100', 'text-slate-900', 'dark:bg-slate-800', 'dark:text-slate-100'];
                const clsOff = ['bg-white', 'text-slate-600', 'dark:bg-slate-900', 'dark:text-slate-300'];

                D.addEventListener('DOMContentLoaded', () => {
                    const modal = D.querySelector('#notifications-modal');
                    if (!modal) return;

                    const $ = (s, r = modal) => r.querySelector(s);
                    const $$ = (s, r = modal) => Array.from(r.querySelectorAll(s));

                    /* ===== 1) ABAS ===== */
                    const tabBtns = $$('[data-notif-tab]');
                    const panels = $$('[data-notif-panel]');

                    const activateTab = (tab) => {
                        panels.forEach(p => hide(p, p.dataset.notifPanel !== tab));
                        tabBtns.forEach(b => {
                            const a = b.dataset.notifTab === tab;
                            clsOn.forEach(c => b.classList.toggle(c, a));
                            clsOff.forEach(c => b.classList.toggle(c, !a));
                        });
                    };

                    tabBtns.forEach(b => b.addEventListener('click', () => activateTab(b.dataset.notifTab)));
                    activateTab('inbox');

                    /* ===== 2)
        RECEBIDAS (lidas + backend-ready) ===== */
                    const avatarBadge = D.querySelector('#notif-avatar-badge');
                    const menuBadge = D.querySelector('#notif-menu-badge');
                    const list = $('#notifications-list');
                    const read = new Set();

                    const csrf =
                        D.querySelector('meta[name="csrf-token"]')?.content ||
                        D.querySelector('input[name="_token"]')?.value || '';

                    const renderNotifs = () => {
                        if (!list) return;
                        let unread = 0;

                        $$('.notif-item', list).forEach(el => {
                            const id = el.dataset.notifId;
                            const u = el.dataset.unreadDefault === '1' && id && !read.has(id);

                            unread += u ? 1 : 0;
                            el.classList.toggle('opacity-60', !u);
                            el.querySelector('[data-notif-dot]')?.classList.toggle('hidden', !u);
                        });

                        setBadge(avatarBadge, unread);
                        setBadge(menuBadge, unread);
                    };

                    const persistRead = (item) => {
                        const url = item?.dataset?.readUrl;
                        if (!url || !csrf) return;

                        fetch(url, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': csrf,
                                'Accept': 'application/json'
                            },
                            keepalive: true,
                        }).catch(() => {});
                    };

                    list?.addEventListener('click', (e) => {
                        const item = e.target.closest('.notif-item');
                        const id = item?.dataset?.notifId;

                        if (!item || item.dataset.unreadDefault !== '1' || !id) return;

                        read.add(id);
                        item.dataset.unreadDefault = '0'; // evita reprocessar
                        renderNotifs();
                        persistRead(item);

                        // opcional: navegar após marcar como lida (se você usar data-url)
                        // const go = item.dataset.url;
                        // if (go) window.location.href = go;
                    });

                    renderNotifs();

                    /* ===== 3) ENVIAR (destino + multi-setores) ===== */
                    const destinoSelect = $('#notif-destino'); // fallback se existir
                    const getDestino = () =>
                        (modal.querySelector('input[name="destino"]:checked')?.value) ||
                        (destinoSelect?.value) || 'todos';

                    const onDestinoChange = (fn) => {
                        const radios = $$('input[name="destino"]');
                        if (radios.length) radios.forEach(r => r.addEventListener('change', fn));
                        if (destinoSelect) destinoSelect.addEventListener('change', fn);
                    };

                    const boxUser = $('#notif-por-usuario');
                    const setoresWrap = $('#notif-setores-wrap');
                    const setoresBtn = $('#notif-setores-btn');
                    const setoresMenu = $('#notif-setores-menu');
                    const setoresLbl = $('#notif-setores-label');
                    const setoresChps = $('#notif-setores-chips');
                    const checks = $$('.notif-setor-checkbox');
                    const btnClear = $('#notif-setores-clear');
                    const btnClose = $('#notif-setores-close');

                    const selected = () => checks.filter(c => c.checked).map(c => c.value);
                    const menuClose = () => setoresMenu && setoresMenu.classList.add('hidden');
                    const menuToggle = () => setoresMenu?.classList.contains('hidden') ?
                        setoresMenu.classList.remove('hidden') :
                        setoresMenu.classList.add('hidden');

                    const renderSetores = () => {
                        const sel = selected();
                        if (setoresLbl) setoresLbl.textContent = sel.length ?
                            `${sel.length} selecionado(s): ${sel.join(', ')}` :
                            'Selecione um ou mais setores…';

                        if (setoresChps) {
                            setoresChps.innerHTML = sel.map(v => `
                <button type="button"
                  class="inline-flex items-center gap-1 px-2 py-1 rounded-full text-xs font-semibold
                         bg-slate-100 text-slate-800 hover:bg-slate-200
                         dark:bg-slate-800 dark:text-slate-100 dark:hover:bg-slate-700"
                  data-chip-setor="${v}">
                  <span>${v}</span><span class="opacity-70">✕</span>
                </button>
              `).join('');
                        }
                    };

                    const clearSetores = () => {
                        checks.forEach(c => c.checked = false);
                        renderSetores();
                    };

                    const syncDestino = () => {
                        const v = getDestino();
                        hide(boxUser, v !== 'usuario');
                        hide(setoresWrap, v !== 'setor');
                        if (v !== 'setor') {
                            clearSetores();
                            menuClose();
                        }
                    };

                    onDestinoChange(syncDestino);
                    syncDestino();

                    setoresBtn?.addEventListener('click', (e) => {
                        e.preventDefault();
                        e.stopPropagation();
                        menuToggle();
                    });
                    btnClose?.addEventListener('click', (e) => {
                        e.preventDefault();
                        menuClose();
                    });
                    btnClear?.addEventListener('click', (e) => {
                        e.preventDefault();
                        clearSetores();
                    });

                    checks.forEach(c => c.addEventListener('change', renderSetores));

                    setoresChps?.addEventListener('click', (e) => {
                        const chip = e.target.closest('[data-chip-setor]');
                        if (!chip) return;
                        const v = chip.dataset.chipSetor;
                        const cb = checks.find(c => c.value === v);
                        if (cb) cb.checked = false;
                        renderSetores();
                    });

                    D.addEventListener('click', (e) => {
                        if (!setoresMenu || setoresMenu.classList.contains('hidden')) return;
                        if (setoresMenu.contains(e.target) || setoresBtn?.contains(e.target)) return;
                        menuClose();
                    });

                    D.addEventListener('keydown', (e) => {
                        if (e.key === 'Escape') menuClose();
                    });
                    renderSetores();

                    /* ===== 4) FLAG ===== */
                    const flagToggle = $('#notif-flag-toggle');
                    const flagEditor = $('#notif-flag-editor');
                    const flagText = $('#notif-flag-text');
                    const flagBadge = $('#notif-flag-badge');
                    const flagDone = $('#notif-flag-done');
                    const flagClear = $('#notif-flag-clear');
                    const radiosFlag = $$('input[name="flag_color"]');

                    const flagStyles = {
                        sky: 'bg-sky-100 text-sky-800 dark:bg-sky-900/30 dark:text-sky-200',
                        emerald: 'bg-emerald-100 text-emerald-800 dark:bg-emerald-900/30 dark:text-emerald-200',
                        amber: 'bg-amber-100 text-amber-900 dark:bg-amber-900/30 dark:text-amber-200',
                        rose: 'bg-rose-100 text-rose-900 dark:bg-rose-900/30 dark:text-rose-200',
                        violet: 'bg-violet-100 text-violet-900 dark:bg-violet-900/30 dark:text-violet-200',
                    };

                    const getFlagColor = () =>
                        modal.querySelector('input[name="flag_color"]:checked')?.value ||
                        radiosFlag[0]?.value || '';

                    const clearFlagClasses = () => {
                        if (!flagBadge) return;
                        Object.values(flagStyles).flatMap(c => c.split(' '))
                            .forEach(k => flagBadge.classList.remove(k));
                    };

                    const applyFlag = () => {
                        if (!flagBadge) return;

                        const text = (flagText?.value || '').trim();
                        const color = getFlagColor();

                        clearFlagClasses();
                        flagBadge.textContent = '';

                        if (!text) return hide(flagBadge, true);

                        flagBadge.textContent = text;
                        hide(flagBadge, false);
                        (flagStyles[color] || '').split(' ').filter(Boolean).forEach(k => flagBadge.classList
                            .add(k));
                    };

                    flagToggle?.addEventListener('click', () => hide(flagEditor, !flagEditor?.classList.contains(
                        'hidden')));
                    flagDone?.addEventListener('click', () => {
                        applyFlag();
                        hide(flagEditor, true);
                    });

                    flagClear?.addEventListener('click', () => {
                        if (flagText) flagText.value = '';
                        if (radiosFlag[0]) radiosFlag[0].checked = true;
                        applyFlag();
                        hide(flagEditor, true);
                    });

                    flagText?.addEventListener('input', applyFlag);
                    radiosFlag.forEach(r => r.addEventListener('change', applyFlag));
                    applyFlag();

                    /* ===== 5) SUBMIT ===== */
                    const form = $('#send-notification-form');
                    form?.addEventListener('submit', (e) => {
                        const action = form.getAttribute('action') || '#';
                        const isRealBackend = action && action !== '#';
                        if (isRealBackend) return;

                        e.preventDefault();

                        if (getDestino() === 'setor' && selected().length === 0) {
                            return window.Alerts?.error ?
                                window.Alerts.error('Atenção', 'Selecione pelo menos 1 setor.') :
                                alert('Selecione pelo menos 1 setor.');
                        }

                        window.Alerts?.success ?
                            window.Alerts.success('OK', 'Layout pronto. Agora é só ligar no controller.') :
                            alert('Layout pronto. Agora é só ligar no controller.');

                        activateTab('inbox');
                    });
                });
            })();
        </script>
    @endpush
@endonce
