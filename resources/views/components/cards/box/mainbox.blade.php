@props([
    'id' => null,
    'value' => '0',
])

@php
    $definitions = [
        // 1️⃣ SALDO
        'gestao' => [
            'label' => 'Saldo do Período',
            'suffix' => '',
            'text' => 'Receitas menos despesas',
            'link' => '#',
            'icon' => 'wallet2',

            'bg_class' =>
                'bg-emerald-100 dark:bg-emerald-900/20 text-emerald-700 dark:text-emerald-400 black:bg-emerald-900/20 black:text-emerald-400',

            'status' => 'dynamic',

            'tooltip_html' => 'Resultado financeiro do período selecionado.',
        ],

        // 2️⃣ RECEITAS
        'financas' => [
            'label' => 'Receitas',
            'suffix' => '',
            'text' => 'Total de entradas',
            'link' => '#',
            'icon' => 'arrow-up-circle',

            'bg_class' =>
                'bg-sky-100 dark:bg-sky-900/20 text-sky-700 dark:text-sky-400 black:bg-sky-900/20 black:text-sky-400',

            'status' => 'ok',

            'tooltip_html' => 'Somatório de todas as receitas.',
        ],

        // 3️⃣ DESPESAS
        'pendencias' => [
            'label' => 'Despesas',
            'suffix' => '',
            'text' => 'Total de saídas',
            'link' => '#',
            'icon' => 'arrow-down-circle',

            'bg_class' =>
                'bg-red-100 dark:bg-red-900/20 text-red-700 dark:text-red-400 black:bg-red-900/20 black:text-red-400',

            'status' => 'critical',

            'tooltip_html' => 'Somatório de todas as despesas.',
        ],

        // 4️⃣ % GASTOS
        'nps' => [
            'label' => 'Comprometimento da Renda',
            'suffix' => '%',
            'text' => '% da renda já utilizada',
            'link' => '#',
            'icon' => 'pie-chart',

            'bg_class' =>
                'bg-amber-100 dark:bg-amber-900/20 text-amber-700 dark:text-amber-400 black:bg-amber-900/20 black:text-amber-400',

            'status' => 'unstable',

            'tooltip_html' => 'Percentual da renda comprometido com despesas.',
        ],
    ];

    $card = $definitions[$id] ?? null;
    $status = $summaryMap[$id]['status'] ?? 'ok';
    $value = $summaryMap[$id]['value'] ?? 0;

    // Definição dos Estilos conforme pedido: Apenas Critical e Unstable possuem cor. O resto é neutro.
    $styles = [
        'critical' => [
            // Adicionado black:border-red-500/40
            'wrapper' => 'border-red-500 shadow-xl shadow-red-500/20 black:border-red-500/40',
            'blur' => 'bg-red-500/10',
        ],
        'unstable' => [
            // Adicionado black:border-amber-500/40
            'wrapper' => 'border-amber-400 shadow-xl shadow-amber-500/20 black:border-amber-500/40',
            'blur' => 'bg-amber-500/10',
        ],
        // "Se estiver ok, não coloque cor"
        'ok' => [
            // Adicionado black:border-zinc-800 (Borda sutil)
            'wrapper' => 'border-slate-300 dark:border-slate-700 black:border-zinc-800 shadow-sm',
            'blur' => 'hidden', // Remove o efeito de brilho colorido
        ],
    ];

    $currentStyle = $styles[$status] ?? $styles['ok'];
@endphp

