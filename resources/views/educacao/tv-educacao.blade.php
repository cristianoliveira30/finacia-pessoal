<x-layouts.tv :title="__('TV Educação — Matrículas, Frequência e Desempenho')">
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
        $matriculas   = 58420;
        $freqPct      = 92.6;
        $evasaoPct    = 5.4;
        $filaCreche   = 1260;
        $aprovPct     = 89.1;
        $aprendNota   = 6.4; // /10 (vai pro letreiro)

        $fmtInt = fn($v) => number_format($v, 0, ',', '.');
        $fmt1   = fn($v) => number_format($v, 1, ',', '.');

        // ==========================
        // GRÁFICOS (compatíveis com <x-cards.card-tv>)
        // Tipos: area, pie, column, bar
        // ==========================

        // 1) AREA — Tendência de matrículas (12 meses) (fake coerente)
        $meses = ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'];

        // em "mil" pra ficar legível no gráfico
        $matTrend = [54.2, 54.6, 55.1, 55.4, 55.8, 56.2, 56.9, 57.4, 57.9, 58.1, 58.3, 58.4];
        $chartMatriculasTrend = [
            'x_label' => 'Mês',
            'categories' => $meses,
            'series' => [
                ['name' => 'Matrículas (mil)', 'data' => $matTrend],
            ],
        ];

        // 2) PIE — Composição de matrículas por etapa (fake executivo)
        $chartComposicaoEtapa = [
            'x_label' => '%',
            'categories' => ['Creche', 'Fund. I', 'Fund. II', 'EJA'],
            'series' => [[
                'name' => 'Distribuição (%)',
                'data' => [22, 46, 26, 6],
            ]],
        ];

        // 3) COLUMN — Comparativo anual (2024 x 2025) em indicadores-chave
        $chartIndicadoresAno = [
            'x_label' => 'Indicadores',
            'categories' => ['Frequência (%)', 'Aprovação (%)', 'Evasão (%)'],
            'series' => [
                ['name' => '2024', 'data' => [90.8, 87.4, 6.1]],
                ['name' => '2025', 'data' => [$freqPct, $aprovPct, $evasaoPct]],
            ],
        ];

        // 4) BAR — Áreas de Gestão (Score 0-100) (seu “modulos”)
        $modNomes  = ['Rede Escolar','Matrículas','Frequência','Merenda','Transporte','FUNDEB'];
        $modScores = [80, 77, 83, 64, 69, 78];

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

            {{-- Matrículas --}}
            <div class="rounded-xl border border-blue-300/30 dark:border-blue-500/20 bg-white dark:bg-gray-800 p-4 shadow-sm">
                <div class="text-xs text-gray-500 dark:text-gray-400 font-bold uppercase tracking-wide">Matrículas</div>
                <div class="mt-2 text-5xl font-extrabold text-gray-900 dark:text-white">
                    {{ $fmtInt($matriculas) }}
                </div>
                <div class="mt-1 text-xs text-gray-500 dark:text-gray-400">Ativas na rede</div>
            </div>

            {{-- Frequência --}}
            <div class="rounded-xl border border-emerald-300/30 dark:border-emerald-500/20 bg-emerald-50 dark:bg-emerald-500/10 p-4 shadow-sm">
                <div class="text-xs text-emerald-700 dark:text-emerald-300 font-black uppercase tracking-wide">Frequência</div>
                <div class="mt-2 text-5xl font-extrabold text-emerald-700 dark:text-emerald-300">
                    {{ $fmt1($freqPct) }} <span class="text-xl opacity-80">%</span>
                </div>
                <div class="mt-1 text-xs text-emerald-800/70 dark:text-emerald-200/70">Média geral</div>
            </div>

            {{-- Evasão --}}
            <div class="rounded-xl border border-red-300/30 dark:border-red-500/20 bg-red-50 dark:bg-red-500/10 p-4 shadow-sm">
                <div class="text-xs text-red-700 dark:text-red-300 font-black uppercase tracking-wide">Evasão</div>
                <div class="mt-2 text-5xl font-extrabold text-red-700 dark:text-red-300">
                    {{ $fmt1($evasaoPct) }} <span class="text-xl opacity-80">%</span>
                </div>
                <div class="mt-1 text-xs text-red-800/70 dark:text-red-200/70">Estimativa anual</div>
            </div>

            {{-- Fila Creche --}}
            <div class="rounded-xl border border-orange-300/30 dark:border-orange-500/20 bg-white dark:bg-gray-800 p-4 shadow-sm">
                <div class="text-xs text-gray-500 dark:text-gray-400 font-bold uppercase tracking-wide">Fila Creche</div>
                <div class="mt-2 text-5xl font-extrabold text-gray-900 dark:text-white">
                    {{ $fmtInt($filaCreche) }}
                </div>
                <div class="mt-1 text-xs text-gray-500 dark:text-gray-400">Demanda em espera</div>
            </div>

            {{-- Aprovação --}}
            <div class="rounded-xl border border-indigo-300/30 dark:border-indigo-500/20 bg-indigo-50 dark:bg-indigo-500/10 p-4 shadow-sm">
                <div class="text-xs text-indigo-700 dark:text-indigo-300 font-black uppercase tracking-wide">Aprovação</div>
                <div class="mt-2 text-5xl font-extrabold text-indigo-700 dark:text-indigo-300">
                    {{ $fmt1($aprovPct) }} <span class="text-xl opacity-80">%</span>
                </div>
                <div class="mt-1 text-xs text-indigo-800/70 dark:text-indigo-200/70">Média da rede</div>
            </div>
        </section>

        {{-- ===== GRÁFICOS (2x2) ===== --}}
        <section class="grid grid-cols-2 grid-rows-2 gap-6">

            {{-- AREA: tendência --}}
            <x-cards.card-tv
                id="edu-mat-trend"
                title="Matrículas (Tendência — últimos 12 meses)"
                :chart="$chartMatriculasTrend"
                chart-type="area"
            />

            {{-- PIE: composição --}}
            <x-cards.card-tv
                id="edu-comp"
                title="Composição de Matrículas por Etapa (%)"
                :chart="$chartComposicaoEtapa"
                chart-type="pie"
            />

            {{-- COLUMN: comparativo anual --}}
            <x-cards.card-tv
                id="edu-indicadores"
                title="Indicadores 2024 x 2025 (Frequência • Aprovação • Evasão)"
                :chart="$chartIndicadoresAno"
                chart-type="column"
            />

            {{-- BAR: scores dos módulos --}}
            <x-cards.card-tv
                id="edu-areas"
                title="Áreas de Gestão (Score 0-100)"
                :chart="$chartAreasScore"
                chart-type="bar"
            />
        </section>

        {{-- ===== LETREIRO (fake direcionado à educação) ===== --}}
        <div class="bg-blue-900 text-white rounded-lg flex items-center overflow-hidden h-12 shadow-lg border border-blue-700">
            <div class="bg-red-600 text-white font-black px-4 h-full flex items-center z-10 uppercase text-sm tracking-wider shadow-md">
                Ao Vivo
            </div>
            <div class="flex-1 overflow-hidden relative h-full flex items-center bg-blue-900">
                <div class="animate-marquee whitespace-nowrap absolute">
                    <span class="mx-8 font-semibold text-lg">📚 Matrículas ativas: {{ $fmtInt($matriculas) }} • Frequência: {{ $fmt1($freqPct) }}% • Aprovação: {{ $fmt1($aprovPct) }}% • Evasão: {{ $fmt1($evasaoPct) }}%.</span>
                    <span class="mx-8 font-semibold text-lg text-yellow-300">⚠️ Atenção: fila de creche em {{ $fmtInt($filaCreche) }} solicitações — revisão de capacidade e vagas em andamento.</span>
                    <span class="mx-8 font-semibold text-lg">🍲 Merenda em monitoramento (rupturas) • Transporte escolar com ajuste de rotas e pontualidade.</span>
                    <span class="mx-8 font-semibold text-lg">🎓 Índice de aprendizagem (sim.): {{ $fmt1($aprendNota) }}/10 — plano de reforço e acompanhamento pedagógico.</span>
                </div>
            </div>
        </div>

    </div>
</x-layouts.tv>
