@props([
    'id' => null,
    'value' => '0',
])

@php
    $definitions = [
        // 1. DTP (Definido como INSTÁVEL para exemplo)
        'gestao' => [
            'label' => 'Despesa com Pessoal (DTP)',
            'suffix' => '%',
            'text' => '% da Receita Corrente Líquida',
            'link' => route('financeiro.compliance.pessoal'),
            'icon' => 'people',
            // Adicionado black:bg-amber-900/20 e black:text-amber-400
            'bg_class' =>
                'bg-amber-100 dark:bg-amber-900/20 text-amber-700 dark:text-amber-400 black:bg-amber-900/20 black:text-amber-400',
            'status' => 'unstable', // Nível 1: Instável
            'tooltip_html' => 'Limite Prudencial excedido (51,3%).',
        ],
        // 2. Resultado (Definido como OK - Sem cor de destaque, dados em Bilhões)
        'financas' => [
            'label' => 'Receita Corrente Líquida',
            'suffix' => 'bi',
            'text' => 'Acumulado (12 meses)',
            'link' => route('financeiro.relatorios.rx_d'),
            'icon' => 'bank',
            // Neutro: black:bg-zinc-800 (Surface Highlight) e black:text-zinc-300
            'bg_class' =>
                'bg-slate-200 dark:bg-slate-700 text-slate-600 dark:text-slate-300 black:bg-zinc-800 black:text-zinc-300',
            'status' => 'ok', // Sem cor de status
            'tooltip_html' => 'Receita orçamentária efetivamente arrecadada.',
        ],
        // 3. Controle Interno (Definido como CRÍTICO)
        'pendencias' => [
            'label' => 'Apontamentos TCE',
            'suffix' => 'uni',
            'text' => 'Irregularidades Graves',
            'link' => route('errors.nodata'),
            'icon' => 'shield-exclamation',
            // Crítico: black:bg-red-900/20 e black:text-red-400
            'bg_class' =>
                'bg-red-100 dark:bg-red-900/20 text-red-700 dark:text-red-400 black:bg-red-900/20 black:text-red-400',
            'status' => 'critical', // Nível 2: Crítico
            'tooltip_html' => 'Apontamentos que impedem a certidão negativa.',
        ],
        // 4. NPS (Definido como OK - Sem cor branca, sem destaque)
        'nps' => [
            'label' => 'Investimentos Totais',
            'suffix' => 'mi',
            'text' => 'Liquidados no Exercício',
            'link' => route('errors.nodata'),
            'icon' => 'graph-up',
            // Neutro: black:bg-zinc-800 e black:text-zinc-300
            'bg_class' =>
                'bg-slate-200 dark:bg-slate-700 text-slate-600 dark:text-slate-300 black:bg-zinc-800 black:text-zinc-300',
            'status' => 'ok', // Sem cor de status
            'tooltip_html' => 'Total investido em obras e equipamentos.',
        ],
    ];

    $card = $definitions[$id] ?? null;
    $status = $card['status'] ?? 'ok';

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
