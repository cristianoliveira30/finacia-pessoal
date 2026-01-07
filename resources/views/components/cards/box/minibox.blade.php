@props([
    'id' => null,
])

@php
    $setores = [
        // --- FINANÇAS ---
        'fin_exec' => [
            'label'   => 'Despesas Empenhadas',
            'value'   => '142,5', // Aumentado para parecer real
            'prefix'  => 'R$ ',
            'suffix'  => 'mi',
            'link'    => route('financeiro.despesas.empenhos'),
            'hint'    => 'Acima do teto mensal',
            'icon_name' => 'bi-currency-dollar',
            // CRÍTICO: Mantém vermelho
            'color'   => 'text-red-700 bg-red-100 dark:bg-red-900/30 dark:text-red-400', 
            'status'  => 'critical',
            'tooltip_html' => 'Valor empenhado ultrapassou a meta mensal estabelecida.'
        ],
        'fin_arr' => [
            'label'   => 'Receita Tributária',
            'value'   => '1.2', // Dados em Bilhões
            'prefix'  => 'R$ ',
            'suffix'  => 'bi',
            'link'    => route('financeiro.receitas.arrecadacao'),
            'hint'    => 'Acumulado Anual',
            'icon_name' => 'bi-bank',
            // OK: Neutro (Slate), sem verde
            'color'   => 'text-slate-600 bg-slate-200 dark:bg-slate-700 dark:text-slate-300', 
            'status'  => 'ok',
            'tooltip_html' => 'Total de impostos e transferências arrecadados.'
        ],

        // --- SAÚDE ---
        'saude_esp' => [
            'label'   => 'Fila Cirurgias',
            'value'   => '2.450', 
            'prefix'  => '',
            'suffix'  => '', // Pessoas
            'link'    => route('saude.regulacao.fila-consultas'),
            'hint'    => 'Aguardando agendamento',
            'icon_name' => 'bi-heart-pulse',
            // CRÍTICO: Vermelho
            'color'   => 'text-red-700 bg-red-100 dark:bg-red-900/30 dark:text-red-400',
            'status'  => 'critical',
            'tooltip_html' => 'Pacientes aguardando procedimentos eletivos há mais de 60 dias.'
        ],
        'saude_med' => [
            'label'   => 'Estoque Farmácia',
            'value'   => '98',
            'prefix'  => '',
            'suffix'  => '%',
            'link'    => route('saude.farmacia.rupturas'),
            'hint'    => 'Abastecimento',
            'icon_name' => 'bi-capsule',
            // OK: Neutro (Slate)
            'color'   => 'text-slate-600 bg-slate-200 dark:bg-slate-700 dark:text-slate-300',
            'status'  => 'ok',
            'tooltip_html' => 'Nível de abastecimento da Farmácia Central.'
        ],

        // --- EDUCAÇÃO ---
        'edu_freq' => [
            'label'   => 'Matrículas Ativas',
            'value'   => '42',
            'prefix'  => '',
            'suffix'  => 'mil',
            'link'    => route('educacao.relatorios.frequencia'),
            'hint'    => 'Rede Municipal',
            'icon_name' => 'bi-journal-bookmark',
             // OK: Neutro (Slate), removemos o azul/verde
            'color'   => 'text-slate-600 bg-slate-200 dark:bg-slate-700 dark:text-slate-300',
            'status'  => 'ok',
            'tooltip_html' => 'Total de alunos matriculados no ano letivo corrente.'
        ],
        'edu_vagas' => [
            'label'   => 'Déficit Creches',
            'value'   => '850',
            'prefix'  => '',
            'suffix'  => 'vagas',
            'link'    => route('educacao.matriculas.fila-creche'),
            'hint'    => 'Lista de espera',
            'icon_name' => 'bi-backpack',
            // INSTÁVEL: Amarelo/Amber
            'color'   => 'text-amber-700 bg-amber-100 dark:bg-amber-900/30 dark:text-amber-400',
            'status'  => 'unstable',
            'tooltip_html' => 'Crianças cadastradas aguardando vaga em creche.'
        ],
    ];

    $dados = $setores[$id] ?? null;
    $status = $dados['status'] ?? 'ok';

    $styles = [
        // CRÍTICO: Borda vermelha e brilho
        'critical' => [
            'wrapper' => 'border-red-500 shadow-lg shadow-red-500/20 dark:border-red-500/50', 
            'blur'    => 'bg-red-500/10'
        ],
        // INSTÁVEL: Borda amarela e brilho
        'unstable' => [
            'wrapper' => 'border-amber-400 shadow-lg shadow-amber-500/20 dark:border-amber-500/50', 
            'blur'    => 'bg-amber-500/10'
        ],
        // OK: Borda cinza neutra, SEM brilho colorido, SEM destaque
        'ok' => [
            'wrapper' => 'border-slate-300 dark:border-slate-700 shadow-sm', 
            'blur'    => 'hidden' // Remove o brilho
        ],
    ];

    $currentStyle = $styles[$status] ?? $styles['ok'];
