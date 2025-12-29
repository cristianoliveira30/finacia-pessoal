@props(['tableId', 'chart' => []])

@php
    $categories = $chart['categories'] ?? [];
    $series = $chart['series'] ?? [];
    $xLabel = $chart['x_label'] ?? 'Categoria';
@endphp

<div
    class="overflow-x-auto border border-slate-100 bg-slate-50/40
            dark:border-slate-700 dark:bg-slate-900/40 p-2 h-56">
    <table id="{{ $tableId }}" data-datatable-from-chart="true"
        class="min-w-full text-xs sm:text-sm text-left text-slate-600 dark:text-slate-200">
        <thead
            class="text-xs uppercase bg-slate-100 text-slate-600
                   dark:bg-slate-800/70 dark:text-slate-300">
            <tr>
                {{-- MODIFICAÇÃO: px-2 no mobile, px-4 no desktop --}}
                <th class="px-2 py-2 sm:px-4 sm:py-3">{{ $xLabel }}</th>

                @foreach ($series as $serie)
                    <th class="px-2 py-2 sm:px-4 sm:py-3">
                        {{ $serie['name'] ?? 'Série' }}
                    </th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $index => $label)
                <tr class="border-b border-slate-100 dark:border-slate-700/60">
                    <td class="px-2 py-2 sm:px-4 sm:py-2 font-medium text-slate-800 dark:text-slate-100">
                        {{ $label }}
                    </td>

                    @foreach ($series as $serie)
                        @php $value = $serie['data'][$index] ?? null; @endphp
                        <td class="px-2 py-2 sm:px-4 sm:py-2">
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