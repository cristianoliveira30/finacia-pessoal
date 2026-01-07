@props([
    'id' => 'card-' . uniqid(),
    'title' => 'Indicador',
    'chart' => [],
    'chartType' => 'area',
    'chartId' => null,
])

@php
    $rangeButtonId = $id . '-range-button';
    $rangeDropdownId = $id . '-range-dropdown';
    $downloadButtonId = $id . '-download-button';
    $downloadDropId = $id . '-download-dropdown';
    $tableId = $id . '-datatable';
    $accordionBodyId = $id . '-accordion-body';
    $filterSectionId = $id . '-filter-section';
    $aiSectionId = $id . '-ai-section';
    $resolvedChartId = $chartId ?: $id . '-chart';
@endphp

<div id="{{ $id }}" data-accordion="collapse"
    class="relative w-full overflow-hidden h-fit transition-all duration-100 ease-in-out
           rounded-2xl border border-slate-300 bg-white shadow-xl
           dark:border-slate-700
           dark:bg-gradient-to-br dark:from-slate-950 dark:via-slate-900 dark:to-sky-900">

    <div class="relative z-10">
        {{-- Topo (Responsivo: Coluna no Mobile / Linha no Desktop) --}}
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3 p-3">
            
            {{-- Título --}}
            <div class="space-y-2 text-center md:text-left w-full md:w-auto">
                <h5 class="text-lg md:text-xl font-semibold tracking-tight text-slate-800 dark:text-slate-50">
                    {{ $title }}
                </h5>
            </div>

            {{-- Botões (Alinhados à direita no mobile e desktop) --}}
            <div class="flex items-center justify-end gap-2 w-full md:w-auto">
                {{-- Toggle Gráfico/Tabela --}}
                <div
                    class="inline-flex rounded-xl m-0 border border-slate-300 bg-slate-100 overflow-hidden dark:border-slate-700 dark:bg-slate-900/60">
                    <button type="button" data-card-view-toggle="{{ $id }}" data-view="chart"
                        class="text-xs px-3 py-2 font-medium bg-white text-slate-600 hover:bg-slate-200 hover:text-slate-900 focus:outline-none focus:ring-2 focus:ring-slate-400 dark:bg-slate-800/80 dark:text-slate-200 dark:hover:bg-slate-700 dark:hover:text-white dark:focus:ring-sky-500/40">
                        <x-bi-graph-up />
                    </button>
                    <button type="button" data-card-view-toggle="{{ $id }}" data-view="table"
                        class="text-xs px-3 py-2 font-medium bg-white text-slate-600 hover:bg-slate-200 hover:text-slate-900 focus:outline-none focus:ring-2 focus:ring-slate-400 dark:bg-slate-800/80 dark:text-slate-200 dark:hover:bg-slate-700 dark:hover:text-white dark:focus:ring-sky-500/40">
                        <x-bi-table />
                    </button>
                </div>

                {{-- Botão Expandir --}}
                <button type="button" id="{{ $id }}-btn-expand" onclick="toggleExpand('{{ $id }}')"
                    class="text-xs px-3 py-2 font-medium bg-white text-slate-600 border border-slate-300 rounded-lg hover:bg-slate-100 hover:text-slate-900 focus:outline-none focus:ring-2 focus:ring-slate-400 dark:bg-slate-800/80 dark:text-slate-200 dark:border-slate-600 dark:hover:bg-slate-700 dark:hover:text-white dark:focus:ring-sky-500/40">
                    <x-bi-arrows-fullscreen />
                </button>

                {{-- Botão Collapse --}}
                <button type="button" data-accordion-target="#{{ $accordionBodyId }}" aria-expanded="false"
                    aria-controls="{{ $accordionBodyId }}"
                    class="text-xs px-3 py-2 font-medium bg-white text-slate-600 border border-slate-300 rounded-lg hover:bg-slate-100 hover:text-slate-900 focus:outline-none focus:ring-2 focus:ring-slate-400 dark:bg-slate-800/80 dark:text-slate-200 dark:border-slate-600 dark:hover:bg-slate-700 dark:hover:text-white dark:focus:ring-sky-500/40">
                    <x-bi-caret-down-fill class="w-3 h-3 shrink-0 transition-transform duration-200"
                        data-accordion-icon />
                </button>
            </div>
        </div>

        {{-- WRAPPER DO ACCORDION --}}
        <div id="{{ $accordionBodyId }}" class="hidden" aria-labelledby="{{ $id }}-collapse-heading">

            {{-- Área do Gráfico / Tabela --}}
            <div>
                <div data-card-section="chart">
                    @switch($chartType)
                        @case('area')
                            <x-cards.graph.area-chart :data="$chart" />
                        @break

                        @case('pie')
                            <x-cards.graph.pie-chart :data="$chart" />
                        @break

                        @case('column')
                            <x-cards.graph.column-chart :data="$chart" />
                        @break

                        @case('bar')
                            <x-cards.graph.bar-chart :data="$chart" />
                        @break

                        @case('radial')
                            <x-cards.graph.radial-chart :data="$chart" />
                        @break

                        @default
                    @endswitch
                </div>
                <div data-card-section="table" class="hidden">
                    <x-cards.graph.table :table-id="$tableId" :chart="$chart" />
                </div>
            </div>

            {{-- Footer --}}
            <div
                class="flex flex-col md:flex-row md:items-center md:justify-between gap-3 p-3 border-t border-slate-200 dark:border-slate-700/80">

                <div class="text-xs md:text-sm text-slate-500 dark:text-slate-400">
                    <span class="font-medium text-slate-600 dark:text-slate-200">Atualizado em:</span>
                    {{ date('d/m/Y') }}
                </div>

                <div class="flex items-center gap-2">

                    {{-- 1. Botão RECARREGAR --}}
                    @php $tooltipRefresh = $id . '-tooltip-recarregar'; @endphp
                    <button type="button" id="{{ $id }}-btn-refresh"
                        onclick="Refresh('{{ $id }}')" data-tooltip-target="{{ $tooltipRefresh }}"
                        data-tooltip-placement="top"
                        class="text-xs px-3 py-2 font-medium bg-sky-600 text-white border border-sky-600 rounded-lg hover:bg-sky-700 hover:text-white shadow-md focus:outline-none focus:ring-2 focus:ring-sky-400 dark:bg-sky-800/80 dark:border-slate-600 dark:hover:bg-sky-700 dark:hover:text-white dark:focus:ring-sky-500/40">
                        <x-bi-arrow-clockwise />
                    </button>
                    {{-- Tooltip Recarregar --}}
                    <div id="{{ $tooltipRefresh }}" role="tooltip"
                        class="absolute z-50 invisible inline-block px-3 py-2 text-xs font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        Atualizar indicador <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>


                    {{-- 2. Botão IA --}}
                    @php $tooltipAi = $id . '-tooltip-ai'; @endphp
                    <button type="button" data-collapse-toggle="{{ $aiSectionId }}"
                        aria-controls="{{ $aiSectionId }}" aria-expanded="false"
                        data-tooltip-target="{{ $tooltipAi }}" data-tooltip-placement="top"
                        class="text-xs px-3 py-2 font-medium bg-white text-slate-600 border border-slate-300 rounded-lg hover:bg-slate-100 hover:text-slate-900 focus:outline-none focus:ring-2 focus:ring-slate-400 dark:bg-slate-800/80 dark:text-slate-200 dark:border-slate-600 dark:hover:bg-slate-700 dark:hover:text-white dark:focus:ring-sky-500/40">
                        <x-bi-openai />
                    </button>
                    {{-- Tooltip IA --}}
                    <div id="{{ $tooltipAi }}" role="tooltip"
                        class="absolute z-50 invisible inline-block px-3 py-2 text-xs font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        Assistente IA <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>


                    {{-- 3. Botão FILTRO --}}
                    @php $tooltipFilter = $id . '-tooltip-filter'; @endphp
                    <button type="button" data-collapse-toggle="{{ $filterSectionId }}"
                        aria-controls="{{ $filterSectionId }}" aria-expanded="false"
                        data-tooltip-target="{{ $tooltipFilter }}" data-tooltip-placement="top"
                        class="text-xs px-3 py-2 font-medium bg-white text-slate-600 border border-slate-300 rounded-lg hover:bg-slate-100 hover:text-slate-900 focus:outline-none focus:ring-2 focus:ring-slate-400 dark:bg-slate-800/80 dark:text-slate-200 dark:border-slate-600 dark:hover:bg-slate-700 dark:hover:text-white dark:focus:ring-sky-500/40">
                        <x-bi-funnel-fill />
                    </button>
                    {{-- Tooltip Filtro --}}
                    <div id="{{ $tooltipFilter }}" role="tooltip"
                        class="absolute z-50 invisible inline-block px-3 py-2 text-xs font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        Filtros <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>


                    {{-- 4. Dropdown DOWNLOAD --}}
                    <div class="relative">
                        <button id="{{ $downloadButtonId }}" data-dropdown-toggle="{{ $downloadDropId }}"
                            type="button"
                            class="inline-flex items-center gap-1.5 px-3 py-2 text-xs md:text-sm font-medium rounded-lg border justify-center bg-white text-slate-600 border-slate-300 hover:bg-slate-100 hover:text-slate-900 focus:outline-none focus:ring-2 focus:ring-slate-400 dark:bg-slate-800/80 dark:text-slate-300 dark:border-slate-600 dark:hover:bg-slate-700 dark:hover:text-slate-50 dark:focus:ring-sky-500/40">
                            <x-bi-download class="w-4 h-4" />
                        </button>

                        <div id="{{ $downloadDropId }}"
                            class="z-50 hidden mt-2 bg-white divide-y divide-slate-100 rounded-lg shadow-2xl border border-slate-200 dark:bg-slate-800 dark:divide-slate-700 dark:border-slate-700">
                            <ul class="py-2 text-sm text-slate-600 dark:text-slate-200"
                                aria-labelledby="{{ $downloadButtonId }}">

                                {{-- PDF --}}
                                @php $tooltipPdf = $id . '-tooltip-pdf'; @endphp
                                <li>
                                    <a href="#" id="{{ $id }}-btn-download-pdf"
                                        data-tooltip-target="{{ $tooltipPdf }}" data-tooltip-placement="left"
                                        class="flex items-center gap-2 px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-700/70 dark:hover:text-white">
                                        <x-bi-filetype-pdf class="w-4 h-4 shrink-0" />
                                    </a>
                                </li>
                                <div id="{{ $tooltipPdf }}" role="tooltip"
                                    class="absolute z-50 invisible inline-block px-3 py-2 text-xs font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    PDF <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>

                                {{-- XLSX --}}
                                @php $tooltipXlsx = $id . '-tooltip-xlsx'; @endphp
                                <li>
                                    <a href="#" id="{{ $id }}-btn-download-xlsx"
                                        data-tooltip-target="{{ $tooltipXlsx }}" data-tooltip-placement="left"
                                        class="flex items-center gap-2 px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-700/70 dark:hover:text-white">
                                        <x-bi-filetype-xlsx class="w-4 h-4 shrink-0" />
                                    </a>
                                </li>
                                <div id="{{ $tooltipXlsx }}" role="tooltip"
                                    class="absolute z-50 invisible inline-block px-3 py-2 text-xs font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    Excel <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>

                                {{-- CSV --}}
                                @php $tooltipCsv = $id . '-tooltip-csv'; @endphp
                                <li>
                                    <a href="#" id="{{ $id }}-btn-download-csv"
                                        data-tooltip-target="{{ $tooltipCsv }}" data-tooltip-placement="left"
                                        class="flex items-center gap-2 px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-700/70 dark:hover:text-white">
                                        <x-bi-filetype-csv class="w-4 h-4 shrink-0" />
                                    </a>
                                </li>
                                <div id="{{ $tooltipCsv }}" role="tooltip"
                                    class="absolute z-50 invisible inline-block px-3 py-2 text-xs font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    CSV <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Filtros --}}
            <div id="{{ $filterSectionId }}" class="hidden border-t border-slate-200 dark:border-slate-700/80 p-4">
                <div class="space-y-4">
                    @if ($chartType === 'column' && !empty($chart['overlays']))
                        <h6 class="text-sm font-semibold text-slate-800 dark:text-slate-200">Linhas no gráfico</h6>

                        <div class="inline-flex rounded-xl border border-slate-300 bg-slate-100 overflow-hidden
                                    dark:border-slate-700 dark:bg-slate-900/60 mt-2"
                            data-overlay-toggle
                            data-chart-id="{{ $resolvedChartId }}"
                            data-default-mode="movingAverage">

                            @php
                                $btnBase = 'text-xs px-3 py-2 font-medium transition-colors';
                                $btnIdle = 'bg-white text-slate-600 hover:bg-slate-200 hover:text-slate-900
                                            dark:bg-slate-800/60 dark:text-slate-200 dark:hover:bg-slate-700 dark:hover:text-white';
                            @endphp

                            <button type="button" data-overlay-mode="none" class="{{ $btnBase }} {{ $btnIdle }}">
                                Nenhuma
                            </button>

                            <button type="button" data-overlay-mode="movingAverage" class="{{ $btnBase }} {{ $btnIdle }}">
                                Média móvel
                            </button>

                            <button type="button" data-overlay-mode="trendline" class="{{ $btnBase }} {{ $btnIdle }}">
                                Tendência
                            </button>
                        </div>
                    @endif

                    <h6 class="text-sm font-semibold text-slate-800 dark:text-slate-200">Período da Solicitação</h6>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="space-y-1">
                            <label class="block text-xs font-medium text-slate-600 dark:text-slate-400">De</label>
                            <div class="relative">
                                <div
                                    class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none text-slate-500 dark:text-slate-400">
                                    <x-bi-calendar class="w-3.5 h-3.5" />
                                </div>
                                <input type="text" id="{{ $id }}-start-date"
                                    placeholder="dd / mm / aaaa"
                                    class="bg-white border border-slate-300 text-slate-700 text-sm rounded-lg focus:ring-sky-600 focus:border-sky-600 block w-full ps-10 p-2.5 dark:bg-slate-800 dark:border-slate-600 dark:placeholder-slate-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500">
                            </div>
                        </div>
                        <div class="space-y-1">
                            <label class="block text-xs font-medium text-slate-600 dark:text-slate-400">Até</label>
                            <div class="relative">
                                <div
                                    class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none text-slate-500 dark:text-slate-400">
                                    <x-bi-calendar class="w-3.5 h-3.5" />
                                </div>
                                <input type="text" id="{{ $id }}-end-date" placeholder="dd / mm / aaaa"
                                    class="bg-white border border-slate-300 text-slate-700 text-sm rounded-lg focus:ring-sky-600 focus:border-sky-600 block w-full ps-10 p-2.5 dark:bg-slate-800 dark:border-slate-600 dark:placeholder-slate-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500">
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <button type="button"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Aplicar
                            Filtros</button>
                    </div>
                </div>
            </div>

            {{-- IA --}}
            <div id="{{ $aiSectionId }}" class="hidden border-t border-slate-200 dark:border-slate-700/80 p-4">
                <form id="{{ $id }}-ai-form" action="{{ route('ai.analise') }}" method="POST"
                    class="space-y-4" data-card-ai-form data-card-id="{{ $id }}"
                    data-ai-title="{{ e($title ?? '') }}" data-ai-chart-type="{{ $chartType ?? '' }}">
                    @csrf
                    <script type="application/json" id="{{ $id }}-ai-chart-json">
                        @json($chart ?? [])
                    </script>
                    <h6 class="text-sm font-semibold text-slate-800 dark:text-slate-200">Assistente Virtual</h6>

                    <div class="space-y-2">
                        <label class="block text-xs font-medium text-slate-500 dark:text-slate-400">
                            O que você deseja saber sobre este gráfico?
                        </label>

                        <div class="flex gap-2 items-start">
                            <div id="{{ $id }}-ai-prompt" name="prompt" rows="1" required
                                class="flex-1 block p-2 text-sm text-slate-500 bg-white rounded-lg border border-slate-300 focus:ring-sky-600 focus:border-sky-600 resize-none dark:bg-slate-800 dark:border-slate-600 dark:placeholder-slate-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500"
                                placeholder="Digite sua pergunta aqui..."></div>

                            <button type="submit"
                                class="text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-4 py-2.5 inline-flex items-center justify-center disabled:opacity-60 disabled:cursor-not-allowed dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800 h-full max-h-[42px] self-start mt-0.5"
                                data-ai-submit>
                                <span data-ai-btn-text class="inline-flex items-center">
                                    <x-bi-stars class="w-3 h-3" /> <x-bi-send-fill
                                        class="w-3 h-3 transform rotate-45" />
                                </span>
                                <div data-ai-btn-loading class="hidden">
                                    <x-loading size="sm" />
                                </div>
                            </button>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label class="block text-xs font-medium text-slate-600 dark:text-slate-400">Resposta da
                            IA</label>
                        <div id="{{ $id }}-ai-response"
                            class="block p-2.5 w-full text-sm text-slate-700 bg-slate-100 rounded-lg border border-slate-200
                                    dark:bg-slate-900/50 dark:border-slate-700 dark:text-slate-200
                                    whitespace-pre-wrap"> Resposta da IA
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

