@props([
    'id' => null,       // Identificador do card
    'value' => '0',     // Valor dinâmico
])

@php
    $definitions = [
        // 1.4 Despesa Total com Pessoal (DTP)
        'gestao' => [
            'label'   => 'Despesa com Pessoal (DTP)',
            'suffix'  => '%',
            'text'    => '% da Receita Corrente Líquida',
            'link'    => '/dashboard/rh/pessoal',
            'icon'    => 'people', 
            'bg_class' => 'bg-sky-100 dark:bg-sky-900/20 text-sky-700 dark:text-sky-400',
            'status'   => 'warning', // <--- Exemplo: Alerta (Amarelo)
            'tooltip_html' => '
                <div class="space-y-2 text-xs">
                    <p><strong>O que é:</strong> Percentual da RCL gasto com pessoal.</p>
                    <div class="border-t border-slate-600/50 my-1"></div>
                    <p class="font-bold mb-1">Limites legais (Executivo):</p>
                    <ul class="list-disc pl-3 space-y-0.5">
                        <li class="text-emerald-300">🟢 Alerta: 48,6%</li>
                        <li class="text-amber-300">🟡 Prudencial: 51,3%</li>
                        <li class="text-red-300">🔴 Máximo: 54%</li>
                    </ul>
                    <div class="border-t border-slate-600/50 my-1"></div>
                    <p class="text-red-200"><strong>Risco:</strong> Improbidade administrativa e rejeição de contas (Art. 19-21 LRF).</p>
                </div>
            '
        ],
        // 1.1 Resultado Orçamentário
        'financas' => [
            'label'   => 'Resultado Orçamentário',
            'suffix'  => 'mi',
            'text'    => 'Receita Arrec. - Despesa Emp.',
            'link'    => '/dashboard/financas',
            'icon'    => 'currency-dollar',
            'bg_class' => 'bg-emerald-100 dark:bg-emerald-900/20 text-emerald-700 dark:text-emerald-400',
            'status'   => 'good', // <--- Exemplo: Bom (Verde)
            'tooltip_html' => '
                <div class="space-y-2 text-xs">
                    <p><strong>Fórmula:</strong> Receita Total – Despesa Total</p>
                    <div class="border-t border-slate-600/50 my-1"></div>
                    <p class="font-bold">Parâmetro de controle:</p>
                    <ul class="list-none space-y-0.5">
                        <li>✔ Preferencialmente equilíbrio ou superávit</li>
                        <li>❌ Déficit recorrente acende alerta de má gestão</li>
                    </ul>
                    <div class="border-t border-slate-600/50 my-1"></div>
                    <p class="text-red-200"><strong>Risco jurídico:</strong> Violação do art. 1º da LRF (equilíbrio fiscal).</p>
                </div>
            '
        ],
        // 4.1 Índice de Atendimento às Recomendações
        'pendencias' => [
            'label'   => 'Atendimento Controle Interno',
            'suffix'  => '%',
            'text'    => 'Recomendações atendidas',
            'link'    => '/dashboard/ouvidoria',
            'icon'    => 'shield-check',
            'bg_class' => 'bg-rose-100 dark:bg-rose-900/20 text-rose-700 dark:text-rose-400',
            'status'   => 'critical', // <--- Exemplo: Crítico (Vermelho)
            'tooltip_html' => '
                <div class="space-y-2 text-xs">
                    <p><strong>Meta:</strong> ✔ ≥ 90% das recomendações atendidas.</p>
                    <div class="border-t border-slate-600/50 my-1"></div>
                    <p class="text-red-200"><strong>Risco:</strong> Ignorar o controle interno gera presunção de culpa grave e responsabilidade solidária do gestor.</p>
                </div>
            '
        ],
        'nps' => [
            'label'   => 'Satisfação (NPS)',
            'suffix'  => '',
            'text'    => 'Pesquisas do cidadão',
            'link'    => '/dashboard/ouvidoria',
            'icon'    => 'emoji-smile',
            'bg_class' => 'bg-indigo-100 dark:bg-indigo-900/20 text-indigo-700 dark:text-indigo-400',
            'status'   => 'neutral', // <--- Exemplo: Neutro (Azul/Cinza)
            'tooltip_html' => 'Métrica de lealdade e satisfação do cidadão baseada em pesquisas de avaliação de serviços públicos.'
        ],
    ];

    $card = $definitions[$id] ?? null;

    // Lógica de Estilos Dinâmicos (Igual ao Minibox)
    $status = $card['status'] ?? 'neutral';

    $styles = [
        'good' => [
            'wrapper' => 'border-emerald-500 shadow-emerald-500/20 dark:border-emerald-500/50',
            'blur'    => 'bg-emerald-500/10 group-hover:bg-emerald-500/20'
        ],
        'warning' => [
            'wrapper' => 'border-amber-400 shadow-amber-500/20 dark:border-amber-500/50',
            'blur'    => 'bg-amber-500/10 group-hover:bg-amber-500/20'
        ],
        'critical' => [
            'wrapper' => 'border-red-500 shadow-red-500/20 dark:border-red-500/50',
            'blur'    => 'bg-red-500/10 group-hover:bg-red-500/20'
        ],
        'neutral' => [
            'wrapper' => 'border-slate-200 dark:border-slate-700 shadow-sm',
            'blur'    => 'bg-slate-500/5 dark:bg-slate-500/10 group-hover:bg-slate-500/20' // Fallback se não usar a cor do ícone
        ],
    ];

    $currentStyle = $styles[$status] ?? $styles['neutral'];
