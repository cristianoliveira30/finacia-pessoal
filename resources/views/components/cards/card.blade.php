@props([
    'id' => 'card-' . uniqid(),
    'title' => 'Relatório',
    'chart' => [],
    'chartType' => 'area', // 👈 novo: tipo de gráfico (area, pie, ...)
    'chartId' => null, // 👈 opcional: permite sobrescrever o id do gráfico
])

@php
    $rangeButtonId = $id . '-range-button';
    $rangeDropdownId = $id . '-range-dropdown';
    $downloadButtonId = $id . '-download-button';
    $downloadDropId = $id . '-download-dropdown';
    $tableId = $id . '-datatable';

    $resolvedChartId = $chartId ?: $id . '-chart';
@endphp

<div id="{{ $id }}"
    class="relative w-full overflow-hidden h-fit transition-all duration-100 ease-in-out
           rounded-2xl border border-slate-200 bg-blue-50 shadow-sm
           dark:border-slate-700
           dark:bg-gradient-to-br dark:from-slate-950 dark:via-slate-900 dark:to-sky-900">

    {{-- glows omitidos pra encurtar --}}

    <div class="relative z-10">

        {{-- Topo --}}
        <div class="flex justify-between items-start gap-4 p-3">
            <div class="space-y-2">
                <h5 class="text-lg md:text-xl font-semibold tracking-tight text-slate-900 dark:text-slate-50">
                    {{ $title }}
                </h5>
            </div>

            <div class="space-y-2 gap-2 flex justify-center items-center">
                <div
                    class="inline-flex rounded-xl m-0 border border-slate-200 bg-slate-50 overflow-hidden dark:border-slate-700 dark:bg-slate-900/60">
                    <button type="button" data-card-view-toggle="{{ $id }}" data-view="chart"
                        class="text-xs px-3 py-2 font-medium
                       bg-white text-slate-600
                       hover:bg-slate-50 hover:text-slate-900
                       focus:outline-none focus:ring-2 focus:ring-slate-300
                       dark:bg-slate-800/80 dark:text-slate-200
                       dark:hover:bg-slate-700 dark:hover:text-white dark:focus:ring-sky-500/40">
                        <x-bi-graph-up />
                    </button>
                    <button type="button" data-card-view-toggle="{{ $id }}" data-view="table"
                        class="text-xs px-3 py-2 font-medium
                       bg-white text-slate-600
                       hover:bg-slate-50 hover:text-slate-900
                       focus:outline-none focus:ring-2 focus:ring-slate-300
                       dark:bg-slate-800/80 dark:text-slate-200
                       dark:hover:bg-slate-700 dark:hover:text-white dark:focus:ring-sky-500/40">
                        <x-bi-table />
                    </button>
                </div>
                <button type="button" id="{{ $id }}-btn-expand" onclick="toggleExpand('{{ $id }}')"
                    data-tooltip-target="tooltip-recarregar"
                    class="text-xs px-3 py-2 font-medium
                    bg-white text-slate-600 border border-slate-200 rounded-lg
                    hover:bg-slate-50 hover:text-slate-900
                    focus:outline-none focus:ring-2 focus:ring-slate-300
                    dark:bg-slate-800/80 dark:text-slate-200 dark:border-slate-600
                    dark:hover:bg-slate-700 dark:hover:text-white dark:focus:ring-sky-500/40">
                    <x-bi-arrows-fullscreen />
                </button>
            </div>
        </div>

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



        {{-- Footer: Ações de Download --}}
        <div
            class="flex flex-col md:flex-row md:items-center md:justify-between gap-3 p-3 border-t border-slate-100 dark:border-slate-700/80">
            <div class="text-xs md:text-sm text-slate-500 dark:text-slate-400">
                <span class="font-medium text-slate-600 dark:text-slate-200">
                    Gerado em:
                </span>
                {{ date('d/m/Y') }}
            </div>

            <div class="flex items-center gap-2">
                @php
                    $tooltipId = $id . '-tooltip-recarregar';
                @endphp
                <button type="button" data-tooltip-target="{{ $tooltipId }}" data-tooltip-placement="top"
                    class="text-xs px-3 py-2 font-medium
                    bg-sky-500 text-white border border-slate-200 rounded-lg
                    hover:bg-sky-600 hover:text-white
                    focus:outline-none focus:ring-2 focus:ring-sky-300
                    dark:bg-sky-800/80 dark:border-slate-600
                    dark:hover:bg-sky-700 dark:hover:text-white dark:focus:ring-sky-500/40">
                    <x-bi-arrow-clockwise />
                </button>

                <div id="{{ $tooltipId }}" role="tooltip"
                    class="absolute z-20 invisible inline-block px-3 py-2 text-xs font-medium
                    text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm
                    opacity-0 tooltip dark:bg-gray-700">
                    Recarregar gráfico
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>

                <button type="button"
                    class="text-xs px-3 py-2 font-medium
                           bg-white text-slate-600 border border-slate-200 rounded-lg
                           hover:bg-slate-50 hover:text-slate-900
                           focus:outline-none focus:ring-2 focus:ring-slate-300
                           dark:bg-slate-800/80 dark:text-slate-200 dark:border-slate-600
                           dark:hover:bg-slate-700 dark:hover:text-white dark:focus:ring-sky-500/40">
                    <x-bi-openai />
                </button>

                <button type="button"
                    class="text-xs px-3 py-2 font-medium
                    bg-white text-slate-600 border border-slate-200 rounded-lg
                    hover:bg-slate-50 hover:text-slate-900
                    focus:outline-none focus:ring-2 focus:ring-slate-300
                    dark:bg-slate-800/80 dark:text-slate-200 dark:border-slate-600
                    dark:hover:bg-slate-700 dark:hover:text-white dark:focus:ring-sky-500/40">
                    <x-bi-funnel-fill />
                </button>

                {{-- Dropdown de Download --}}
                <div class="relative">
                    <button id="{{ $downloadButtonId }}" data-dropdown-toggle="{{ $downloadDropId }}" type="button"
                        class="inline-flex items-center gap-1.5 px-3 py-2 text-xs md:text-sm font-medium
                            rounded-lg border justify-center
                            bg-slate-50 text-slate-600 border-slate-200
                            hover:bg-slate-100 hover:text-slate-900
                            focus:outline-none focus:ring-2 focus:ring-slate-300
                            dark:bg-slate-800/80 dark:text-slate-300 dark:border-slate-600
                            dark:hover:bg-slate-700 dark:hover:text-slate-50 dark:focus:ring-sky-500/40">
                        <x-bi-download class="w-4 h-4" />
                    </button>

                    <div id="{{ $downloadDropId }}"
                        class="z-20 hidden mt-2 bg-white divide-y divide-slate-100 rounded-lg shadow-lg
                               border border-slate-100
                               dark:bg-slate-800 dark:divide-slate-700 dark:border-slate-700">
                        <ul class="py-2 text-sm text-slate-700 dark:text-slate-200"
                            aria-labelledby="{{ $downloadButtonId }}">
                            <li>
                                <a href="#"
                                    class="flex items-center gap-2 px-4 py-2
                                          hover:bg-slate-50 dark:hover:bg-slate-700/70 dark:hover:text-white">
                                    <x-bi-filetype-pdf class="w-4 h-4 shrink-0" />
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center gap-2 px-4 py-2
                                          hover:bg-slate-50 dark:hover:bg-slate-700/70 dark:hover:text-white">
                                    <x-bi-filetype-csv class="w-4 h-4 shrink-0" />
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@once
    @push('scripts')
        <script>
            window.initReportCard = function(cardId) {
                const card = document.getElementById(cardId);
                if (!card) return;

                // === Toggle gráfico/tabela ===
                const sections = card.querySelectorAll('[data-card-section]');

                const setView = (view) => {
                    sections.forEach((section) => {
                        const sectionView = section.getAttribute('data-card-section');
                        if (sectionView === view) {
                            section.classList.remove('hidden');
                        } else {
                            section.classList.add('hidden');
                        }
                    });

                    const toggleBtns = card.querySelectorAll('[data-card-view-toggle]');
                    toggleBtns.forEach((btn) => {
                        const isActive = btn.getAttribute('data-view') === view;

                        btn.classList.toggle('bg-slate-900', isActive);
                        btn.classList.toggle('text-slate-50', isActive);
                        btn.classList.toggle('dark:bg-sky-600', isActive);
                        btn.classList.toggle('dark:text-white', isActive);

                        btn.classList.toggle('bg-transparent', !isActive);
                        btn.classList.toggle('text-slate-600', !isActive);
                        btn.classList.toggle('dark:text-slate-300', !isActive);
                    });
                };

                // estado inicial
                setView('chart');

                const toggles = card.querySelectorAll('[data-card-view-toggle]');
                toggles.forEach((btn) => {
                    btn.addEventListener('click', () => {
                        const view = btn.getAttribute('data-view');
                        setView(view);
                    });
                });
            };
        </script>
    @endpush
@endonce

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (window.initReportCard) {
                window.initReportCard(@json($id));
            }
        });
    </script>
@endpush
