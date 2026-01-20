<x-layouts.app :title="__('Prefeito')">
    <div class="w-full min-h-screen pt-2 px-4 sm:px-6 lg:pl-16 space-y-4 black:bg-zinc-950 dark:bg-slate-900">
        <div class="py-6  sm:py-8 lg:py-10 space-y-8 sm:space-y-10">

            {{-- CABEÇALHO --}}
            <div class="w-full px-4 sm:px-6 lg:px-8 py-6">
                <div class="flex flex-col gap-3 sm:gap-4 md:flex-row md:items-center md:justify-between">
                    <div class="min-w-0">
                        <h1
                            class="text-xl sm:text-2xl lg:text-3xl font-bold text-slate-800 dark:text-white black:text-zinc-100 flex items-center gap-3">
                            <x-bi-bank2 class="w-7 h-7 sm:w-8 sm:h-8 text-indigo-600 dark:text-indigo-400 shrink-0" />
                            <span class="truncate">Gabinete do Prefeito</span>
                        </h1>
                        <p class="mt-1 text-sm sm:text-base text-slate-500 dark:text-slate-400 black:text-zinc-400">
                            Visão geral consolidada do município.
                        </p>
                    </div>
                </div>
            </div>
            <div class="-mt-5 pt-01">
                {{-- 1. CARDS (KPIs) --}}
                <div class="grid grid-cols-1 md:grid-cols-4 gap-2 m-3">
                    <div id="wrapper-card-gestao" class="min-w-0">
                        <x-cards.box.mainbox id="gestao" :value="'17%'" />
                    </div>
                    <div id="wrapper-card-financas" class="min-w-0">
                        <x-cards.box.mainbox id="financas" :value="'1,79'" />
                    </div>
                    <div id="wrapper-card-nps" class="min-w-0">
                        <x-cards.box.mainbox id="nps" :value="'900.79'" />
                    </div>
                    <div id="wrapper-card-pendencias" class="min-w-0">
                        <x-cards.box.mainbox id="pendencias" :value="'14'" />
                    </div>
                </div>

                {{-- LAYOUT PRINCIPAL --}}
                <div class="pl-3 pr-3 grid grid-cols-1 py-2 md:grid-cols-3 gap-4">

                    {{-- COLUNA DA ESQUERDA --}}
                    <div class="md:col-span-2 space-y-6 min-w-0">

                        {{-- SEÇÃO 1: MODO TV --}}
                        <div
                            class="bg-white dark:bg-slate-800 black:bg-zinc-900 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700 black:border-zinc-800 p-4 sm:p-6">
                            <h3
                                class="text-base sm:text-lg font-semibold text-slate-800 dark:text-white black:text-zinc-100 mb-4 flex items-center gap-2">
                                <x-bi-tv class="w-5 h-5 text-slate-400 dark:text-white black:text-zinc-500" />
                                Monitoramento em Tempo Real (Modo TV)
                            </h3>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                                {{-- Item Painel Geral --}}
                                <a href="{{ route('tv.index') }}" target="_blank"
                                    class="flex items-center gap-4 p-4 rounded-lg border border-slate-200 dark:border-slate-600 black:border-zinc-800 hover:bg-slate-50 black:hover:bg-zinc-800 dark:hover:bg-slate-700 transition-colors group min-w-0">
                                    <div
                                        class="p-3 rounded-full bg-indigo-100 text-indigo-600 dark:bg-indigo-900/50 black:bg-indigo-900/30 dark:text-indigo-400 group-hover:bg-indigo-600 group-hover:text-white transition-colors shrink-0">
                                        <x-bi-speedometer2 class="w-6 h-6" />
                                    </div>
                                    <div class="min-w-0">
                                        <h4
                                            class="font-semibold text-slate-800 dark:text-white black:text-zinc-100 truncate">
                                            Painel Geral</h4>
                                        <p class="text-xs text-slate-500 black:text-zinc-400 truncate">Resumo de todas
                                            as secretarias</p>
                                    </div>
                                    <x-bi-box-arrow-up-right
                                        class="ml-auto shrink-0 text-slate-400 black:text-zinc-600 group-hover:text-indigo-600" />
                                </a>

                                {{-- Item TV Financeiro --}}
                                <a href="{{ route('tv.financeiro') }}" target="_blank"
                                    class="flex items-center gap-4 p-4 rounded-lg border border-slate-200 dark:border-slate-600 black:border-zinc-800 hover:bg-slate-50 black:hover:bg-zinc-800 dark:hover:bg-slate-700 transition-colors group min-w-0">
                                    <div
                                        class="p-3 rounded-full bg-emerald-100 text-emerald-600 dark:bg-emerald-900/30 dark:text-emerald-400 group-hover:bg-emerald-600 group-hover:text-white transition-colors shrink-0">
                                        <x-bi-cash-coin class="w-6 h-6" />
                                    </div>
                                    <div class="min-w-0">
                                        <h4
                                            class="font-semibold text-slate-800 dark:text-white black:text-zinc-100 truncate">
                                            TV Financeiro</h4>
                                        <p class="text-xs text-slate-500 black:text-zinc-400 truncate">Receitas e
                                            Despesas</p>
                                    </div>
                                    <x-bi-box-arrow-up-right
                                        class="ml-auto shrink-0 text-slate-400 black:text-zinc-600 group-hover:text-emerald-600" />
                                </a>

                                {{-- Item TV Saúde --}}
                                <a href="{{ route('tv.saude') }}" target="_blank"
                                    class="flex items-center gap-4 p-4 rounded-lg border border-slate-200 dark:border-slate-600 black:border-zinc-800 hover:bg-slate-50 black:hover:bg-zinc-800 dark:hover:bg-slate-700 transition-colors group min-w-0">
                                    <div
                                        class="p-3 rounded-full bg-rose-100 text-rose-600 dark:bg-rose-900/50 dark:text-rose-400 group-hover:bg-rose-600 group-hover:text-white transition-colors shrink-0">
                                        <x-bi-heart-pulse class="w-6 h-6" />
                                    </div>
                                    <div class="min-w-0">
                                        <h4
                                            class="font-semibold text-slate-800 dark:text-white black:text-zinc-100 truncate">
                                            TV Saúde</h4>
                                        <p class="text-xs text-slate-500 black:text-zinc-400 truncate">Filas e
                                            Atendimentos</p>
                                    </div>
                                    <x-bi-box-arrow-up-right
                                        class="ml-auto shrink-0 text-slate-400 black:text-zinc-600 group-hover:text-rose-600" />
                                </a>

                                {{-- Item TV Educação --}}
                                <a href="{{ route('tv.educacao') }}" target="_blank"
                                    class="flex items-center gap-4 p-4 rounded-lg border border-slate-200 dark:border-slate-600 black:border-zinc-800 hover:bg-slate-50 dark:hover:bg-slate-700 black:hover:bg-zinc-800 transition-colors group min-w-0">
                                    <div
                                        class="p-3 rounded-full bg-blue-100 text-blue-600 dark:bg-blue-900/50 dark:text-blue-400 group-hover:bg-blue-600 group-hover:text-white transition-colors shrink-0">
                                        <x-bi-journal-bookmark class="w-6 h-6" />
                                    </div>
                                    <div class="min-w-0">
                                        <h4
                                            class="font-semibold text-slate-800 dark:text-white black:text-zinc-100 truncate">
                                            TV Educação</h4>
                                        <p class="text-xs text-slate-500 black:text-zinc-400 truncate">Escolas e Alunos
                                        </p>
                                    </div>
                                    <x-bi-box-arrow-up-right
                                        class="ml-auto shrink-0 text-slate-400 black:text-zinc-600 group-hover:text-blue-600" />
                                </a>
                            </div>
                        </div>

                        {{-- SEÇÃO 2: DASHBOARDS GERENCIAIS --}}
                        <div
                            class="bg-white dark:bg-slate-800 black:bg-zinc-900 rounded-xl shadow-sm border border-slate-200 black:border-zinc-800 dark:border-slate-700 p-4 sm:p-6">
                            <h3
                                class="text-base sm:text-lg font-semibold text-slate-800 dark:text-white black:text-zinc-100 mb-4 flex items-center gap-2">
                                <x-bi-grid-1x2 class="w-5 h-5 text-slate-400 black:text-zinc-500" />
                                Acesso aos Dashboards
                            </h3>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                                {{-- Dashboard Prefeito --}}
                                <a href="{{ route('home') }}" target="_blank"
                                    class="flex items-center gap-4 p-4 rounded-lg border border-slate-200 dark:border-slate-600 black:border-zinc-800 hover:bg-indigo-50 black:hover:bg-zinc-800 dark:hover:bg-slate-700 transition-colors group min-w-0">
                                    <div
                                        class="p-3 rounded-full bg-indigo-100 text-indigo-600 dark:bg-indigo-900/50 dark:text-indigo-400 group-hover:bg-indigo-600 group-hover:text-white transition-colors shrink-0">
                                        <x-bi-bank2 class="w-6 h-6" />
                                    </div>
                                    <div class="min-w-0">
                                        <h4
                                            class="font-semibold text-slate-800 dark:text-white black:text-zinc-100 truncate">
                                            Prefeito</h4>
                                        <p class="text-xs text-slate-500 black:text-zinc-400 truncate">Visão Estratégica
                                        </p>
                                    </div>
                                    <x-bi-box-arrow-up-right
                                        class="ml-auto shrink-0 text-slate-400 black:text-zinc-600 group-hover:text-indigo-600" />
                                </a>

                                {{-- Dashboard Financeiro --}}
                                <a href="{{ route('financeiro.home') }}" target="_blank"
                                    class="flex items-center gap-4 p-4 rounded-lg border border-slate-200 dark:border-slate-600 black:border-zinc-800 hover:bg-emerald-50 black:hover:bg-zinc-800 dark:hover:bg-slate-700 transition-colors group min-w-0">
                                    <div
                                        class="p-3 rounded-full bg-emerald-100 text-emerald-600 dark:bg-emerald-900/50 dark:text-emerald-400 group-hover:bg-emerald-600 group-hover:text-white transition-colors shrink-0">
                                        <x-bi-cash-coin class="w-6 h-6" />
                                    </div>
                                    <div class="min-w-0">
                                        <h4
                                            class="font-semibold text-slate-800 dark:text-white black:text-zinc-100 truncate">
                                            Financeiro</h4>
                                        <p class="text-xs text-slate-500 black:text-zinc-400 truncate">Contabilidade e
                                            Tesouraria</p>
                                    </div>
                                    <x-bi-box-arrow-up-right
                                        class="ml-auto shrink-0 text-slate-400 black:text-zinc-600 group-hover:text-emerald-600" />
                                </a>

                                {{-- Dashboard Saúde --}}
                                <a href="{{ route('saude.home') }}" target="_blank"
                                    class="flex items-center gap-4 p-4 rounded-lg border border-slate-200 dark:border-slate-600 black:border-zinc-800 hover:bg-rose-50 dark:hover:bg-slate-700 black:hover:bg-zinc-800 transition-colors group min-w-0">
                                    <div
                                        class="p-3 rounded-full bg-rose-100 text-rose-600 dark:bg-rose-900/50 dark:text-rose-400 group-hover:bg-rose-600 group-hover:text-white transition-colors shrink-0">
                                        <x-bi-heart-pulse class="w-6 h-6" />
                                    </div>
                                    <div class="min-w-0">
                                        <h4
                                            class="font-semibold text-slate-800 dark:text-white black:text-zinc-100 truncate">
                                            Saúde</h4>
                                        <p class="text-xs text-slate-500 black:text-zinc-400 truncate">Gestão SUS</p>
                                    </div>
                                    <x-bi-box-arrow-up-right
                                        class="ml-auto shrink-0 text-slate-400 black:text-zinc-600 group-hover:text-rose-600" />
                                </a>

                                {{-- Dashboard Educação --}}
                                <a href="{{ route('educacao.home') }}" target="_blank"
                                    class="flex items-center gap-4 p-4 rounded-lg border border-slate-200 dark:border-slate-600 black:border-zinc-800 hover:bg-blue-50 black:hover:bg-zinc-800 dark:hover:bg-slate-700 transition-colors group min-w-0">
                                    <div
                                        class="p-3 rounded-full bg-blue-100 text-blue-600 dark:bg-blue-900/50 dark:text-blue-400 group-hover:bg-blue-600 group-hover:text-white transition-colors shrink-0">
                                        <x-bi-journal-bookmark class="w-6 h-6" />
                                    </div>
                                    <div class="min-w-0">
                                        <h4
                                            class="font-semibold text-slate-800 dark:text-white black:text-zinc-100 truncate">
                                            Educação</h4>
                                        <p class="text-xs text-slate-500 black:text-zinc-400 truncate">Ensino e
                                            Matrículas</p>
                                    </div>
                                    <x-bi-box-arrow-up-right
                                        class="ml-auto shrink-0 text-slate-400 black:text-zinc-600 group-hover:text-blue-600" />
                                </a>
                            </div>
                        </div>

                    </div>

                    {{-- COLUNA DA DIREITA --}}
                    <div
                        class="bg-white dark:bg-slate-800 black:bg-zinc-900 rounded-xl shadow-sm border border-slate-200 black:border-zinc-800 dark:border-slate-700 p-4 sm:p-6 flex flex-col min-w-0">

                        {{-- Alertas --}}
                        <div class="flex items-center justify-between gap-3 mb-4">
                            <h3
                                class="text-base sm:text-lg font-semibold text-slate-800 dark:text-white black:text-zinc-100 truncate">
                                Alertas & Avisos
                            </h3>
                            <span
                                class="shrink-0 px-2 py-1 bg-rose-100 text-rose-700 dark:bg-rose-900 dark:text-rose-300 rounded text-xs font-bold">
                                5 Pendentes
                            </span>
                        </div>

                        <div class="space-y-3 sm:space-y-4 mb-6 sm:mb-8">
                            <div class="p-3 rounded bg-amber-50 dark:bg-amber-900/20 border-l-4 border-amber-500">
                                <p class="text-sm font-medium text-slate-800 dark:text-slate-200 black:text-zinc-900">
                                    Limite Prudencial</p>
                                <p class="text-xs text-slate-500 dark:text-slate-300 black:text-zinc-900 mt-1">Folha
                                    atingiu 51% da RCL.</p>
                            </div>

                            <div class="p-3 rounded bg-rose-50 dark:bg-rose-900/20 border-l-4 border-rose-500">
                                <p class="text-sm font-medium text-slate-800 dark:text-slate-200 black:text-zinc-900">
                                    Ambulâncias Paradas</p>
                                <p class="text-xs text-slate-500 dark:text-slate-300 black:text-zinc-900 mt-1">2
                                    veículos em manutenção.</p>
                            </div>

                            <div class="p-3 rounded bg-red-50 dark:bg-red-900/20 border-l-4 border-red-600">
                                <p class="text-sm font-medium text-slate-800 dark:text-slate-200 black:text-zinc-900">
                                    Licitações Atrasadas</p>
                                <p class="text-xs text-slate-500 dark:text-slate-300 black:text-zinc-900 mt-1">Pregão
                                    042/2025 necessita homologação.</p>
                            </div>
                        </div>

                        <hr class="border-slate-200 dark:border-slate-700 black:border-zinc-900 mb-6">

                        {{-- Agenda --}}
                        <div class="flex-1 min-w-0">
                            <h3
                                class="text-sm sm:text-md font-semibold text-slate-700 dark:text-slate-300 black:text-zinc-300 mb-4 flex items-center gap-2">
                                <x-bi-calendar-event class="w-5 h-5 text-slate-400 black:text-zinc-500" />
                                Agenda do Dia
                            </h3>

                            <ul class="space-y-4">
                                <li class="flex gap-3 items-start min-w-0">
                                    <div class="flex flex-col items-center min-w-[3rem] shrink-0">
                                        <span class="text-xs font-bold text-slate-500 black:text-zinc-500">09:00</span>
                                        <div class="h-full w-px bg-slate-200 black:bg-zinc-700 dark:bg-slate-600 my-1">
                                        </div>
                                    </div>
                                    <div class="min-w-0">
                                        <p
                                            class="text-sm font-medium text-slate-800 dark:text-white black:text-zinc-100 truncate">
                                            Reunião de Secretariado</p>
                                        <p class="text-xs text-slate-500 black:text-zinc-400 truncate">Sala de Reuniões
                                            1</p>
                                    </div>
                                </li>

                                <li class="flex gap-3 items-start min-w-0">
                                    <div class="flex flex-col items-center min-w-[3rem] shrink-0">
                                        <span class="text-xs font-bold text-slate-500 black:text-zinc-500">14:30</span>
                                        <div class="h-full w-px bg-slate-200 dark:bg-slate-600 black:bg-zinc-700 my-1">
                                        </div>
                                    </div>
                                    <div class="min-w-0">
                                        <p
                                            class="text-sm font-medium text-slate-800 dark:text-white black:text-zinc-100 truncate">
                                            Visita Técnica</p>
                                        <p class="text-xs text-slate-500 black:text-zinc-400 truncate">Nova UPA Zona
                                            Norte</p>
                                    </div>
                                </li>

                                <li class="flex gap-3 items-start min-w-0">
                                    <div class="flex flex-col items-center min-w-[3rem] shrink-0">
                                        <span class="text-xs font-bold text-slate-500 black:text-zinc-500">16:00</span>
                                    </div>
                                    <div class="min-w-0">
                                        <p
                                            class="text-sm font-medium text-slate-800 dark:text-white black:text-zinc-100 truncate">
                                            Atendimento Público</p>
                                        <p class="text-xs text-slate-500 black:text-zinc-400 truncate">Gabinete</p>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div
                            class="mt-6 pt-4 border-t border-slate-100 dark:border-slate-700 black:border-zinc-800 text-center">
                            <p class="text-xs text-slate-400 black:text-zinc-500">
                                Última atualização do sistema: 5 min atrás
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-layouts.app>
