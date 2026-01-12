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

    // ID para o corpo do accordion (conteúdo principal que será ocultado)
    $accordionBodyId = $id . '-accordion-body';

    // ID exclusivo para a seção de filtros
    $filterSectionId = $id . '-filter-section';

    // NOVO: ID exclusivo para a seção de IA
    $aiSectionId = $id . '-ai-section';

    $resolvedChartId = $chartId ?: $id . '-chart';
@endphp

{{-- Adicionado data-accordion="collapse" para inicializar o comportamento do Flowbite neste container --}}
{{-- Container: black:bg-zinc-900 black:border-zinc-800 --}}
<div id="{{ $id }}" data-accordion="collapse"
    class="relative w-full overflow-hidden h-fit transition-all duration-100 ease-in-out
           rounded-2xl border border-slate-200 bg-blue-50 shadow-sm
           dark:border-slate-700
           dark:bg-gradient-to-br dark:from-slate-950 dark:via-slate-900 dark:to-sky-900
           black:bg-zinc-900 black:border-zinc-800">

    <div class="relative z-10">

        {{-- Topo --}}
        <div class="flex justify-between items-center gap-4 p-3">
            <div class="space-y-2">
                {{-- Título: black:text-zinc-100 --}}
                <h5 class="text-lg md:text-xl font-semibold tracking-tight text-slate-900 dark:text-slate-50 black:text-zinc-100">
                    {{ $title }}
                </h5>
            </div>
        </div>

        {{-- WRAPPER DO ACCORDION: Envolve gráfico, filtros, IA e footer --}}
        <div id="{{ $accordionBodyId }}" aria-labelledby="{{ $id }}-collapse-heading">

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
        </div>

    </div>
</div>

{{-- Scripts e Listeners --}}
@once
    @push('scripts')
        <script>
            window.initReportCard = function(cardId) {
                const card = document.getElementById(cardId);
                if (!card) return;
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