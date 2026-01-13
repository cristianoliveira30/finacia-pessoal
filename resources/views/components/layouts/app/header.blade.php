@php
// --- MOCK DATA PARA NOTIFICAÇÕES (Simulando o Backend) ---
$notifications = $notifications ?? [
[
'id' => 1,
'title' => 'Relatório Financeiro',
'message' => 'O fechamento mensal foi concluído.',
'time' => '10 min atrás',
'unread' => true,
'flag_text' => 'Importante',
'flag_color' => 'rose',
'read_url' => '#',
],
[
'id' => 2,
'title' => 'Novo Usuário',
'message' => 'Roberto Silva solicitou acesso ao sistema.',
'time' => '1h atrás',
'unread' => true,
'flag_text' => 'Cadastro',
'flag_color' => 'sky',
'read_url' => '#',
],
[
'id' => 3,
'title' => 'Manutenção',
'message' => 'Servidor instável na região norte.',
'time' => 'Ontem',
'unread' => false,
'flag_text' => 'TI',
'flag_color' => 'amber',
'read_url' => '#',
],
];

$flagClass = [
'sky' => 'bg-sky-100 text-sky-800 dark:bg-sky-900/30 dark:text-sky-200 black:bg-sky-900/30 black:text-sky-200',
'emerald' => 'bg-emerald-100 text-emerald-800 dark:bg-emerald-900/30 dark:text-emerald-200 black:bg-emerald-900/30
black:text-emerald-200',
'amber' => 'bg-amber-100 text-amber-900 dark:bg-amber-900/30 dark:text-amber-200 black:bg-amber-900/30
black:text-amber-200',
'rose' => 'bg-rose-100 text-rose-900 dark:bg-rose-900/30 dark:text-rose-200 black:bg-rose-900/30 black:text-rose-200',
'violet' => 'bg-violet-100 text-violet-900 dark:bg-violet-900/30 dark:text-violet-200 black:bg-violet-900/30
black:text-violet-200',
'slate' => 'bg-slate-100 text-slate-800 dark:bg-slate-800 dark:text-slate-100 black:bg-zinc-800 black:text-zinc-200',
];
@endphp

