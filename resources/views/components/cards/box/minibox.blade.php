@props([
    'id' => null,
    'data' => [],
])

@php
    $definitions = [
        'fin_exec' => [
            'label' => 'Gastos do mês',
            'prefix' => 'R$ ',
            'suffix' => '',
            'icon_name' => 'bi-currency-dollar',
            'hint' => 'Total gasto no período',
        ],

        'fin_arr' => [
            'label' => 'Receitas do mês',
            'prefix' => 'R$ ',
            'suffix' => '',
            'icon_name' => 'bi-bank',
            'hint' => 'Entradas registradas',
        ],

        'biggest_category' => [
            'label' => 'Maior categoria',
            'prefix' => '',
            'suffix' => '',
            'icon_name' => 'bi-pie-chart',
            'hint' => 'Categoria com maior gasto',
        ],

        'transactions_count' => [
            'label' => 'Transações',
            'prefix' => '',
            'suffix' => '',
            'icon_name' => 'bi-receipt',
            'hint' => 'Total no período',
        ],
        'food_expense' => [
            'label' => 'Alimentação',
            'prefix' => 'R$ ',
            'suffix' => '',
            'icon_name' => 'bi-egg-fried',
            'hint' => 'Gastos com comida no período',
        ],

        'transport_expense' => [
            'label' => 'Transporte',
            'prefix' => 'R$ ',
            'suffix' => '',
            'icon_name' => 'bi-car-front',
            'hint' => 'Gastos com locomoção',
        ],
    ];

    $definition = $definitions[$id] ?? null;
    $boxData = $data[$id] ?? [];

    $dados = $definition ? array_merge($definition, $boxData) : null;

    // 🔐 FALLBACKS SEGUROS
    $status = $dados['status'] ?? 'ok';
    $value = $dados['value'] ?? '-';
    $link = $dados['link'] ?? '#';
    $color = $dados['color'] ?? '';
    $tooltip = $dados['tooltip_html'] ?? '';

    $styles = [
        'critical' => [
            'wrapper' => 'border-red-500 shadow-lg shadow-red-500/20 dark:border-red-500/50 black:border-red-500/40',
            'blur' => 'bg-red-500/10',
        ],
        'unstable' => [
            'wrapper' =>
                'border-amber-400 shadow-lg shadow-amber-500/20 dark:border-amber-500/50 black:border-amber-500/40',
            'blur' => 'bg-amber-500/10',
        ],
        'ok' => [
            'wrapper' => 'border-slate-300 dark:border-slate-700 black:border-zinc-800 shadow-sm',
            'blur' => 'hidden',
        ],
    ];

    $currentStyle = $styles[$status] ?? $styles['ok'];
@endphp

@if ($dados)
    <div class="group relative w-full h-full">
        <div
            class="relative w-full overflow-hidden h-full
                    bg-slate-50 dark:bg-slate-800 black:bg-zinc-900
                    p-4 rounded-xl
                    border transition-all duration-300 hover:-translate-y-1
                    {{ $currentStyle['wrapper'] }}">

            <div
                class="absolute top-0 right-0 -mt-4 -mr-4 w-16 h-16 rounded-full blur-xl transition-all pointer-events-none {{ $currentStyle['blur'] }}">
            </div>

            <div class="relative z-10 flex justify-between h-full items-start">
                <div class="flex flex-col justify-between h-full space-y-1">

                    <p
                        class="text-slate-500 dark:text-slate-400 black:text-zinc-400 text-xs font-bold uppercase tracking-wider">
                        {{ $dados['label'] }}
                    </p>

                    <h3
                        class="text-2xl font-bold text-slate-800 dark:text-white black:text-zinc-100 tracking-tight whitespace-nowrap">
                        <span class="text-xs text-slate-400 black:text-zinc-500 mr-px font-normal align-middle">
                            {{ $dados['prefix'] }}
                        </span>

                        {{ $value }}

                        <span class="text-xs text-slate-400 black:text-zinc-500 ml-px font-normal align-baseline">
                            {{ $dados['suffix'] }}
                        </span>
                    </h3>

                    <span class="text-xs text-slate-500 black:text-zinc-500 font-medium truncate">
                        {{ $dados['hint'] }}
                    </span>
                </div>

                <div class="flex flex-col justify-between items-end h-full pl-2 space-y-2">

                    <div
                        class="p-1.5 rounded-lg border shadow-sm border-slate-200 dark:border-slate-600 black:border-zinc-700 {{ $color }}">
                        <x-dynamic-component :component="$dados['icon_name']" class="w-4 h-4" />
                    </div>

                    <a href="{{ $link }}"
                        class="group/link relative text-slate-300 black:text-zinc-600 hover:text-sky-500 transition-colors">
                        <x-bi-arrow-right-short class="w-5 h-5" />

                        <span
                            class="absolute bottom-full right-0 mb-1 px-1.5 py-0.5 bg-slate-700 black:bg-zinc-800 text-white black:text-zinc-200 text-[10px] font-medium rounded shadow-sm opacity-0 invisible group-hover/link:opacity-100 group-hover/link:visible transition-all duration-200 whitespace-nowrap z-20 pointer-events-none">
                            Ver Relatórios
                        </span>
                    </a>
                </div>
            </div>
        </div>

        @if ($tooltip)
            <div
                class="absolute top-full left-1/2 -translate-x-1/2 mt-3 w-64 px-4 py-3 bg-slate-800 black:bg-zinc-950 text-white black:text-zinc-300 text-xs font-medium rounded-xl shadow-2xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-[99] pointer-events-none whitespace-normal text-left border border-slate-700 black:border-zinc-800">
                <div
                    class="absolute bottom-full left-1/2 -translate-x-1/2 border-8 border-transparent border-b-slate-800 black:border-b-zinc-950">
                </div>
                {!! $tooltip !!}
            </div>
        @endif
    </div>
@else
    <div
        class="p-4 border border-dashed border-slate-300 black:border-zinc-800 rounded-xl flex items-center justify-center text-xs text-slate-400 black:text-zinc-600">
        Box "{{ $id }}" não definido
    </div>
@endif
