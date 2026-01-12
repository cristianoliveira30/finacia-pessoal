@props(['tableId', 'chart' => []])

@php
    $categories = $chart['categories'] ?? [];
    $series = $chart['series'] ?? [];
    $xLabel = $chart['x_label'] ?? 'Categoria';
@endphp

{{-- CONTAINER: black:bg-zinc-900/40 black:border-zinc-700 --}}
<div
    class="overflow-x-auto border border-slate-100 bg-slate-50/40
           dark:border-slate-700 dark:bg-slate-900/40 
           black:border-zinc-700 black:bg-zinc-900/40 p-2 h-76">
           
    <table id="{{ $tableId }}" data-datatable-from-chart="true"
        class="min-w-full text-xs sm:text-sm text-left text-slate-600 dark:text-slate-200 black:text-zinc-300">
        
        {{-- HEAD: black:bg-zinc-800/70 black:text-zinc-300 --}}
        <thead
            class="text-xs uppercase bg-slate-100 text-slate-600
                   dark:bg-slate-800/70 dark:text-slate-300
                   black:bg-zinc-800/70 black:text-zinc-300">
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
                {{-- ROW BORDER: black:border-zinc-700/60 --}}
                <tr class="border-b border-slate-100 dark:border-slate-700/60 black:border-zinc-700/60">
                    
                    {{-- COLUNA PRINCIPAL: black:text-zinc-100 --}}
                    <td class="px-2 py-2 sm:px-4 sm:py-2 font-medium text-slate-800 dark:text-slate-100 black:text-zinc-100">
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