<nav id="app-header" class="fixed top-0 inset-x-0 z-50 h-16 w-full bg-neutral-900 dark:bg-neutral-900 ">
    <div class="h-full px-3 lg:px-5 lg:pl-3">
        <div class="h-full flex items-center justify-between">

            {{-- LADO ESQUERDO --}}
            <div class="flex items-center justify-start rtl:justify-end gap-2">

                {{-- Toggle Sidebar --}}
                <button id="header-sidebar-toggle" type="button" aria-expanded="false"
                    class="text-white box-border border border-transparent hover:bg-neutral-secondary-medium dark:focus:outline-2 dark:focus:outline-offset-2 black:hover:bg-zinc-700 dark:focus:ring-neutral-tertiary font-medium leading-5 rounded-base text-sm p-2 focus:outline-none mr-2">
                    <span class="sr-only">Alternar sidebar</span>
                    {{-- Já estava como componente, mantido --}}
                    <x-bi-justify-left class="w-6 h-6"/>
                </button>

                {{-- Logo --}}
                <a href="{{ route('home') }}" class="flex ms-2 md:me-6 me-2 items-center">
                    <img src="{{ asset('assets/img/belem.png') }}" class="h-6 me-3" alt="Logo" />
                    <span
                        class="self-center text-lg font-semibold whitespace-nowrap text-white dark:text-white">Core</span>
                </a>

                {{-- Filtro de Tempo (Dropdown) --}}
                <div class="relative hidden md:block">
                    <button id="btn-tipotempo" data-dropdown-toggle="dropdown-tipotempo" type="button"
                        class="inline-flex items-center gap-1.5 px-3 py-2 text-xs md:text-sm font-medium rounded-md border bg-neutral-200 text-slate-600 border-slate-200 hover:bg-slate-200 hover:text-slate-900 focus:outline-none focus:ring-2 focus:ring-slate-300 dark:bg-slate-800/80 dark:text-slate-300 dark:border-slate-600 dark:hover:bg-slate-700 dark:hover:text-slate-50 dark:focus:ring-sky-500/40 black:bg-zinc-900 black:border-zinc-700 black:text-zinc-300">
                        <span id="tipotempo-label" class="whitespace-nowrap">Hoje</span>
                        <svg class="w-2.5 h-2.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>

                    <div id="dropdown-tipotempo"
                        class="z-20 hidden mt-2 bg-white divide-y divide-slate-100 rounded-lg shadow-lg w-44 border border-slate-100 dark:bg-slate-800 dark:divide-slate-700 dark:border-slate-700 black:bg-zinc-900 black:border-zinc-800 black:divide-zinc-800">
                        <ul class="py-2 text-sm text-slate-700 dark:text-slate-200 black:text-zinc-300"
                            aria-labelledby="btn-tipotempo">
                            <li>
                                <a href="#" data-tempo="hoje"
                                    class="block px-4 py-2 hover:bg-slate-50 dark:hover:bg-slate-700/70 black:hover:bg-zinc-800">Hoje
                                </a>
                            </li>
                            <li>
                                <a href="#" data-tempo="ontem"
                                    class="block px-4 py-2 hover:bg-slate-50 dark:hover:bg-slate-700/70 black:hover:bg-zinc-800">Ontem
                                </a>
                            </li>
                            <li>
                                <a href="#" data-tempo="semana-atual"
                                    class="block px-4 py-2 hover:bg-slate-50 dark:hover:bg-slate-700/70 black:hover:bg-zinc-800">Semana
                                    Atual
                                </a>
                            </li>
                            <li>
                                <a href="#" data-tempo="mes-atual"
                                    class="block px-4 py-2 hover:bg-slate-50 dark:hover:bg-slate-700/70 black:hover:bg-zinc-800">Mês
                                    Atual
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                    onclick="document.getElementById('modalPeriodo').classList.remove('hidden'); return false;"
                                    data-tempo="periodo"
                                    class="block px-4 py-2 hover:bg-slate-50 dark:hover:bg-slate-700/70 black:hover:bg-zinc-800 text-sky-600 dark:text-sky-400 font-medium">
                                    Período Personalizado
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            {{-- LADO DIREITO --}}
            <div class="flex items-center">
                <div class="relative ms-3">

                    {{-- Botão Avatar --}}
                    <button type="button"
                        class="flex text-sm bg-gray-800 rounded-full focus:ring-2 focus:ring-gray-300 dark:focus:ring-gray-600"
                        aria-expanded="false" data-dropdown-toggle="dropdown-user" data-dropdown-placement="bottom-end">
                        <span class="sr-only">Menu Usuário</span>
                        <span class="relative inline-block leading-none">
                            {{-- LOGICA DE EXIBIÇÃO DA FOTO NO HEADER --}}
                            @php
                            $profilePhotoUrl = Auth::user()->profile_photo_path
                            ? Storage::url(Auth::user()->profile_photo_path)
                            :
                            'https://ui-avatars.com/api/?name='.urlencode(Auth::user()->name).'&background=E2E8F0&color=64748B';
                            @endphp
                            <img class="w-8 h-8 rounded-full object-cover block" src="{{ $profilePhotoUrl }}"
                                alt="user photo">

                            {{-- Badge Avatar --}}
                            <span id="notif-avatar-badge"
                                class="hidden absolute -top-1 -right-1 min-w-[18px] h-[18px] px-1 rounded-full bg-rose-600 text-white text-[11px] flex items-center justify-center ring-2 ring-gray-800 dark:ring-gray-800"></span>
                        </span>
                    </button>

                    {{-- Dropdown Usuário --}}
                    <div id="dropdown-user"
                        class="absolute right-0 mt-2 z-50 hidden w-56 bg-white border border-slate-200 rounded-lg shadow-xl dark:bg-slate-800 dark:border-slate-700 black:bg-zinc-900 black:border-zinc-800">
                        <div class="px-4 py-3 border-b border-default-medium dark:border-slate-700 black:border-zinc-800"
                            role="none">
                            <p class="text-sm font-medium text-heading dark:text-white black:text-zinc-100" role="none">
                                {{ Auth::user()->name }}</p>
                            <p class="text-sm text-body truncate dark:text-slate-400 black:text-zinc-400" role="none">{{
                                Auth::user()->email }}</p>
                        </div>
                        <ul class="p-2 text-sm text-body font-medium dark:text-slate-300 black:text-zinc-300"
                            role="none">
                            <li>
                                <button type="button"
                                    class="inline-flex items-center w-full p-2 rounded hover:bg-neutral-tertiary-medium hover:text-heading dark:hover:bg-slate-700 black:hover:bg-zinc-200"
                                    data-modal-target="notifications-modal" data-modal-toggle="notifications-modal">
                                    <x-bi-bell class="w-4 h-4 mr-2" />
                                    <span>Notificações</span>
                                    <span id="notif-menu-badge"
                                        class="hidden ml-auto text-xs font-semibold h-5 min-w-[1.25rem] px-1.5 rounded-full bg-rose-600 text-white inline-flex items-center justify-center"></span>
                                </button>
                            </li>
                            <li>
                                <button type="button"
                                    class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded dark:hover:bg-slate-700 black:hover:bg-zinc-200"
                                    data-modal-target="settings-modal" data-modal-toggle="settings-modal">
                                    <x-bi-gear class="w-4 h-4 mr-2" /> Configurações
                                </button>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                    class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded dark:hover:bg-slate-700 black:hover:bg-zinc-200 text-red-500 hover:text-red-600"
                                    role="menuitem">
                                    <x-bi-box-arrow-right class="w-4 h-4 mr-2" /> Log out
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