{{-- Scripts e Integração JS/Blade --}}
@once
    @push('scripts')
        <script>
            // Função visual das abas
            window.initReportCard = function(cId) {
                const card = document.getElementById(cId);
                if (!card) return;

                const sections = card.querySelectorAll('[data-card-section]');
                const setView = (view) => {
                    sections.forEach((section) => {
                        section.classList.toggle('hidden', section.getAttribute('data-card-section') !== view);
                    });
                };
                card.querySelectorAll('[data-card-view-toggle]').forEach((btn) => {
                    btn.addEventListener('click', () => setView(btn.getAttribute('data-view')));
                });
            };

            // Função unificada e OTIMIZADA para downloads
            window.setupCardDownloads = function(cardId, data) {
                // Lista de ações suportadas
                const actions = [{
                        id: 'pdf',
                        fn: window.baixarPDF
                    },
                    {
                        id: 'csv',
                        fn: window.baixarCSV
                    },
                    {
                        id: 'xlsx',
                        fn: window.baixarXLSX
                    }
                ];

                actions.forEach(action => {
                    const btn = document.getElementById(`${cardId}-btn-download-${action.id}`);
                    if (btn) {
                        const newBtn = btn.cloneNode(true);
                        btn.parentNode.replaceChild(newBtn, btn);

                        newBtn.addEventListener('click', (e) => {
                            e.preventDefault();
                            action.fn(data);
                        });
                    }
                });
            };
        </script>
    @endpush
@endonce

{{-- Script de Inicialização por Instância --}}
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (window.initReportCard) window.initReportCard('{{ $id }}');

            // Passa os dados para o JS
            if (window.setupCardDownloads) window.setupCardDownloads('{{ $id }}',
                @json($chart));
        });
    </script>
@endpush
