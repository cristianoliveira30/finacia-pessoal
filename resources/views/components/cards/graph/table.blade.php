@props([
    'tableId', // id único da tabela (vem do card)
    'chart' => [], // mesmo formato que você já usa no gráfico
])

<div
    class="overflow-x-auto border border-slate-100 bg-slate-50/40
           dark:border-slate-700 dark:bg-slate-900/40 p-2 h-56">
    <table id="{{ $tableId }}" data-datatable-from-chart="true"
        class="min-w-full text-sm text-left text-slate-600 dark:text-slate-200">
        <thead
            class="text-xs uppercase bg-slate-100 text-slate-600
                   dark:bg-slate-800/70 dark:text-slate-300">
            <tr>
                <th class="px-4 py-3">Data</th>
                @foreach ($chart['series'] ?? [] as $serie)
                    <th class="px-4 py-3">
                        {{ $serie['name'] ?? 'Série' }}
                    </th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($chart['categories'] ?? [] as $index => $label)
                <tr class="border-b border-slate-100 dark:border-slate-700/60">
                    <td class="px-4 py-2 font-medium text-slate-800 dark:text-slate-100">
                        {{ $label }}
                    </td>

                    @foreach ($chart['series'] ?? [] as $serie)
                        @php
                            $value = $serie['data'][$index] ?? null;
                        @endphp

                        <td class="px-4 py-2">
                            @if (is_numeric($value))
                                {{ number_format($value, 2, ',', '.') }}
                            @else
                                {{ $value }}
                            @endif
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@once
    @push('scripts')
        <script>
            window.initChartTableInstance = function(table) {
                if (!table || !window.DataTable || table.dataset.datatableInitialized === 'true') {
                    return;
                }

                new window.DataTable(table, {
                    searchable: true,
                    sortable: true,
                    perPage: 7,
                });

                table.dataset.datatableInitialized = 'true';
            };
        </script>
    @endpush
@endonce

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const table = document.getElementById(@json($tableId));
            if (table && window.initChartTableInstance) {
                window.initChartTableInstance(table);
            }
        });
    </script>
@endpush
