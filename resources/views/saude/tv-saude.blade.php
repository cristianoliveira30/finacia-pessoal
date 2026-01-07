<x-layouts.tv :title="__('Saúde — Atendimentos, Espera e Regulação')">
    @push('head')
        <meta http-equiv="refresh" content="30">
        <style>
            .animate-marquee { animation: marquee 28s linear infinite; }
            @keyframes marquee {
                0% { transform: translateX(100%); }
                100% { transform: translateX(-100%); }
            }
        </style>
    @endpush

    @php
        // ==========================
        // KPIs (baseados no seu array)
        // ==========================
        $atendimentos = 128450;      // APS + Urgência
        $esperaMin    = 55;          // média porta
        $vacinalPct   = 87.3;        // cobertura
        $medPct       = 92.1;        // disponibilidade
        $filaReg      = 3840;        // cons + exames

        $fmtInt = fn($v) => number_format($v, 0, ',', '.');
        $fmt1   = fn($v) => number_format($v, 1, ',', '.');

        // ==========================
        // GRÁFICOS (compatíveis com seu <x-cards.card-tv>)
        // Tipos usados: area, pie, column, bar
        // ==========================

        // 1) AREA — Tendência de atendimentos (12 meses) (fake coerente)
        $meses = ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'];

        $base = 112000;
        $trendAtend = [112, 118, 115, 121, 126, 123, 128, 124, 130, 134, 132, 138]; // em mil (pra ficar limpo)
        $chartAtendTrend = [
            'x_label' => 'Mês',
            'categories' => $meses,
            'series' => [
                ['name' => 'Atendimentos (mil)', 'data' => $trendAtend],
            ],
        ];

        // 2) PIE — Distribuição de atendimentos (fake executivo)
        $aps = 62; $urg = 28; $esp = 10; // soma 100
        $chartDistribAtend = [
            'x_label' => '%',
            'categories' => ['APS', 'Urgência', 'Especializado'],
            'series' => [
                ['name' => 'Distribuição (%)', 'data' => [$aps, $urg, $esp]],
            ],
        ];

        // 3) COLUMN — Regulação (Consultas x Exames) comparativo 2024/2025 (fake coerente)
        $chartRegComparativo = [
            'x_label' => 'Fila',
            'categories' => ['Consultas', 'Exames'],
            'series' => [
                ['name' => '2024', 'data' => [2100, 1550]],
                ['name' => '2025', 'data' => [2350, 1650]],
            ],
        ];

        // 4) BAR — Pontuação por área (0-100) (seu “modulos”)
        $modNomes  = ['Atenção Básica','Urgência','Regulação','Imunização','Farmácia','Vigilância'];
        $modScores = [78, 61, 66, 84, 73, 76];

        $chartAreasScore = [
            'x_label' => 'Score',
            'categories' => $modNomes,
            'series' => [
                ['name' => 'Score (0-100)', 'data' => $modScores],
            ],
            'horizontal' => true,
        ];
    @endphp

    <div class="h-full grid grid-rows-[auto_auto_auto] gap-6 content-center">

        {{-- ===== TOPO: KPIs claros ===== --}}
        <section class="grid grid-cols-5 gap-2 mt-3">

            {{-- Atendimentos --}}
            <div class="rounded-xl border border-rose-300/30 dark:border-rose-500/20 bg-white dark:bg-gray-800 p-4 shadow-sm">
                <div class="text-xs text-gray-500 dark:text-gray-400 font-bold uppercase tracking-wide">Atendimentos</div>
                <div class="mt-2 text-5xl font-extrabold text-gray-900 dark:text-white">
                    {{ $fmtInt($atendimentos) }}
                </div>
                <div class="mt-1 text-xs text-gray-500 dark:text-gray-400">APS + Urgência (acumulado)</div>
            </div>

            {{-- Espera --}}
            <div class="rounded-xl border border-orange-300/30 dark:border-orange-500/20 bg-white dark:bg-gray-800 p-4 shadow-sm">
                <div class="text-xs text-gray-500 dark:text-gray-400 font-bold uppercase tracking-wide">Espera média</div>
                <div class="mt-2 text-5xl font-extrabold text-gray-900 dark:text-white">
                    {{ $fmtInt($esperaMin) }} <span class="text-xl opacity-70">min</span>
                </div>
                <div class="mt-1 text-xs text-gray-500 dark:text-gray-400">Tempo porta (média)</div>
            </div>

            {{-- Cobertura vacinal --}}
            <div class="rounded-xl border border-emerald-300/30 dark:border-emerald-500/20 bg-emerald-50 dark:bg-emerald-500/10 p-4 shadow-sm">
                <div class="text-xs text-emerald-700 dark:text-emerald-300 font-black uppercase tracking-wide">Cobertura vacinal</div>
                <div class="mt-2 text-5xl font-extrabold text-emerald-700 dark:text-emerald-300">
                    {{ $fmt1($vacinalPct) }} <span class="text-xl opacity-80">%</span>
                </div>
                <div class="mt-1 text-xs text-emerald-800/70 dark:text-emerald-200/70">Imunização (geral)</div>
            </div>

            {{-- Medicamentos --}}
            <div class="rounded-xl border border-teal-300/30 dark:border-teal-500/20 bg-teal-50 dark:bg-teal-500/10 p-4 shadow-sm">
                <div class="text-xs text-teal-700 dark:text-teal-300 font-black uppercase tracking-wide">Medicamentos</div>
                <div class="mt-2 text-5xl font-extrabold text-teal-700 dark:text-teal-300">
                    {{ $fmt1($medPct) }} <span class="text-xl opacity-80">%</span>
                </div>
                <div class="mt-1 text-xs text-teal-800/70 dark:text-teal-200/70">Disponibilidade</div>
            </div>

            {{-- Fila regulação --}}
            <div class="rounded-xl border border-purple-300/30 dark:border-purple-500/20 bg-white dark:bg-gray-800 p-4 shadow-sm">
                <div class="text-xs text-gray-500 dark:text-gray-400 font-bold uppercase tracking-wide">Fila de regulação</div>
                <div class="mt-2 text-5xl font-extrabold text-gray-900 dark:text-white">
                    {{ $fmtInt($filaReg) }}
                </div>
                <div class="mt-1 text-xs text-gray-500 dark:text-gray-400">Consultas + Exames</div>
            </div>
        </section>

        {{-- ===== GRÁFICOS (2x2) ===== --}}
        <section class="grid grid-cols-2 grid-rows-2 gap-6">

            {{-- AREA: tendência --}}
            <x-cards.card-tv
                id="saude-atend-trend"
                title="Atendimentos (Tendência — últimos 12 meses)"
                :chart="$chartAtendTrend"
                chart-type="area"
            />

            {{-- PIE: distribuição --}}
            <x-cards.card-tv
                id="saude-dist"
                title="Distribuição de Atendimentos (%)"
                :chart="$chartDistribAtend"
                chart-type="pie"
            />

            {{-- COLUMN: comparativo (igual ao print que você curtiu) --}}
            <x-cards.card-tv
                id="saude-reg"
                title="Regulação — Consultas x Exames (2024 x 2025)"
                :chart="$chartRegComparativo"
                chart-type="column"
            />

            {{-- BAR: score por área (horizontal) --}}
            <x-cards.card-tv
                id="saude-areas"
                title="Áreas de Gestão (Score 0-100)"
                :chart="$chartAreasScore"
                chart-type="bar"
            />
        </section>

        {{-- ===== LETREIRO (fake direcionado à saúde) ===== --}}
        <div class="bg-blue-900 text-white rounded-lg flex items-center overflow-hidden h-12 shadow-lg border border-blue-700">
            <div class="bg-red-600 text-white font-black px-4 h-full flex items-center z-10 uppercase text-sm tracking-wider shadow-md">
                Ao Vivo
            </div>
            <div class="flex-1 overflow-hidden relative h-full flex items-center bg-blue-900">
                <div class="animate-marquee whitespace-nowrap absolute">
                    <span class="mx-8 font-semibold text-lg">🏥 Atendimentos: {{ $fmtInt($atendimentos) }} • Espera média: {{ $fmtInt($esperaMin) }} min • Fila Reg.: {{ $fmtInt($filaReg) }}.</span>
                    <span class="mx-8 font-semibold text-lg text-yellow-300">⚠️ Monitoramento: tempo porta e disponibilidade de medicamentos em rotina de atualização.</span>
                    <span class="mx-8 font-semibold text-lg">💉 Cobertura vacinal: {{ $fmt1($vacinalPct) }}% • Disponibilidade medicamentos: {{ $fmt1($medPct) }}%.</span>
                    <span class="mx-8 font-semibold text-lg">📌 Regulação: foco em redução de SLA e reclassificação de prioridades clínicas.</span>
                </div>
            </div>
        </div>

    </div>
</x-layouts.tv>