@endphp

@if($card)
    <div class="grid grid-cols-1 md:grid-cols-1 gap-2 w-full">
        <div class="group relative w-full h-full">

            {{-- Card --}}
            {{-- APLICAÇÃO DA CLASSE DE BORDA E SOMBRA DINÂMICA ($currentStyle['wrapper']) --}}
            <div class="relative w-full min-w-[260px] overflow-hidden h-full
                        bg-white dark:bg-slate-800
                        p-5 rounded-2xl
                        border transition-all duration-300 hover:-translate-y-1
                        {{ $currentStyle['wrapper'] }}">

                {{-- APLICAÇÃO DA CLASSE DE BLUR DINÂMICA ($currentStyle['blur']) --}}
                {{-- Nota: Se for 'neutral', usa a cor específica do card (bg_class) para manter a identidade, senão usa a cor do status --}}
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
                        {{-- Ícone --}}
                        <div class="p-2.5 rounded-xl border shadow-sm {{ $card['bg_class'] }} border-slate-100 dark:border-slate-600">
                            <x-dynamic-component :component="'bi-'.$card['icon']" class="w-6 h-6" />
                        </div>
                        
                        {{-- Link com Tooltip Específico --}}
                        <a href="{{ $card['link'] }}" 
                           class="group/link relative p-1.5 rounded-lg text-slate-400 hover:text-sky-600 hover:bg-slate-100 dark:hover:bg-slate-700 transition-colors">
                            
                            <x-bi-arrow-right class="w-5 h-5" />

                            {{-- Tooltip do Link --}}
                            <div class="absolute right-full top-1/2 -translate-y-1/2 mr-2 w-max px-2 py-1
                                        bg-slate-700 text-white text-[10px] font-bold rounded shadow-sm
                                        opacity-0 invisible group-hover/link:opacity-100 group-hover/link:visible
                                        transition-all duration-200 translate-x-2 group-hover/link:translate-x-0
                                        pointer-events-none z-20">
                                ir para relatorios
                                <div class="absolute top-1/2 right-0 -mr-1 -mt-1 w-2 h-2 bg-slate-700 rotate-45"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            {{-- TOOLTIP GRANDE (EXPLICAÇÃO TÉCNICA) --}}
            <div class="absolute top-full left-1/2 -translate-x-1/2 mt-3 w-72 px-4 py-3
                        bg-slate-800 text-white text-sm font-medium rounded-xl shadow-2xl
                        opacity-0 invisible group-hover:opacity-100 group-hover:visible 
                        transition-all duration-300 transform -translate-y-2 group-hover:translate-y-0
                        z-[99] pointer-events-none whitespace-normal text-left border border-slate-700">
                <div class="absolute bottom-full left-1/2 -translate-x-1/2 border-8 border-transparent border-b-slate-800"></div>
                {!! $card['tooltip_html'] ?? ('Visualizar detalhes de ' . $card['label']) !!}
            </div>

        </div>
    </div>
@else
    <div class="p-4 bg-red-50 border border-red-300 text-red-700 rounded-lg shadow-md text-xs">
        ID "{{ $id }}" não encontrado.
    </div>
@endif