@endphp

@if($dados)
    <div class="group relative w-full h-full">
        {{-- ALTERADO: bg-white para bg-slate-50 --}}
        <div class="relative w-full overflow-hidden h-full
                    bg-slate-50 dark:bg-slate-800
                    p-4 rounded-xl
                    border transition-all duration-300 hover:-translate-y-1
                    {{ $currentStyle['wrapper'] }}">

            {{-- Blur condicional (oculto se ok) --}}
            <div class="absolute top-0 right-0 -mt-4 -mr-4 w-16 h-16 rounded-full blur-xl transition-all pointer-events-none {{ $currentStyle['blur'] }}"></div>

            <div class="relative z-10 flex justify-between h-full items-start">
                <div class="flex flex-col justify-between h-full space-y-1">
                    <p class="text-slate-500 dark:text-slate-400 text-xs font-bold uppercase tracking-wider">
                        {{ $dados['label'] }}
                    </p>
                    <h3 class="text-2xl font-bold text-slate-800 dark:text-white tracking-tight whitespace-nowrap">
                        <span class="text-xs text-slate-400 mr-px font-normal align-middle">{{ $dados['prefix'] }}</span>{{ $dados['value'] }}<span class="text-xs text-slate-400 ml-px font-normal align-baseline">{{ $dados['suffix'] }}</span>
                    </h3>
                    <span class="text-xs text-slate-500 font-medium truncate">
                        {{ $dados['hint'] }}
                    </span>
                </div>

                <div class="flex flex-col justify-between items-end h-full pl-2 space-y-2">
                    {{-- Ícone com cor definida no array de dados --}}
                    <div class="p-1.5 rounded-lg border shadow-sm border-slate-200 dark:border-slate-600 {{ $dados['color'] }}">
                        <x-dynamic-component :component="$dados['icon_name']" class="w-4 h-4" />
                    </div>
                    
                    <a href="{{ $dados['link'] }}" class="group/link relative text-slate-300 hover:text-sky-500 transition-colors">
                        <x-bi-arrow-right-short class="w-5 h-5" />
                        <span class="absolute bottom-full right-0 mb-1 px-1.5 py-0.5 bg-slate-700 text-white text-[10px] font-medium rounded shadow-sm opacity-0 invisible group-hover/link:opacity-100 group-hover/link:visible transition-all duration-200 whitespace-nowrap z-20 pointer-events-none">
                            Ver Relatorios
                        </span>
                    </a>
                </div>
            </div>
        </div>
        
        <div class="absolute top-full left-1/2 -translate-x-1/2 mt-3 w-64 px-4 py-3 bg-slate-800 text-white text-xs font-medium rounded-xl shadow-2xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-[99] pointer-events-none whitespace-normal text-left border border-slate-700">
             <div class="absolute bottom-full left-1/2 -translate-x-1/2 border-8 border-transparent border-b-slate-800"></div>
            {!! $dados['tooltip_html'] ?? '' !!}
        </div>
    </div>
@else
    <div class="p-4 border border-dashed border-slate-300 rounded-xl flex items-center justify-center text-xs text-slate-400">
        Box "{{ $id }}" não definido
    </div>
@endif