{{-- ==========================================
MODAL DE NOTIFICAÇÕES
========================================== --}}
<div id="notifications-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-[60] justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] h-full backdrop-blur-sm bg-slate-900/50">

    <div class="relative p-4 w-full max-w-3xl max-h-full">
        <div
            class="relative bg-white dark:bg-slate-900 black:bg-zinc-900 rounded-lg shadow-2xl border border-slate-200 dark:border-slate-700 black:border-zinc-800 overflow-hidden">

            {{-- Header do Modal --}}
            <div
                class="flex items-center justify-between p-4 border-b border-slate-200 dark:border-slate-700 black:border-zinc-800">
                <div class="flex items-center gap-2">
                    <x-bi-bell class="w-5 h-5 text-slate-700 dark:text-slate-200 black:text-zinc-200" />
                    <h3 class="text-lg font-semibold text-slate-900 dark:text-slate-100 black:text-zinc-100">Central de
                        Notificações</h3>
                </div>
                <button type="button"
                    class="text-slate-400 hover:text-slate-900 dark:hover:text-white black:hover:text-white rounded-lg text-sm w-9 h-9 inline-flex items-center justify-center hover:bg-slate-100 dark:hover:bg-slate-800 black:hover:bg-zinc-800"
                    data-modal-hide="notifications-modal">
                    <x-bi-x-lg class="w-4 h-4" />
                </button>
            </div>

            {{-- Conteúdo (Lista) --}}
            <div class="p-4">
                <div class="max-h-[60vh] overflow-y-auto scrollbar-hide">
                    <ul class="space-y-2" id="notifications-list">
                        @forelse ($notifications as $n)
                        @php
                        $unread = !empty($n['unread']);
                        $flag = $n['flag_color'] ?? 'slate';
                        @endphp
                        <li>
                            <button type="button"
                                class="notif-item w-full text-left rounded-xl border border-slate-200 bg-white p-3 hover:bg-slate-50 dark:bg-slate-900 dark:border-slate-700 dark:hover:bg-slate-800 black:bg-zinc-900 black:border-zinc-800 black:hover:bg-zinc-800 transition-all group"
                                data-notif-id="{{ $n['id'] }}" data-unread-default="{{ $unread ? '1' : '0' }}">

                                <div class="flex items-start gap-3">
                                    {{-- Bolinha de não lido --}}
                                    <span data-notif-dot
                                        class="mt-1.5 w-2.5 h-2.5 rounded-full bg-sky-500 shadow-sm shadow-sky-500/50 {{ $unread ? '' : 'hidden' }}"></span>

                                    <div class="min-w-0 flex-1">
                                        <div class="flex items-center gap-2 mb-1">
                                            <div
                                                class="font-bold text-slate-900 dark:text-slate-100 black:text-zinc-100 truncate text-sm">
                                                {{ $n['title'] }}
                                            </div>

                                            @if (!empty($n['flag_text']))
                                            <span
                                                class="shrink-0 inline-flex items-center rounded-full px-2 py-0.5 text-[10px] uppercase font-bold tracking-wide {{ $flagClass[$flag] ?? $flagClass['slate'] }}">
                                                {{ $n['flag_text'] }}
                                            </span>
                                            @endif

                                            <div
                                                class="ml-auto text-xs text-slate-500 dark:text-slate-400 black:text-zinc-500">
                                                {{ $n['time'] }}
                                            </div>
                                        </div>

                                        <div
                                            class="text-sm text-slate-600 dark:text-slate-300 black:text-zinc-400 leading-snug">
                                            {{ $n['message'] }}
                                        </div>
                                    </div>
                                </div>
                            </button>
                        </li>
                        @empty
                        <li class="py-8 text-center text-slate-500 dark:text-slate-400 black:text-zinc-500">
                            <x-bi-inbox class="w-12 h-12 mx-auto mb-2 opacity-50" />
                            <p>Nenhuma notificação encontrada.</p>
                        </li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ==========================================
