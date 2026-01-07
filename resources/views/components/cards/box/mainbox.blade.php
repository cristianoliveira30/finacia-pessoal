@props([
    'id' => null,       
    'value' => '0',     
])

@php
    $definitions = [
        // 1. DTP
        'gestao' => [
            'label'   => 'Despesa com Pessoal (DTP)',
            'suffix'  => '%',
            'text'    => '% da Receita Corrente Líquida',
            'link'    => route('financeiro.compliance.pessoal'),
            'icon'    => 'people', 
            'bg_class' => 'bg-sky-100 dark:bg-sky-900/20 text-sky-700 dark:text-sky-400',
            'status'   => 'warning',
            'tooltip_html' => 'Limite Prudencial: 51,3% <br> Limite Máximo: 54%'
        ],
        // 2. Resultado
        'financas' => [
            'label'   => 'Resultado Orçamentário',
            'suffix'  => 'mi',
            'text'    => 'Receita Arrec. - Despesa Emp.',
            'link'    => route('financeiro.relatorios.rx_d'),
            'icon'    => 'currency-dollar',
            'bg_class' => 'bg-emerald-100 dark:bg-emerald-900/20 text-emerald-700 dark:text-emerald-400',
            'status'   => 'good',
            'tooltip_html' => 'Superávit ou Déficit acumulado no período.'
        ],
        // 3. Controle Interno
        'pendencias' => [
            'label'   => 'Controle Interno',
            'suffix'  => '%',
            'text'    => 'Recomendações atendidas',
            'link'    => route('financeiro.relatorios'),
            'icon'    => 'shield-check',
            'bg_class' => 'bg-rose-100 dark:bg-rose-900/20 text-rose-700 dark:text-rose-400',
            'status'   => 'critical', 
            'tooltip_html' => 'Percentual de apontamentos da controladoria resolvidos.'
        ],
        // 4. NPS
        'nps' => [
            'label'   => 'Satisfação (NPS)',
            'suffix'  => '',
            'text'    => 'Avaliação Cidadã',
            'link'    => '#',
            'icon'    => 'emoji-smile',
            'bg_class' => 'bg-purple-100 dark:bg-purple-900/20 text-purple-700 dark:text-purple-400',
            'status'   => 'neutral',
            'tooltip_html' => 'Net Promoter Score aferido nos serviços públicos.'
        ],
    ];

    $card = $definitions[$id] ?? null;
    $status = $card['status'] ?? 'neutral';

    $styles = [
        'good'     => ['wrapper' => 'border-emerald-500 shadow-xl shadow-emerald-500/30', 'blur' => 'bg-emerald-500/10'],
        'warning'  => ['wrapper' => 'border-amber-400 shadow-xl shadow-amber-500/30',     'blur' => 'bg-amber-500/10'],
        'critical' => ['wrapper' => 'border-red-500 shadow-xl shadow-red-500/30',         'blur' => 'bg-red-500/10'],
        'neutral'  => ['wrapper' => 'border-slate-200 shadow-xl shadow-slate-200/60',     'blur' => 'bg-slate-500/5'],
    ];

    $currentStyle = $styles[$status] ?? $styles['neutral'];
@endphp

@if($card)
    <div class="group relative w-full h-full">
        <div class="relative w-full min-w-[200px] overflow-hidden h-full
                    bg-white dark:bg-slate-800
                    p-5 rounded-2xl
                    border transition-all duration-300 hover:-translate-y-1
                    {{ $currentStyle['wrapper'] }}">

            <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 rounded-full blur-2xl transition-all pointer-events-none opacity-20 
                        {{ $status === 'neutral' ? str_replace('text-', 'bg-', $card['bg_class']) : $currentStyle['blur'] }}"></div>

            <div class="relative z-10 flex justify-between h-full">
                <div class="flex flex-col justify-between">
                    <div class="mb-4">
                        <p class="text-slate-500 dark:text-slate-400 text-xs font-bold uppercase tracking-wider mb-1">
                            {{ $card['label'] }}
                        </p>
                        <div>
                            <h3 class="text-3xl font-bold text-slate-800 dark:text-white tracking-tight">
                                {{ $value }}<span class="text-lg text-slate-400 font-medium ml-0.5">{{ $card['suffix'] }}</span>
                            </h3>
                        </div>
                    </div>
                    <div class="flex items-center text-sm">
                        <span class="text-slate-500 dark:text-slate-500 font-medium truncate">
                            {{ $card['text'] }}
                        </span>
                    </div>
                </div>

                <div class="flex flex-col justify-between items-end pl-4">
                    <div class="p-2.5 rounded-xl border shadow-sm {{ $card['bg_class'] }} border-slate-100 dark:border-slate-600">
                        <x-dynamic-component :component="'bi-'.$card['icon']" class="w-6 h-6" />
                    </div>
                    
                    {{-- Tooltip no Link Adicionado Aqui --}}
                    <a href="{{ $card['link'] }}" class="group/link relative p-1.5 rounded-lg text-slate-400 hover:text-sky-600 hover:bg-slate-100 dark:hover:bg-slate-700 transition-colors">
                        <x-bi-arrow-right class="w-5 h-5" />
                        <span class="absolute bottom-full right-0 mb-1 px-2 py-1 bg-slate-700 text-white text-[10px] font-medium rounded shadow-sm opacity-0 invisible group-hover/link:opacity-100 group-hover/link:visible transition-all duration-200 whitespace-nowrap z-20 pointer-events-none">
                            Abrir relatório
                        </span>
                    </a>
                </div>
            </div>
        </div>
        
        {{-- Tooltip Principal (Card) --}}
        <div class="absolute top-full left-1/2 -translate-x-1/2 mt-3 w-64 px-4 py-3 bg-slate-800 text-white text-sm font-medium rounded-xl shadow-2xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-[99] pointer-events-none whitespace-normal text-left border border-slate-700">
             <div class="absolute bottom-full left-1/2 -translate-x-1/2 border-8 border-transparent border-b-slate-800"></div>
            {!! $card['tooltip_html'] ?? '' !!}
        </div>
    </div>
@else
    <div class="p-4 bg-red-50 border border-red-300 text-red-700 rounded-lg shadow-md text-xs">
        ID "{{ $id }}" não encontrado.
    </div>
@endif