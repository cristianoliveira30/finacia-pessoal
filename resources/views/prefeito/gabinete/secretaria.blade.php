<x-layouts.app :title="__('Prefeito')">
    {{--
    WRAPPER "DARK":
    Adicionei a classe "dark" aqui para forçar a aplicação do tema Black (Zinc).
    Também defini o fundo base como zinc-950 e o texto padrão como zinc-100.
    --}}
    <div class="dark bg-zinc-950 text-zinc-100 min-h-screen">

        <div class="p-6 space-y-10">

            {{-- CABEÇALHO --}}
            <div class="flex p-5 mx-5 flex-col md:flex-row justify-between items-start md:items-center">
                <div>
                    {{-- Título: zinc-100 --}}
                    <h1 class="text-2xl font-bold text-slate-800 dark:text-zinc-100 flex items-center gap-3">
                        <x-bi-bank2 class="w-8 h-8 text-indigo-600 dark:text-indigo-400" />
                        Gabinete do Prefeito
                    </h1>
                    {{-- Subtítulo: zinc-400 --}}
                    <p class="text-slate-500 dark:text-zinc-400 mt-1">Visão geral consolidada do município.</p>
                </div>
            </div>

            <div class="py-5 -mt-10">
                <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 space-y-6">

                    {{-- 1. SEUS CARDS (KPIs) --}}
                    {{-- Nota: Se estes componentes não ficarem escuros, precisaremos editar o arquivo deles
                    individualmente (x-cards.box.mainbox) --}}
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <div id="wrapper-card-gestao">
                            <x-cards.box.mainbox id="gestao" :value="'17%'" />
                        </div>
                        <div id="wrapper-card-financas">
                            <x-cards.box.mainbox id="financas" :value="'1,79'" />
                        </div>
                        <div id="wrapper-card-nps">
                            <x-cards.box.mainbox id="nps" :value="'900.79'" />
                        </div>
                        <div id="wrapper-card-pendencias">
                            <x-cards.box.mainbox id="pendencias" :value="'14'" />
                        </div>
                    </div>

                    {{-- LAYOUT PRINCIPAL --}}
                    <div class="grid p-2 grid-cols-1 lg:grid-cols-3 gap-6">

                        {{-- COLUNA DA ESQUERDA --}}
                        <div class="lg:col-span-2 space-y-6">

                            {{-- SEÇÃO 1: MODO TV --}}
                            {{-- Container: bg-white no claro -> zinc-900 no escuro --}}
                            {{-- Borda: slate-200 no claro -> zinc-800 no escuro --}}
                            <div
                                class="bg-white dark:bg-zinc-900 rounded-xl shadow-sm border border-slate-200 dark:border-zinc-800 p-6">
                                <h3
                                    class="text-lg font-semibold text-slate-800 dark:text-zinc-100 mb-4 flex items-center gap-2">
                                    <x-bi-tv class="text-slate-400 dark:text-zinc-500" />
                                    Monitoramento em Tempo Real (Modo TV)
                                </h3>

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    {{-- Item Painel Geral --}}
                                    <a href="{{ route('tv.index') }}" target="_blank"
                                        class="flex items-center gap-4 p-4 rounded-lg border border-slate-200 dark:border-zinc-800 hover:bg-slate-50 dark:hover:bg-zinc-800 transition-colors group">
                                        <div
                                            class="p-3 rounded-full bg-indigo-100 text-indigo-600 dark:bg-indigo-900/30 dark:text-indigo-400 group-hover:bg-indigo-600 group-hover:text-white transition-colors">
                                            <x-bi-speedometer2 class="w-6 h-6" />
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-slate-800 dark:text-zinc-100">Painel Geral
                                            </h4>
                                            <p class="text-xs text-slate-500 dark:text-zinc-400">Resumo de todas as
                                                secretarias</p>
                                        </div>
                                        <x-bi-box-arrow-up-right
                                            class="ml-auto text-slate-400 dark:text-zinc-600 group-hover:text-indigo-600" />
                                    </a>

                                    {{-- Item TV Financeiro --}}
                                    <a href="{{ route('tv.financeiro') }}" target="_blank"
                                        class="flex items-center gap-4 p-4 rounded-lg border border-slate-200 dark:border-zinc-800 hover:bg-slate-50 dark:hover:bg-zinc-800 transition-colors group">
                                        <div
                                            class="p-3 rounded-full bg-emerald-100 text-emerald-600 dark:bg-emerald-900/30 dark:text-emerald-400 group-hover:bg-emerald-600 group-hover:text-white transition-colors">
                                            <x-bi-cash-coin class="w-6 h-6" />
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-slate-800 dark:text-zinc-100">TV Financeiro
                                            </h4>
                                            <p class="text-xs text-slate-500 dark:text-zinc-400">Receitas e Despesas</p>
                                        </div>
                                        <x-bi-box-arrow-up-right
                                            class="ml-auto text-slate-400 dark:text-zinc-600 group-hover:text-emerald-600" />
                                    </a>

                                    {{-- Item TV Saúde --}}
                                    <a href="{{ route('tv.saude') }}" target="_blank"
                                        class="flex items-center gap-4 p-4 rounded-lg border border-slate-200 dark:border-zinc-800 hover:bg-slate-50 dark:hover:bg-zinc-800 transition-colors group">
                                        <div
                                            class="p-3 rounded-full bg-rose-100 text-rose-600 dark:bg-rose-900/30 dark:text-rose-400 group-hover:bg-rose-600 group-hover:text-white transition-colors">
                                            <x-bi-heart-pulse class="w-6 h-6" />
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-slate-800 dark:text-zinc-100">TV Saúde</h4>
                                            <p class="text-xs text-slate-500 dark:text-zinc-400">Filas e Atendimentos
                                            </p>
                                        </div>
                                        <x-bi-box-arrow-up-right
                                            class="ml-auto text-slate-400 dark:text-zinc-600 group-hover:text-rose-600" />
                                    </a>

                                    {{-- Item TV Educação --}}
                                    <a href="{{ route('tv.educacao') }}" target="_blank"
                                        class="flex items-center gap-4 p-4 rounded-lg border border-slate-200 dark:border-zinc-800 hover:bg-slate-50 dark:hover:bg-zinc-800 transition-colors group">
                                        <div
                                            class="p-3 rounded-full bg-blue-100 text-blue-600 dark:bg-blue-900/30 dark:text-blue-400 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                                            <x-bi-journal-bookmark class="w-6 h-6" />
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-slate-800 dark:text-zinc-100">TV Educação</h4>
                                            <p class="text-xs text-slate-500 dark:text-zinc-400">Escolas e Alunos</p>
                                        </div>
                                        <x-bi-box-arrow-up-right
                                            class="ml-auto text-slate-400 dark:text-zinc-600 group-hover:text-blue-600" />
                                    </a>
                                </div>
                            </div>

                            {{-- SEÇÃO 2: DASHBOARDS GERENCIAIS --}}
                            <div
                                class="bg-white dark:bg-zinc-900 rounded-xl shadow-sm border border-slate-200 dark:border-zinc-800 p-6">
                                <h3
                                    class="text-lg font-semibold text-slate-800 dark:text-zinc-100 mb-4 flex items-center gap-2">
                                    <x-bi-grid-1x2 class="text-slate-400 dark:text-zinc-500" />
                                    Acesso aos Dashboards
                                </h3>

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    {{-- Dashboard Prefeito --}}
                                    <a href="{{ route('home') }}" target="_blank"
                                        class="flex items-center gap-4 p-4 rounded-lg border border-slate-200 dark:border-zinc-800 hover:bg-indigo-50 dark:hover:bg-zinc-800 transition-colors group">
                                        <div
                                            class="p-3 rounded-full bg-indigo-100 text-indigo-600 dark:bg-indigo-900/30 dark:text-indigo-400 group-hover:bg-indigo-600 group-hover:text-white transition-colors">
                                            <x-bi-bank2 class="w-6 h-6" />
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-slate-800 dark:text-zinc-100">Prefeito</h4>
                                            <p class="text-xs text-slate-500 dark:text-zinc-400">Visão Estratégica</p>
                                        </div>
                                        <x-bi-box-arrow-up-right
                                            class="ml-auto text-slate-400 dark:text-zinc-600 group-hover:text-indigo-600" />
                                    </a>

                                    {{-- Dashboard Financeiro --}}
                                    <a href="{{ route('financeiro.home') }}" target="_blank"
                                        class="flex items-center gap-4 p-4 rounded-lg border border-slate-200 dark:border-zinc-800 hover:bg-emerald-50 dark:hover:bg-zinc-800 transition-colors group">
                                        <div
                                            class="p-3 rounded-full bg-emerald-100 text-emerald-600 dark:bg-emerald-900/30 dark:text-emerald-400 group-hover:bg-emerald-600 group-hover:text-white transition-colors">
                                            <x-bi-cash-coin class="w-6 h-6" />
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-slate-800 dark:text-zinc-100">Financeiro</h4>
                                            <p class="text-xs text-slate-500 dark:text-zinc-400">Contabilidade e
                                                Tesouraria</p>
                                        </div>
                                        <x-bi-box-arrow-up-right
                                            class="ml-auto text-slate-400 dark:text-zinc-600 group-hover:text-emerald-600" />
                                    </a>

                                    {{-- Dashboard Saúde --}}
                                    <a href="{{ route('saude.home') }}" target="_blank"
                                        class="flex items-center gap-4 p-4 rounded-lg border border-slate-200 dark:border-zinc-800 hover:bg-rose-50 dark:hover:bg-zinc-800 transition-colors group">
                                        <div
                                            class="p-3 rounded-full bg-rose-100 text-rose-600 dark:bg-rose-900/30 dark:text-rose-400 group-hover:bg-rose-600 group-hover:text-white transition-colors">
                                            <x-bi-heart-pulse class="w-6 h-6" />
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-slate-800 dark:text-zinc-100">Saúde</h4>
                                            <p class="text-xs text-slate-500 dark:text-zinc-400">Gestão SUS</p>
                                        </div>
                                        <x-bi-box-arrow-up-right
                                            class="ml-auto text-slate-400 dark:text-zinc-600 group-hover:text-rose-600" />
                                    </a>

                                    {{-- Dashboard Educação --}}
                                    <a href="{{ route('educacao.home') }}" target="_blank"
                                        class="flex items-center gap-4 p-4 rounded-lg border border-slate-200 dark:border-zinc-800 hover:bg-blue-50 dark:hover:bg-zinc-800 transition-colors group">
                                        <div
                                            class="p-3 rounded-full bg-blue-100 text-blue-600 dark:bg-blue-900/30 dark:text-blue-400 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                                            <x-bi-journal-bookmark class="w-6 h-6" />
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-slate-800 dark:text-zinc-100">Educação</h4>
                                            <p class="text-xs text-slate-500 dark:text-zinc-400">Ensino e Matriculas</p>
                                        </div>
                                        <x-bi-box-arrow-up-right
                                            class="ml-auto text-slate-400 dark:text-zinc-600 group-hover:text-blue-600" />
                                    </a>
                                </div>
                            </div>

                        </div>

                        {{-- COLUNA DA DIREITA --}}
                        <div
                            class="bg-white dark:bg-zinc-900 rounded-xl shadow-sm border border-slate-200 dark:border-zinc-800 p-6 flex flex-col h-full">

                            {{-- Bloco 1: Alertas Críticos --}}
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg font-semibold text-slate-800 dark:text-zinc-100">Alertas & Avisos
                                </h3>
                                <span
                                    class="px-2 py-1 bg-rose-100 text-rose-700 dark:bg-rose-900 dark:text-rose-300 rounded text-xs font-bold">
                                    5 Pendentes
                                </span>
                            </div>

                            <div class="space-y-4 mb-8">
                                <div class="p-3 rounded bg-amber-50 dark:bg-amber-900/20 border-l-4 border-amber-500">
                                    <p class="text-sm font-medium text-slate-800 dark:text-zinc-200">Limite Prudencial
                                    </p>
                                    <p class="text-xs text-slate-500 dark:text-zinc-400 mt-1">Folha atingiu 51% da RCL.
                                    </p>
                                </div>

                                <div class="p-3 rounded bg-rose-50 dark:bg-rose-900/20 border-l-4 border-rose-500">
                                    <p class="text-sm font-medium text-slate-800 dark:text-zinc-200">Ambulâncias Paradas
                                    </p>
                                    <p class="text-xs text-slate-500 dark:text-zinc-400 mt-1">2 veículos em manutenção.
                                    </p>
                                </div>

                                <div class="p-3 rounded bg-red-50 dark:bg-red-900/20 border-l-4 border-red-600">
                                    <p class="text-sm font-medium text-slate-800 dark:text-zinc-200">Licitações
                                        Atrasadas</p>
                                    <p class="text-xs text-slate-500 dark:text-zinc-400 mt-1">Pregão 042/2025 necessita
                                        homologação.</p>
                                </div>
                            </div>

                            <hr class="border-slate-200 dark:border-zinc-800 mb-6">

                            {{-- Bloco 2: Agenda --}}
                            <div class="flex-1">
                                <h3
                                    class="text-md font-semibold text-slate-700 dark:text-zinc-300 mb-4 flex items-center gap-2">
                                    <x-bi-calendar-event class="text-slate-400 dark:text-zinc-500" /> Agenda do Dia
                                </h3>

                                <ul class="space-y-4">
                                    <li class="flex gap-3 items-start">
                                        <div class="flex flex-col items-center min-w-[3rem]">
                                            <span
                                                class="text-xs font-bold text-slate-500 dark:text-zinc-500">09:00</span>
                                            <div class="h-full w-px bg-slate-200 dark:bg-zinc-700 my-1"></div>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-slate-800 dark:text-zinc-100">Reunião de
                                                Secretariado</p>
                                            <p class="text-xs text-slate-500 dark:text-zinc-400">Sala de Reuniões 1</p>
                                        </div>
                                    </li>
                                    <li class="flex gap-3 items-start">
                                        <div class="flex flex-col items-center min-w-[3rem]">
                                            <span
                                                class="text-xs font-bold text-slate-500 dark:text-zinc-500">14:30</span>
                                            <div class="h-full w-px bg-slate-200 dark:bg-zinc-700 my-1"></div>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-slate-800 dark:text-zinc-100">Visita
                                                Técnica</p>
                                            <p class="text-xs text-slate-500 dark:text-zinc-400">Nova UPA Zona Norte</p>
                                        </div>
                                    </li>
                                    <li class="flex gap-3 items-start">
                                        <div class="flex flex-col items-center min-w-[3rem]">
                                            <span
                                                class="text-xs font-bold text-slate-500 dark:text-zinc-500">16:00</span>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-slate-800 dark:text-zinc-100">Atendimento
                                                Público</p>
                                            <p class="text-xs text-slate-500 dark:text-zinc-400">Gabinete</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="mt-6 pt-4 border-t border-slate-100 dark:border-zinc-800 text-center">
                                <p class="text-xs text-slate-400 dark:text-zinc-500">Última atualização do sistema: 5
                                    min atrás</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>