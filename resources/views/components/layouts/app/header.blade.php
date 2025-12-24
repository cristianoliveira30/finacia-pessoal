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
                    class="text-white box-border border border-transparent hover:bg-neutral-secondary-medium
                           dark:focus:outline-2 dark:focus:outline-offset-2 dark:focus:ring-neutral-tertiary
                           font-medium leading-5 rounded-base text-sm p-2 focus:outline-none mr-2">
                    <span class="sr-only">Alternar sidebar</span>
                    <x-bi-justify-left class="w-6 h-6" />
                </button>

                <a href="{{ route('home') }}" class="flex ms-2 md:me-6 me-2">
                    <img src="{{ asset('assets/img/belem.png') }}" class="h-6 me-3" alt="pará Logo" />
                    <span
                        class="self-center text-lg font-semibold whitespace-nowrap text-white dark:text-white">Core</span>
                </a>
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
{{-- Modal (estrutura correta do Flowbite) --}}
<div id="notifications-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50
           justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-xl max-h-full">

        <div
            class="relative bg-white dark:bg-slate-900 rounded-lg shadow border border-slate-200 dark:border-slate-700">
            <div class="flex items-center justify-between p-4 border-b border-slate-200 dark:border-slate-700">
                <div class="flex items-center gap-2">
                    <x-bi-bell class="w-5 h-5 text-slate-700 dark:text-slate-200" />
                    <h3 class="text-lg font-semibold text-slate-900 dark:text-slate-100">Notificações</h3>
                </div>
                <button type="button"
                    class="text-slate-400 hover:text-slate-900 dark:hover:text-white rounded-lg text-sm w-9 h-9 inline-flex items-center justify-center hover:bg-slate-100 dark:hover:bg-slate-800"
                    data-modal-hide="notifications-modal" aria-label="Fechar">
                    <x-bi-x-lg class="w-4 h-4" />
                </button>
            </div>
            <div class="p-4 max-h-[60vh] overflow-y-auto scrollbar-hide">
                <ul class="space-y-2" id="notifications-list">

                    @foreach ($notificacoesFake as $n)
                        <li class="notif-item p-3 rounded-lg border border-slate-200 dark:border-slate-700
                                   hover:bg-slate-50 dark:hover:bg-slate-800 transition cursor-pointer"
                            data-notif-id="{{ $n['id'] }}" data-unread-default="{{ $n['unread'] ? '1' : '0' }}">
                            <div class="flex items-start gap-3">
                                <x-dynamic-component :component="'bi-' . $n['icon']" class="w-4 h-4 mt-0.5 shrink-0" />

                                <div class="min-w-0 flex-1">
                                    <div class="flex items-center gap-2">
                                        <span class="text-sm font-semibold text-slate-900 dark:text-slate-100">
                                            {{ $n['title'] }}
                                        </span>

                                        <span class="text-[11px] px-2 py-0.5 rounded-full {{ $tagClass($n['area']) }}">
                                            {{ $n['area'] }}
                                        </span>
                                        <span data-notif-dot class="ml-auto h-2 w-2 rounded-full bg-sky-500"
                                            title="Não lida"></span>
                                    </div>

                                    <p class="text-xs text-slate-600 dark:text-slate-300 mt-1">{{ $n['msg'] }}</p>
                                    <div class="text-[11px] text-slate-500 dark:text-slate-400 mt-1">
                                        {{ $n['time'] }}</div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
  const $ = (s, r = document) => r.querySelector(s);
  const $$ = (s, r = document) => Array.from(r.querySelectorAll(s));
  const avatarBadge = $('#notif-avatar-badge');
  const menuBadge   = $('#notif-menu-badge');
  const list        = $('#notifications-list');
  const items       = $$('.notif-item');
  const read = new Set();

  const isUnread = (el) =>
    el.dataset.unreadDefault === '1' && !read.has(el.dataset.notifId);

  const setBadge = (el, n) => {
    if (!el) return;
    el.textContent = n ? String(n) : '';
    el.classList.toggle('hidden', !n);
  };

  const render = () => {
    let unreadCount = 0;

    items.forEach((el) => {
      const unread = isUnread(el);
      unreadCount += unread ? 1 : 0;

      el.classList.toggle('opacity-60', !unread);
      el.querySelector('[data-notif-dot]')?.classList.toggle('hidden', !unread);
    });

    setBadge(avatarBadge, unreadCount);
    setBadge(menuBadge, unreadCount);
  };
  list?.addEventListener('click', (e) => {
    const item = e.target.closest('.notif-item');
    if (!item) return;
    if (item.dataset.unreadDefault !== '1') return;

    read.add(item.dataset.notifId);
    render();
  });

  render();
});
</script>