MODAL DE CONFIGURAÇÕES (ATUALIZADO)
========================================== --}}
<div id="settings-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-[60] justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] h-full backdrop-blur-sm bg-zing-900/50">

    <div class="relative p-4 w-full max-w-5xl max-h-full">
        <div
            class="relative bg-white dark:bg-slate-900 black:bg-zinc-900 rounded-lg shadow-2xl border border-slate-200 dark:border-slate-700 black:border-zinc-800 overflow-hidden flex flex-col max-h-[90vh]">

            {{-- Header do Modal --}}
            <div
                class="flex items-center justify-between p-4 border-b border-slate-200 dark:border-slate-700 black:border-zinc-800 shrink-0">
                <div class="flex items-center gap-2">
                    <x-bi-gear class="w-5 h-5 text-slate-700 dark:text-slate-200 black:text-zinc-200" />
                    <div>
                        <h3 class="text-lg font-semibold text-slate-900 dark:text-slate-100 black:text-zinc-100">
                            Configurações do Usuário</h3>
                        <p class="text-xs text-slate-500 dark:text-slate-400 black:text-zinc-400">
                            Gerencie suas informações pessoais e segurança.
                        </p>
                    </div>
                </div>
                <button type="button"
                    class="text-slate-400 hover:text-slate-900 dark:hover:text-white black:hover:text-white rounded-lg text-sm w-9 h-9 inline-flex items-center justify-center hover:bg-slate-100 dark:hover:bg-slate-800 black:hover:bg-zinc-800"
                    data-modal-hide="settings-modal">
                    <x-bi-x-lg class="w-4 h-4" />
                </button>
            </div>

            {{-- Conteúdo (Scrollable) --}}
            <div class="p-6 overflow-y-auto">

                {{-- FORMULÁRIO ATUALIZADO COM ROTA E ENCTYPE --}}
                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                        {{-- COLUNA 1: Card de Perfil --}}
                        <div class="lg:col-span-1">
                            <div
                                class="relative w-full overflow-hidden bg-slate-50 dark:bg-slate-800 black:bg-zinc-900 p-6 rounded-xl border border-slate-200 dark:border-slate-700 black:border-zinc-800 shadow-sm">

                                <div
                                    class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 rounded-full blur-2xl transition-all pointer-events-none bg-slate-500/5 dark:bg-slate-500/10 black:bg-zinc-500/10">
                                </div>

                                <div class="relative z-10 flex flex-col items-center text-center">
                                    {{-- Foto de Perfil --}}
                                    <div class="relative group">
                                        <div
                                            class="w-32 h-32 rounded-full p-1 border-2 border-slate-200 dark:border-slate-600 black:border-zinc-700 bg-white dark:bg-slate-700 black:bg-zinc-800">
                                            @php
                                            $modalPhotoUrl = Auth::user()->profile_photo_path
                                            ? Storage::url(Auth::user()->profile_photo_path)
                                            :
                                            'https://ui-avatars.com/api/?name='.urlencode(Auth::user()->name).'&background=E2E8F0&color=64748B';
                                            @endphp
                                            {{-- ID adicionado para o Preview JS --}}
                                            <img id="profile-image-preview" src="{{ $modalPhotoUrl }}" alt="Profile"
                                                class="w-full h-full rounded-full object-cover">
                                        </div>
                                        <label for="photo"
                                            class="absolute bottom-0 right-0 bg-sky-500 text-white p-2 rounded-full cursor-pointer hover:bg-sky-600 transition-colors shadow-lg border-2 border-slate-50 dark:border-slate-800 black:border-zinc-800">
                                            <x-bi-camera class="w-4 h-4" />
                                        </label>
                                        <input type="file" id="photo" name="photo" class="hidden" accept="image/*">
                                    </div>

                                    <div class="mt-4 space-y-1">
                                        <h3
                                            class="text-xl font-bold text-slate-800 dark:text-white black:text-zinc-100 tracking-tight">
                                            {{ auth()->user()->name }}
                                        </h3>
                                    </div>

                                    <div class="mt-4">
                                        {{-- Botão Dropdown Tema --}}
                                        <button id="themeDropdownButton" data-dropdown-toggle="themeDropdown"
                                            class="text-slate-700 dark:text-slate-200 black:text-zinc-200 bg-white dark:bg-slate-700 black:bg-zinc-800 hover:bg-slate-50 dark:hover:bg-slate-600 black:hover:bg-zinc-700 focus:ring-2 focus:outline-none focus:ring-sky-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center shadow-sm border border-slate-200 dark:border-slate-600 black:border-zinc-700 transition-colors"
                                            type="button">
                                            <x-bi-palette class="w-4 h-4 mr-2" />
                                            Tema: <span id="current-theme-label"
                                                class="ml-1 font-bold">Selecionar</span>
                                            <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                                            </svg>
                                        </button>

                                        {{-- Menu Dropdown Tema --}}
                                        <div id="themeDropdown"
                                            class="z-[70] hidden bg-white divide-y divide-slate-100 rounded-lg shadow w-44 dark:bg-slate-700 black:bg-zinc-900 border border-slate-100 dark:border-slate-600 black:border-zinc-800">
                                            <ul class="py-2 text-sm text-slate-700 dark:text-slate-200 black:text-zinc-300"
                                                aria-labelledby="themeDropdownButton">
                                                <li>
                                                    <button type="button" data-theme="light"
                                                        class="set-theme-btn w-full text-left px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 black:hover:bg-zinc-800 flex items-center gap-2">
                                                        <x-bi-sun class="w-4 h-4 text-amber-500" />
                                                        Claro
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" data-theme="dark"
                                                        class="set-theme-btn w-full text-left px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 black:hover:bg-zinc-800 flex items-center gap-2">
                                                        <x-bi-moon-stars class="w-4 h-4 text-purple-500" />
                                                        Neon
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" data-theme="black"
                                                        class="set-theme-btn w-full text-left px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 black:hover:bg-zinc-800 flex items-center gap-2">
                                                        <div
                                                            class="w-4 h-4 bg-slate-900 black:bg-zinc-950 border border-slate-600 black:border-zinc-700 rounded-full">
                                                        </div>
                                                        Escuro (Black)
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- COLUNA 2: Formulário de Edição --}}
                        <div class="lg:col-span-2">
                            <div
                                class="relative w-full overflow-hidden bg-slate-50 dark:bg-slate-800 black:bg-zinc-900 p-6 rounded-xl border border-slate-200 dark:border-slate-700 black:border-zinc-800 shadow-sm h-full">

                                <div
                                    class="absolute top-0 right-0 -mt-4 -mr-4 w-32 h-32 rounded-full blur-3xl transition-all pointer-events-none bg-sky-500/5">
                                </div>

                                <div class="relative z-10 space-y-8">

                                    {{-- Seção: Dados Pessoais --}}
                                    <div>
                                        <h3
                                            class="flex items-center gap-2 text-lg font-bold text-slate-800 dark:text-white black:text-zinc-100 mb-5 pb-2 border-b border-slate-200 dark:border-slate-700 black:border-zinc-800">
                                            <x-bi-person class="w-5 h-5 text-sky-500" /> Informações Pessoais
                                        </h3>

                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                            <div class="space-y-1">
                                                <label for="name"
                                                    class="text-slate-500 dark:text-slate-400 black:text-zinc-400 text-xs font-bold uppercase tracking-wider">
                                                    Nome Completo
                                                </label>
                                                <div class="relative">
                                                    <input type="text" name="name" id="name"
                                                        value="{{ old('name', auth()->user()->name) }}"
                                                        class="w-full bg-white dark:bg-slate-900 black:bg-zinc-950 border border-slate-300 dark:border-slate-600 black:border-zinc-700 text-slate-700 dark:text-slate-200 black:text-zinc-100 text-sm rounded-lg focus:ring-2 focus:ring-sky-500 focus:border-transparent block p-2.5 transition-all shadow-sm placeholder-slate-400 black:placeholder-zinc-500"
                                                        placeholder="Seu nome">
                                                </div>
                                                @error('name') <span class="text-red-500 text-xs font-medium">{{
                                                    $message }}</span> @enderror
                                            </div>

                                            <div class="space-y-1">
                                                <label for="email"
                                                    class="text-slate-500 dark:text-slate-400 black:text-zinc-400 text-xs font-bold uppercase tracking-wider">
                                                    Endereço de Email
                                                </label>
                                                <div class="relative">
                                                    <input type="email" name="email" id="email"
                                                        value="{{ old('email', auth()->user()->email) }}"
                                                        class="w-full bg-white dark:bg-slate-900 black:bg-zinc-950 border border-slate-300 dark:border-slate-600 black:border-zinc-700 text-slate-700 dark:text-slate-200 black:text-zinc-100 text-sm rounded-lg focus:ring-2 focus:ring-sky-500 focus:border-transparent block p-2.5 transition-all shadow-sm placeholder-slate-400 black:placeholder-zinc-500"
                                                        placeholder="nome@exemplo.com">
                                                </div>
                                                @error('email') <span class="text-red-500 text-xs font-medium">{{
                                                    $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Seção: Segurança --}}
                                    <div>
                                        <h3
                                            class="flex items-center gap-2 text-lg font-bold text-slate-800 dark:text-white black:text-zinc-100 mb-5 pb-2 border-b border-slate-200 dark:border-slate-700 black:border-zinc-800">
                                            <x-bi-shield-lock class="w-5 h-5 text-sky-500" /> Segurança
                                        </h3>

                                        <div class="space-y-5">
                                            <div class="space-y-1">
                                                <label for="current_password"
                                                    class="text-slate-500 dark:text-slate-400 black:text-zinc-400 text-xs font-bold uppercase tracking-wider">
                                                    Senha Atual
                                                </label>
                                                <input type="password" name="current_password" id="current_password"
                                                    class="w-full bg-white dark:bg-slate-900 black:bg-zinc-950 border border-slate-300 dark:border-slate-600 black:border-zinc-700 text-slate-700 dark:text-slate-200 black:text-zinc-100 text-sm rounded-lg focus:ring-2 focus:ring-sky-500 focus:border-transparent block p-2.5 transition-all shadow-sm placeholder-slate-400 black:placeholder-zinc-500"
                                                    placeholder="••••••••">
                                                @error('current_password') <span
                                                    class="text-red-500 text-xs font-medium">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                                <div class="space-y-1">
                                                    <label for="password"
                                                        class="text-slate-500 dark:text-slate-400 black:text-zinc-400 text-xs font-bold uppercase tracking-wider">
                                                        Nova Senha
                                                    </label>
                                                    <input type="password" name="password" id="password"
                                                        class="w-full bg-white dark:bg-slate-900 black:bg-zinc-950 border border-slate-300 dark:border-slate-600 black:border-zinc-700 text-slate-700 dark:text-slate-200 black:text-zinc-100 text-sm rounded-lg focus:ring-2 focus:ring-sky-500 focus:border-transparent block p-2.5 transition-all shadow-sm placeholder-slate-400 black:placeholder-zinc-500"
                                                        placeholder="••••••••">
                                                </div>

                                                <div class="space-y-1">
                                                    <label for="password_confirmation"
                                                        class="text-slate-500 dark:text-slate-400 black:text-zinc-400 text-xs font-bold uppercase tracking-wider">
                                                        Confirmar Senha
                                                    </label>
                                                    <input type="password" name="password_confirmation"
                                                        id="password_confirmation"
                                                        class="w-full bg-white dark:bg-slate-900 black:bg-zinc-950 border border-slate-300 dark:border-slate-600 black:border-zinc-700 text-slate-700 dark:text-slate-200 black:text-zinc-100 text-sm rounded-lg focus:ring-2 focus:ring-sky-500 focus:border-transparent block p-2.5 transition-all shadow-sm placeholder-slate-400 black:placeholder-zinc-500"
                                                        placeholder="••••••••">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Ações --}}
                                    <div class="flex justify-end pt-4">
                                        <button type="submit"
                                            class="group relative inline-flex items-center justify-center px-6 py-2.5 text-sm font-bold text-white transition-all duration-200 bg-sky-600 rounded-lg hover:bg-sky-500 hover:shadow-lg hover:shadow-sky-500/30 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-600 dark:focus:ring-offset-slate-900">
                                            <span>Salvar Alterações</span>
                                            <x-bi-check-lg
                                                class="w-4 h-4 ml-2 group-hover:scale-110 transition-transform" />
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- ==========================================
MODAL DE PERÍODO PERSONALIZADO
========================================== --}}
<div id="modalPeriodo"
    class="hidden fixed inset-0 z-[70] flex items-center justify-center bg-slate-900/50 backdrop-blur-sm"
    aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div
        class="bg-white dark:bg-slate-800 black:bg-zinc-900 rounded-lg shadow-xl w-full max-w-md mx-4 overflow-hidden border border-slate-200 dark:border-slate-700 black:border-zinc-800">

        <div
            class="px-6 py-4 border-b border-slate-100 dark:border-slate-700 black:border-zinc-800 flex justify-between items-center">
            <h3 class="text-lg font-semibold text-slate-800 dark:text-white black:text-zinc-100">Selecionar Período</h3>
            <button type="button" onclick="document.getElementById('modalPeriodo').classList.add('hidden')"
                class="text-slate-400 hover:text-slate-500 dark:hover:text-slate-300 black:hover:text-zinc-200">
                <x-bi-x-lg class="w-5 h-5" />
            </button>
        </div>

        <form action="" method="GET" class="p-6 space-y-4">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="data_inicio"
                        class="block text-sm font-medium text-slate-700 dark:text-slate-300 black:text-zinc-400 mb-1">Data
                        Início</label>
                    <input type="date" name="data_inicio" id="data_inicio" required
                        class="w-full rounded-md border-slate-300 dark:border-slate-600 black:border-zinc-700 bg-white dark:bg-slate-700 black:bg-zinc-950 text-slate-900 dark:text-white black:text-zinc-100 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm px-3 py-2">
                </div>

                <div>
                    <label for="data_fim"
                        class="block text-sm font-medium text-slate-700 dark:text-slate-300 black:text-zinc-400 mb-1">Data
                        Final</label>
                    <input type="date" name="data_fim" id="data_fim" required
                        class="w-full rounded-md border-slate-300 dark:border-slate-600 black:border-zinc-700 bg-white dark:bg-slate-700 black:bg-zinc-950 text-slate-900 dark:text-white black:text-zinc-100 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm px-3 py-2">
                </div>
            </div>

            <div class="flex justify-end gap-3 mt-6">
                <button type="button" onclick="document.getElementById('modalPeriodo').classList.add('hidden')"
                    class="px-4 py-2 text-sm font-medium text-slate-700 dark:text-slate-200 black:text-zinc-300 bg-white dark:bg-slate-700 black:bg-zinc-800 border border-slate-300 dark:border-slate-600 black:border-zinc-700 rounded-md hover:bg-slate-50 dark:hover:bg-slate-600 black:hover:bg-zinc-700">
                    Cancelar
                </button>
                <button type="submit"
                    class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Filtrar Dados
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
{{-- Script Unificado: Notificações + Badges + Filtro de Tempo + Preview de Imagem --}}
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // === 1. LÓGICA DE NOTIFICAÇÕES E BADGES ===
        const list = document.getElementById('notifications-list');
        const avatarBadge = document.getElementById('notif-avatar-badge');
        const menuBadge = document.getElementById('notif-menu-badge');

        function updateBadges() {
            if (!list) return;
            const unreadCount = list.querySelectorAll('.notif-item[data-unread-default="1"]').length;

            if (avatarBadge) {
                avatarBadge.textContent = unreadCount > 0 ? (unreadCount > 9 ? '9+' : unreadCount) : '';
                avatarBadge.classList.toggle('hidden', unreadCount === 0);
            }
            if (menuBadge) {
                menuBadge.textContent = unreadCount > 0 ? unreadCount : '';
                menuBadge.classList.toggle('hidden', unreadCount === 0);
            }
        }

        if (list) {
            list.addEventListener('click', (e) => {
                const button = e.target.closest('.notif-item');
                if (!button) return;

                if (button.dataset.unreadDefault === '1') {
                    button.dataset.unreadDefault = '0';
                    button.classList.add('opacity-60');
                    const dot = button.querySelector('[data-notif-dot]');
                    if (dot) dot.classList.add('hidden');
                    updateBadges();
                }
            });
        }
        updateBadges();

        // === 2. LÓGICA DO FILTRO DE TEMPO ===
        const STORAGE_KEY = "tipotempo";
        const btnTempo = document.getElementById("btn-tipotempo");
        const labelTempo = document.getElementById("tipotempo-label");
        const dropdownTempo = document.getElementById("dropdown-tipotempo");

        if (btnTempo && labelTempo && dropdownTempo) {
            const items = dropdownTempo.querySelectorAll("a[data-tempo]");
            const closeDropdown = () => dropdownTempo.classList.add('hidden');

            const applyTempo = (tempo, label) => {
                labelTempo.textContent = label;
                localStorage.setItem(STORAGE_KEY, tempo);
                const url = new URL(window.location);
                url.searchParams.set("tempo", tempo);
                window.history.pushState({}, "", url);
            };

            const savedTempo = localStorage.getItem(STORAGE_KEY);
            if (savedTempo) {
                const target = Array.from(items).find(i => i.dataset.tempo === savedTempo);
                if (target) labelTempo.textContent = target.textContent.trim();
            }

            items.forEach(item => {
                item.addEventListener("click", (e) => {
                    const tempo = item.dataset.tempo;
                    if (tempo === 'periodo') {
                        closeDropdown();
                        return;
                    }
                    e.preventDefault();
                    applyTempo(tempo, item.textContent.trim());
                    closeDropdown();
                });
            });
        }

        // === 3. NOVO: PREVIEW DE IMAGEM DE PERFIL ===
        const photoInput = document.getElementById('photo');
        const photoPreview = document.getElementById('profile-image-preview');

        if (photoInput && photoPreview) {
            photoInput.addEventListener('change', function (e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();

                    reader.onload = function (e) {
                        photoPreview.src = e.target.result;
                    }

                    reader.readAsDataURL(file);
                }
            });
        }
    });
</script>
@endpush