@if ($card)
    <div class="group relative w-full h-full">
        {{-- MUDANÇA: Adicionado black:bg-zinc-900 (Surface Cards) --}}
        {{-- RESPONSIVIDADE: p-4 para mobile, sm:p-5 para telas maiores --}}
        <div
            class="relative w-full min-w-[200px] overflow-hidden h-full
                    bg-slate-50 dark:bg-slate-800 black:bg-zinc-900
                    p-4 sm:p-5 rounded-2xl
                    border transition-all duration-300 hover:-translate-y-1
                    {{ $currentStyle['wrapper'] }}">

            {{-- Efeito Blur (Oculto se for OK) --}}
            <div
                class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 rounded-full blur-2xl transition-all pointer-events-none opacity-20
                        {{ $currentStyle['blur'] }}">
            </div>

            <div class="relative z-10 flex justify-between h-full">
                <div class="flex flex-col justify-between overflow-hidden"> {{-- overflow-hidden garante que texto não vaze --}}
                    <div class="mb-2 sm:mb-4">
                        {{-- Label: black:text-zinc-400 --}}
                        <p
                            class="text-slate-500 dark:text-slate-400 black:text-zinc-400 text-[10px] sm:text-xs font-bold uppercase tracking-wider mb-1 truncate">
                            {{ $card['label'] }}
                        </p>
                        <div>
                            {{-- Valor: black:text-zinc-100 --}}
                            {{-- RESPONSIVIDADE: text-2xl em mobile, lg:text-3xl em telas grandes --}}
                            <h3
                                class="text-2xl lg:text-3xl font-bold text-slate-800 dark:text-white black:text-zinc-100 tracking-tight truncate">
                                {{-- Adiciona R$ se for monetário (bi ou mi) --}}
                                @if (in_array($card['suffix'], ['mi', 'bi']))
                                    {{-- Prefixo R$: black:text-zinc-500 --}}
                                    <span
                                        class="text-xs sm:text-sm align-top text-slate-400 black:text-zinc-500 mr-0.5 mt-1 inline-block">R$</span>
                                @endif
                                {{ $value }}<span
                                    class="text-base sm:text-lg text-slate-400 black:text-zinc-500 font-medium ml-0.5">{{ $card['suffix'] }}</span>
                            </h3>
                        </div>
                    </div>
                    <div class="flex items-center text-xs sm:text-sm w-full">
                        {{-- Texto de apoio: black:text-zinc-500 --}}
                        <span
                            class="text-slate-500 dark:text-slate-500 black:text-zinc-500 font-medium truncate w-full block">
                            {{ $card['text'] }}
                        </span>
                    </div>
                </div>

                <div class="flex flex-col justify-between items-end pl-2 sm:pl-4">
                    {{-- Ícone: border black:border-zinc-700 --}}
                    {{-- RESPONSIVIDADE: p-2 para mobile, sm:p-2.5 para desktop --}}
                    <div
                        class="p-2 sm:p-2.5 rounded-xl border shadow-sm {{ $card['bg_class'] }} border-slate-200 dark:border-slate-600 black:border-zinc-700">
                        {{-- RESPONSIVIDADE: Ícone w-5 h-5 mobile, w-6 h-6 desktop --}}
                        <x-dynamic-component :component="'bi-' . $card['icon']" class="w-5 h-5 sm:w-6 sm:h-6" />
                    </div>

                    {{-- Link: hover:bg-zinc-800 --}}
                    <a href="{{ $card['link'] }}"
                        class="group/link relative p-1.5 rounded-lg text-slate-400 hover:text-sky-600 hover:bg-slate-200 dark:hover:bg-slate-700 black:hover:bg-zinc-800 transition-colors">
                        <x-bi-arrow-right class="w-5 h-5" />
                    </a>
                </div>
            </div>
        </div>

        {{-- Tooltip: black:bg-zinc-950, black:text-zinc-300, black:border-zinc-800 --}}
        <div
            class="absolute top-full left-1/2 -translate-x-1/2 mt-3 w-64 px-4 py-3 bg-slate-800 black:bg-zinc-950 text-white black:text-zinc-300 text-sm font-medium rounded-xl shadow-2xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-[99] pointer-events-none whitespace-normal text-left border border-slate-700 black:border-zinc-800">
            <div
                class="absolute bottom-full left-1/2 -translate-x-1/2 border-8 border-transparent border-b-slate-800 black:border-b-zinc-950">
            </div>
            {!! $card['tooltip_html'] ?? '' !!}
        </div>
    </div>
@else
    <div class="p-4 bg-red-50 border border-red-300 text-red-700 rounded-lg shadow-md text-xs">
        ID "{{ $id }}" não encontrado.
    </div>
@endif
