{{-- resources/views/message/envio.blade.php --}}
<x-layouts.app :title="__('Enviar Notificação')">

    {{-- BG PAGE: black:bg-zinc-950 --}}
    <div class="min-h-[calc(100vh-4rem)] pt-20 bg-slate-50 dark:bg-slate-900 black:bg-zinc-950">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 pb-10">

            {{-- PAGE HEADER --}}
            <header class="mb-6">
                {{-- TITLE: black:text-zinc-100 --}}
                <h1 class="text-2xl font-bold text-slate-900 dark:text-slate-100 black:text-zinc-100">
                    Enviar notificações
                </h1>

                {{-- SUBTITLE: black:text-zinc-400 --}}
                <p class="mt-1 text-sm text-slate-600 dark:text-slate-300 black:text-zinc-400">
                    Envie um aviso para todos, por setor, ou para um usuário específico.
                </p>
            </header>

            {{-- CONTENT CARD: black:bg-zinc-900 black:border-zinc-800 --}}
            <div id="notifications-send-page"
                class="bg-white dark:bg-slate-800 black:bg-zinc-900 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700 black:border-zinc-800 overflow-hidden">

                @php
                $setores = ['Finanças', 'Educação', 'Saúde', 'Obras', 'Ouvidoria', 'Assistência'];

                // Cores ajustadas para Light, Dark (Slate) e Black (Zinc)
                $setorColors = [
                'Finanças' => 'bg-emerald-100 text-emerald-800 dark:bg-emerald-900/30 dark:text-emerald-200
                black:bg-emerald-900/30 black:text-emerald-300',
                'Educação' => 'bg-sky-100 text-sky-800 dark:bg-sky-900/30 dark:text-sky-200 black:bg-sky-900/30
                black:text-sky-300',
                'Saúde' => 'bg-rose-100 text-rose-800 dark:bg-rose-900/30 dark:text-rose-200 black:bg-rose-900/30
                black:text-rose-300',
                'Obras' => 'bg-amber-100 text-amber-800 dark:bg-amber-900/30 dark:text-amber-200 black:bg-amber-900/30
                black:text-amber-300',
                'Ouvidoria' => 'bg-violet-100 text-violet-800 dark:bg-violet-900/30 dark:text-violet-200
                black:bg-violet-900/30 black:text-violet-300',
                'Assistência' => 'bg-indigo-100 text-indigo-800 dark:bg-indigo-900/30 dark:text-indigo-200
                black:bg-indigo-900/30 black:text-indigo-300',
                ];

                $flagCores = [
                ['v' => 'sky', 'dot' => 'bg-sky-600'],
                ['v' => 'emerald', 'dot' => 'bg-emerald-600'],
                ['v' => 'amber', 'dot' => 'bg-amber-500'],
                ['v' => 'rose', 'dot' => 'bg-rose-600'],
                ['v' => 'violet', 'dot' => 'bg-violet-600'],
                ];
                @endphp

                <form id="send-notification-form" method="POST" action="#">
                    @csrf

                    <div class="p-6 sm:p-8 space-y-6">

                        {{-- SECTION: DESTINO --}}
                        <section>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                <div class="md:col-span-2">
                                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-2" id="notif-destino-group">

                                        {{-- RADIO: TODOS --}}
                                        <label class="cursor-pointer">
                                            <input class="sr-only peer" type="radio" name="destino" value="todos"
                                                checked>
                                            <div
                                                class="rounded-xl border border-slate-200 bg-white p-3 hover:bg-slate-50 transition
                                                       dark:bg-slate-900 dark:border-slate-700 dark:hover:bg-slate-800
                                                       black:bg-zinc-950 black:border-zinc-800 black:hover:bg-zinc-800
                                                       peer-checked:border-sky-500 peer-checked:ring-2 peer-checked:ring-sky-500/20">
                                                <div class="flex items-center gap-2">
                                                    <x-bi-people
                                                        class="w-5 h-5 text-slate-500 dark:text-slate-400 black:text-zinc-400" />
                                                    <div
                                                        class="text-sm font-semibold text-slate-900 dark:text-slate-100 black:text-zinc-100">
                                                        Todos
                                                    </div>
                                                </div>
                                            </div>
                                        </label>

                                        {{-- RADIO: SETOR --}}
                                        <label class="cursor-pointer">
                                            <input class="sr-only peer" type="radio" name="destino" value="setor">
                                            <div
                                                class="rounded-xl border border-slate-200 bg-white p-3 hover:bg-slate-50 transition
                                                       dark:bg-slate-900 dark:border-slate-700 dark:hover:bg-slate-800
                                                       black:bg-zinc-950 black:border-zinc-800 black:hover:bg-zinc-800
                                                       peer-checked:border-sky-500 peer-checked:ring-2 peer-checked:ring-sky-500/20">
                                                <div class="flex items-center gap-2">
                                                    <x-bi-diagram-3
                                                        class="w-5 h-5 text-slate-500 dark:text-slate-400 black:text-zinc-400" />
                                                    <div
                                                        class="text-sm font-semibold text-slate-900 dark:text-slate-100 black:text-zinc-100">
                                                        Secretaria
                                                    </div>
                                                </div>
                                            </div>
                                        </label>

                                        {{-- RADIO: USUARIO --}}
                                        <label class="cursor-pointer">
                                            <input class="sr-only peer" type="radio" name="destino" value="usuario">
                                            <div
                                                class="rounded-xl border border-slate-200 bg-white p-3 hover:bg-slate-50 transition
                                                       dark:bg-slate-900 dark:border-slate-700 dark:hover:bg-slate-800
                                                       black:bg-zinc-950 black:border-zinc-800 black:hover:bg-zinc-800
                                                       peer-checked:border-sky-500 peer-checked:ring-2 peer-checked:ring-sky-500/20">
                                                <div class="flex items-center gap-2">
                                                    <x-bi-person
                                                        class="w-5 h-5 text-slate-500 dark:text-slate-400 black:text-zinc-400" />
                                                    <div
                                                        class="text-sm font-semibold text-slate-900 dark:text-slate-100 black:text-zinc-100">
                                                        Usuário
                                                    </div>
                                                </div>
                                            </div>
                                        </label>

                                    </div>
                                </div>

                                {{-- Setores (só quando destino=setor) --}}
                                <div id="notif-setores-wrap" class="hidden md:col-span-2">
                                    <label
                                        class="block text-xs font-semibold text-slate-700 dark:text-slate-200 black:text-zinc-300 mb-1">
                                        Setores (destino)
                                    </label>

                                    <div class="relative">
                                        {{-- SELECT BTN: black:bg-zinc-950 black:border-zinc-700 --}}
                                        <button type="button" id="notif-setores-btn"
                                            class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm text-slate-700
                                                   dark:bg-slate-900 dark:border-slate-600 dark:text-slate-100
                                                   black:bg-zinc-950 black:border-zinc-700 black:text-zinc-100
                                                   flex items-center justify-between gap-2 hover:bg-slate-50 dark:hover:bg-slate-800 black:hover:bg-zinc-900">
                                            <span id="notif-setores-label" class="truncate">Selecione uma ou mais
                                                setores…</span>
                                            <x-bi-chevron-down class="w-4 h-4" />
                                        </button>

                                        {{-- DROPDOWN MENU --}}
                                        <div id="notif-setores-menu"
                                            class="hidden absolute left-0 mt-2 w-full z-[70] bg-white dark:bg-slate-800 black:bg-zinc-900
                                                   border border-slate-200 dark:border-slate-700 black:border-zinc-700 rounded-lg shadow-xl overflow-hidden">
                                            <div class="max-h-56 overflow-y-auto p-2 scrollbar-hide">
                                                <div class="flex flex-wrap gap-2">
                                                    @foreach ($setores as $s)
                                                    <label class="cursor-pointer">
                                                        <input type="checkbox" class="sr-only peer notif-setor-checkbox"
                                                            name="setores[]" value="{{ $s }}">
                                                        <span
                                                            class="inline-flex items-center rounded-full px-3 py-1 text-xs font-semibold select-none transition
                                                                   {{ $setorColors[$s] ?? 'bg-slate-100 text-slate-700 dark:bg-slate-700 dark:text-slate-200 black:bg-zinc-800 black:text-zinc-200' }}
                                                                   peer-checked:ring-2 peer-checked:ring-slate-900/15 dark:peer-checked:ring-white/20 black:peer-checked:ring-white/20 peer-checked:scale-[1.02]">
                                                            {{ $s }}
                                                        </span>
                                                    </label>
                                                    @endforeach
                                                </div>
                                            </div>

                                            <div
                                                class="flex items-center justify-between gap-2 p-2 border-t border-slate-200 dark:border-slate-700 black:border-zinc-800">
                                                <button type="button" id="notif-setores-clear"
                                                    class="px-3 py-2 text-sm font-semibold rounded-lg border border-slate-200 text-slate-700 hover:bg-slate-50
                                                           dark:border-slate-600 dark:text-slate-200 dark:hover:bg-slate-700
                                                           black:border-zinc-700 black:text-zinc-300 black:hover:bg-zinc-800">
                                                    Limpar
                                                </button>
                                                <button type="button" id="notif-setores-close"
                                                    class="px-3 py-2 text-sm font-semibold rounded-lg bg-sky-600 text-white hover:bg-sky-700">
                                                    OK
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="notif-setores-chips" class="mt-2 flex flex-wrap gap-1"></div>
                                </div>

                                {{-- Usuário (só quando destino=usuario) --}}
                                <div id="notif-por-usuario" class="hidden md:col-span-2">
                                    <label
                                        class="block text-xs font-semibold text-slate-700 dark:text-slate-200 black:text-zinc-300 mb-1">
                                        Usuário
                                    </label>
                                    {{-- INPUT: black:bg-zinc-950 --}}
                                    <input name="usuario" type="text" placeholder="ID, nome ou e-mail…" class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm
                                               dark:bg-slate-900 dark:border-slate-600 dark:text-slate-100
                                               black:bg-zinc-950 black:border-zinc-700 black:text-zinc-100" />
                                </div>
                            </div>
                        </section>

                        {{-- DIVISOR --}}
                        <div class="h-px bg-slate-200 dark:bg-slate-700 black:bg-zinc-800"></div>

                        {{-- SECTION: CONTEÚDO --}}
                        <section>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">

                                {{-- Título + badge --}}
                                <div class="md:col-span-2">
                                    <label
                                        class="block text-xs font-semibold text-slate-700 dark:text-slate-200 black:text-zinc-300 mb-1">
                                        Título
                                    </label>

                                    <div class="flex items-center gap-2">
                                        {{-- INPUT: black:bg-zinc-950 --}}
                                        <input id="notif-title" name="title" type="text" maxlength="80"
                                            placeholder="Ex: Relatório publicado" class="flex-1 rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm
                                                   dark:bg-slate-900 dark:border-slate-600 dark:text-slate-100
                                                   black:bg-zinc-950 black:border-zinc-700 black:text-zinc-100" />

                                        <span id="notif-flag-badge"
                                            class="hidden shrink-0 inline-flex items-center rounded-full px-2.5 py-1 text-xs font-semibold">
                                        </span>
                                    </div>
                                </div>

                                {{-- Flag --}}
                                <div class="md:col-span-2">
                                    <button type="button" id="notif-flag-toggle" class="inline-flex items-center gap-2 px-3 py-2 rounded-lg text-sm font-semibold
                                               border border-slate-200 text-slate-700 hover:bg-slate-50
                                               dark:border-slate-600 dark:text-slate-300 dark:hover:bg-slate-800
                                               black:border-zinc-700 black:text-zinc-300 black:hover:bg-zinc-800">
                                        <x-bi-flag class="w-4 h-4" />
                                    </button>

                                    {{-- FLAG EDITOR --}}
                                    <div id="notif-flag-editor" class="hidden mt-2 rounded-lg border border-slate-200 dark:border-slate-700 black:border-zinc-700
                                               bg-slate-50 dark:bg-slate-900 black:bg-zinc-900 p-3">
                                        <div class="grid grid-cols-1 md:grid-cols-3 gap-3 items-end">

                                            <div class="md:col-span-2">
                                                <label
                                                    class="block text-xs font-semibold text-slate-700 dark:text-slate-200 black:text-zinc-300 mb-1">
                                                    Texto da flag
                                                    <span
                                                        class="text-[11px] font-normal text-slate-500 dark:text-slate-400 black:text-zinc-500">(opcional)</span>
                                                </label>
                                                <input id="notif-flag-text" name="flag_text" type="text" maxlength="24"
                                                    placeholder="Ex: Urgente, Atenção…"
                                                    class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm
                                                           dark:bg-slate-950 dark:border-slate-700 dark:text-slate-100
                                                           black:bg-zinc-950 black:border-zinc-800 black:text-zinc-100" />
                                            </div>

                                            <div>
                                                <label
                                                    class="block text-xs font-semibold text-slate-700 dark:text-slate-200 black:text-zinc-300 mb-1">
                                                    Cor
                                                </label>

                                                <div class="flex flex-wrap gap-2">
                                                    @foreach ($flagCores as $c)
                                                    <label class="cursor-pointer">
                                                        <input class="sr-only peer" type="radio" name="flag_color"
                                                            value="{{ $c['v'] }}" @checked($loop->first)>
                                                        <span
                                                            class="inline-flex items-center gap-2 px-2.5 py-1 rounded-full text-xs font-semibold
                                                                   border border-slate-200 bg-white text-slate-700
                                                                   dark:border-slate-700 dark:bg-slate-950 dark:text-slate-200
                                                                   black:border-zinc-700 black:bg-zinc-950 black:text-zinc-200
                                                                   peer-checked:ring-2 peer-checked:ring-sky-500/25 peer-checked:border-sky-500">
                                                            <span
                                                                class="w-2.5 h-2.5 rounded-full {{ $c['dot'] }}"></span>
                                                        </span>
                                                    </label>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-3 flex items-center justify-end gap-2">
                                            <button type="button" id="notif-flag-clear"
                                                class="px-3 py-2 rounded-lg text-sm font-semibold border border-slate-200 text-slate-700 hover:bg-slate-50
                                                       dark:border-slate-600 dark:text-slate-200 dark:hover:bg-slate-700
                                                       black:border-zinc-700 black:text-zinc-300 black:hover:bg-zinc-800">
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
                                        class="block text-xs font-semibold text-slate-700 dark:text-slate-200 black:text-zinc-300 mb-1">
                                        Mensagem
                                    </label>
                                    <textarea name="message" rows="5" maxlength="300"
                                        placeholder="Escreva a notificação…" class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm
                                               dark:bg-slate-900 dark:border-slate-600 dark:text-slate-100
                                               black:bg-zinc-950 black:border-zinc-700 black:text-zinc-100"></textarea>
                                </div>

                                {{-- Link --}}
                                <div class="md:col-span-2">
                                    <label
                                        class="block text-xs font-semibold text-slate-700 dark:text-slate-200 black:text-zinc-300 mb-1">
                                        Link (opcional)
                                    </label>
                                    <input name="url" type="text" placeholder="/financeiro/relatorios" class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm
                                               dark:bg-slate-900 dark:border-slate-600 dark:text-slate-100
                                               black:bg-zinc-950 black:border-zinc-700 black:text-zinc-100" />
                                </div>

                            </div>
                        </section>
                    </div>

                    {{-- ACTION BAR --}}
                    <div
                        class="px-6 sm:px-8 py-4 flex items-center justify-end border-t border-slate-100 dark:border-slate-700 black:border-zinc-800 bg-slate-50 dark:bg-slate-800/50 black:bg-zinc-900/50">
                        <button type="submit"
                            class="px-4 py-2 rounded-lg text-sm font-semibold bg-sky-600 text-white hover:bg-sky-700 flex items-center gap-2">
                            <span>Enviar</span>
                            <x-bi-send-fill class="w-4 h-4 transform rotate-45" />
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>

    @once
    @push('scripts')
    <script>
        (() => {
            const D = document;
            const root = D.getElementById('notifications-send-page');
            if (!root) return;

            const $ = (s, r = root) => r.querySelector(s);
            const $$ = (s, r = root) => Array.from(r.querySelectorAll(s));
            const hide = (el, v) => el && el.classList.toggle('hidden', !!v);

            /* ===== DESTINO + SETORES ===== */
            const getDestino = () => root.querySelector('input[name="destino"]:checked')?.value || 'todos';

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
            const menuOpen = () => setoresMenu && setoresMenu.classList.remove('hidden');
            const menuToggle = () => setoresMenu?.classList.contains('hidden') ? menuOpen() : menuClose();

            const renderSetores = () => {
                const sel = selected();

                if (setoresLbl) {
                    setoresLbl.textContent = sel.length ?
                        `${sel.length} selecionado(s): ${sel.join(', ')}` :
                        'Selecione um ou mais setores…';
                }

                if (setoresChps) {
                    // Chips de seleção (ao fechar o dropdown)
                    setoresChps.innerHTML = sel.map(v => `
                                <button type="button"
                                    class="inline-flex items-center gap-1 px-2 py-1 rounded-full text-xs font-semibold
                                           bg-slate-100 text-slate-800 hover:bg-slate-200
                                           dark:bg-slate-700 dark:text-slate-100 dark:hover:bg-slate-600
                                           black:bg-zinc-800 black:text-zinc-100 black:hover:bg-zinc-700"
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

            $$('input[name="destino"]').forEach(r => r.addEventListener('change', syncDestino));
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

            /* ===== FLAG ===== */
            const flagToggle = $('#notif-flag-toggle');
            const flagEditor = $('#notif-flag-editor');
            const flagText = $('#notif-flag-text');
            const flagBadge = $('#notif-flag-badge');
            const flagDone = $('#notif-flag-done');
            const flagClear = $('#notif-flag-clear');
            const radiosFlag = $$('input[name="flag_color"]');

            // Definição de cores para a flag (Badge) suportando black theme
            const flagStyles = {
                sky: 'bg-sky-100 text-sky-800 dark:bg-sky-900/30 dark:text-sky-200 black:bg-sky-900/30 black:text-sky-300',
                emerald: 'bg-emerald-100 text-emerald-800 dark:bg-emerald-900/30 dark:text-emerald-200 black:bg-emerald-900/30 black:text-emerald-300',
                amber: 'bg-amber-100 text-amber-900 dark:bg-amber-900/30 dark:text-amber-200 black:bg-amber-900/30 black:text-amber-300',
                rose: 'bg-rose-100 text-rose-900 dark:bg-rose-900/30 dark:text-rose-200 black:bg-rose-900/30 black:text-rose-300',
                violet: 'bg-violet-100 text-violet-900 dark:bg-violet-900/30 dark:text-violet-200 black:bg-violet-900/30 black:text-violet-300',
            };

            const getFlagColor = () =>
                root.querySelector('input[name="flag_color"]:checked')?.value ||
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
                (flagStyles[color] || '').split(' ').filter(Boolean).forEach(k => flagBadge.classList.add(k));
            };

            flagToggle?.addEventListener('click', () =>
                hide(flagEditor, !flagEditor?.classList.contains('hidden'))
            );

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

            /* ===== SUBMIT (sem lógica de voltar/cancelar) ===== */
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
            });
        })();
    </script>
    @endpush
    @endonce

</x-layouts.app>