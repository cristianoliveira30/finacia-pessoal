<x-layouts.tv :title="__('Financeiro — Caixa, Gastos e Saldo')">
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
        $receitaMesMi = 180.0;
        $despesaMesMi = 155.1;
        $saldoMesMi = $receitaMesMi - $despesaMesMi;

        $caixaHojeMi = 128.6;
        $folhaMesMi = 114.8;
        $aPagarMi = 18.7;

        $fmtMi = fn($v) => number_format($v, 1, ',', '.');

        // 1) Receitas x Despesas (AREA)
        $meses = ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'];
        $receitasAno = [92, 88, 95, 101, 98, 103, 108, 100, 109, 112, 110, 116];
        $despesasAno = [86, 84, 90, 96, 94, 98, 101, 97, 103, 106, 105, 109];

        $chartReceitasDespesas = [
            'x_label' => 'Mês',
            'categories' => $meses,
            'series' => [
                ['name' => 'Receitas (R$ mi)', 'data' => $receitasAno],
                ['name' => 'Despesas (R$ mi)', 'data' => $despesasAno],
            ],
        ];

        // 2) Composição de Receita (PIE)
        $comp = [
            ['label' => 'Própria', 'valor' => 32],
            ['label' => 'Transferências', 'valor' => 55],
            ['label' => 'Convênios', 'valor' => 9],
            ['label' => 'Outras', 'valor' => 4],
        ];

        $chartComposicaoReceita = [
            'x_label' => '%',
            'categories' => array_map(fn($x) => $x['label'], $comp),
            'series' => [
                ['name' => 'Receita (%)', 'data' => array_map(fn($x) => $x['valor'], $comp)]
            ],
        ];

        // 3) Empenhos / Liquidações / Pagamentos (COMPARATIVO)
        $chartELP = [
            'x_label' => 'Status',
            'categories' => ['Empenhado', 'Liquidado', 'Pago'],
            'series' => [
                ['name' => '2024 (R$ mi)', 'data' => [980, 910, 860]],
                ['name' => '2025 (R$ mi)', 'data' => [1040, 950, 890]],
            ],
        ];

        // 4) Execução por Função (Previsto x Realizado)
        $funcoes = ['Saúde','Educação','Infraestrutura','Administração','Assistência','Segurança'];
        $previsto = [180, 210, 140, 120, 80, 60];
        $realizado = [155, 190, 95, 105, 55, 48];

        $chartExecucaoFuncao = [
            'x_label' => 'R$ mi',
            'categories' => $funcoes,
            'series' => [
                ['name' => 'Previsto (R$ mi)', 'data' => $previsto],
                ['name' => 'Realizado (R$ mi)', 'data' => $realizado],
            ],
            'horizontal' => true,
        ];
    @endphp

    <div class="h-full grid grid-rows-[auto_auto_auto] gap-6 content-center">

        {{-- KPIs --}}
        <section class="grid grid-cols-5 gap-2 mt-3">
            {{-- Receita no mês: black:bg-zinc-900 --}}
            <div class="rounded-xl border border-gray-200 dark:border-gray-700 black:border-zinc-800 bg-white dark:bg-gray-800 black:bg-zinc-900 p-4 shadow-sm">
                {{-- Label: black:text-zinc-400 --}}
                <div class="text-xs text-gray-500 dark:text-gray-400 black:text-zinc-400 font-bold uppercase tracking-wide">Receita no mês</div>
                {{-- Value: black:text-zinc-100 --}}
                <div class="mt-2 text-4xl font-extrabold text-gray-900 dark:text-white black:text-zinc-100">
                    R$ {{ $fmtMi($receitaMesMi) }} <span class="text-lg font-black opacity-70">mi</span>
                </div>
                {{-- Hint: black:text-zinc-500 --}}
                <div class="mt-1 text-xs text-gray-500 dark:text-gray-400 black:text-zinc-500">Entradas acumuladas</div>
            </div>

            {{-- Despesa no mês --}}
            <div class="rounded-xl border border-gray-200 dark:border-gray-700 black:border-zinc-800 bg-white dark:bg-gray-800 black:bg-zinc-900 p-4 shadow-sm">
                <div class="text-xs text-gray-500 dark:text-gray-400 black:text-zinc-400 font-bold uppercase tracking-wide">Despesa no mês</div>
                <div class="mt-2 text-4xl font-extrabold text-gray-900 dark:text-white black:text-zinc-100">
                    R$ {{ $fmtMi($despesaMesMi) }} <span class="text-lg font-black opacity-70">mi</span>
                </div>
                <div class="mt-1 text-xs text-gray-500 dark:text-gray-400 black:text-zinc-500">Saídas acumuladas</div>
            </div>

            {{-- Saldo do mês: black:bg-zinc-900 black:border-indigo-500/20 --}}
            <div class="rounded-xl border border-indigo-300 dark:border-indigo-500/30 black:border-indigo-500/20 bg-indigo-50 dark:bg-indigo-500/10 black:bg-zinc-900 p-4 shadow-sm">
                {{-- Label: black:text-indigo-400 --}}
                <div class="text-xs text-indigo-700 dark:text-indigo-300 black:text-indigo-400 font-black uppercase tracking-wide">Saldo do mês</div>
                {{-- Value: black:text-indigo-400 --}}
                <div class="mt-2 text-5xl font-extrabold text-indigo-700 dark:text-indigo-300 black:text-indigo-400">
                    R$ {{ $fmtMi($saldoMesMi) }} <span class="text-xl font-black opacity-80">mi</span>
                </div>
                {{-- Hint: black:text-indigo-500/70 --}}
                <div class="mt-1 text-xs text-indigo-800/70 dark:text-indigo-200/70 black:text-indigo-500/70">Receita − Despesa</div>
            </div>

            {{-- Caixa hoje: black:bg-zinc-900 black:border-emerald-500/20 --}}
            <div class="rounded-xl border border-emerald-300 dark:border-emerald-500/30 black:border-emerald-500/20 bg-emerald-50 dark:bg-emerald-500/10 black:bg-zinc-900 p-4 shadow-sm">
                <div class="flex items-start justify-between gap-2">
                    <div>
                        {{-- Label: black:text-emerald-400 --}}
                        <div class="text-xs text-emerald-700 dark:text-emerald-300 black:text-emerald-400 font-black uppercase tracking-wide">Caixa hoje</div>
                        {{-- Value: black:text-emerald-400 --}}
                        <div class="mt-2 text-5xl font-extrabold text-emerald-700 dark:text-emerald-300 black:text-emerald-400">
                            R$ {{ $fmtMi($caixaHojeMi) }} <span class="text-xl font-black opacity-80">mi</span>
                        </div>
                        {{-- Hint: black:text-emerald-500/70 --}}
                        <div class="mt-1 text-xs text-emerald-800/70 dark:text-emerald-200/70 black:text-emerald-500/70">Saldo bancário consolidado</div>
                    </div>
                    <div class="p-2 rounded-xl bg-emerald-500/10 text-emerald-700 dark:text-emerald-300 black:text-emerald-400">
                        <x-bi-wallet2 class="w-8 h-8" />
                    </div>
                </div>
            </div>

            {{-- A pagar / Folha: black:bg-zinc-900 black:border-amber-500/20 --}}
            <div class="rounded-xl border border-amber-300 dark:border-amber-500/30 black:border-amber-500/20 bg-amber-50 dark:bg-amber-500/10 black:bg-zinc-900 p-4 shadow-sm">
                {{-- Label: black:text-amber-400 --}}
                <div class="text-xs text-amber-800 dark:text-amber-300 black:text-amber-400 font-black uppercase tracking-wide">A pagar / Folha</div>
                {{-- Value: black:text-amber-400 --}}
                <div class="mt-2 text-3xl font-extrabold text-amber-800 dark:text-amber-300 black:text-amber-400">
                    R$ {{ $fmtMi($aPagarMi) }} mi
                </div>
                {{-- Hint: black:text-amber-500/70 --}}
                <div class="mt-1 text-xs text-amber-900/70 dark:text-amber-200/70 black:text-amber-500/70">
                    Em aberto • Folha: R$ {{ $fmtMi($folhaMesMi) }} mi
                </div>
            </div>
        </section>

        {{-- GRÁFICOS --}}
        <section class="grid grid-cols-2 grid-rows-2 gap-6">
            <x-cards.card-tv id="fin-rx" title="Receitas x Despesas (R$ mi)" :chart="$chartReceitasDespesas" chart-type="area" />

            <x-cards.card-tv id="fin-comp" title="Composição de Receita (%)" :chart="$chartComposicaoReceita" chart-type="pie" />

            <x-cards.card-tv id="fin-elp" title="Empenhos / Liquidações / Pagamentos (Comparativo)" :chart="$chartELP" chart-type="column" />

            <x-cards.card-tv id="fin-funcao" title="Execução por Função (Previsto x Realizado)" :chart="$chartExecucaoFuncao" chart-type="bar" />
        </section>

        {{-- LETREIRO: black:bg-zinc-900 black:border-zinc-800 --}}
        <div class="bg-blue-900 dark:bg-blue-900 black:bg-zinc-900 text-white rounded-lg flex items-center overflow-hidden h-12 shadow-lg border border-blue-700 dark:border-blue-800 black:border-zinc-800">
            <div class="bg-red-600 text-white font-black px-4 h-full flex items-center z-10 uppercase text-sm tracking-wider shadow-md">
                Ao Vivo
            </div>
            {{-- Marquee: black:bg-zinc-900 black:text-zinc-200 --}}
            <div class="flex-1 overflow-hidden relative h-full flex items-center bg-blue-900 dark:bg-blue-900 black:bg-zinc-900">
                <div class="animate-marquee whitespace-nowrap absolute black:text-zinc-200">
                    <span class="mx-8 font-semibold text-lg">💰 Receita do mês: R$ {{ $fmtMi($receitaMesMi) }} mi • Despesa do mês: R$ {{ $fmtMi($despesaMesMi) }} mi • Saldo: R$ {{ $fmtMi($saldoMesMi) }} mi.</span>
                    <span class="mx-8 font-semibold text-lg text-yellow-300">⚠️ Atenção: Contas em aberto estimadas em R$ {{ $fmtMi($aPagarMi) }} mi (fornecedores e contratos).</span>
                    <span class="mx-8 font-semibold text-lg">🏦 Caixa consolidado hoje: R$ {{ $fmtMi($caixaHojeMi) }} mi • Monitoramento de conciliação bancária em andamento.</span>
                    <span class="mx-8 font-semibold text-lg">📄 Folha estimada do mês: R$ {{ $fmtMi($folhaMesMi) }} mi • Acompanhamento LRF e limites internos.</span>
                </div>
            </div>
        </div>
    </div>
</x-layouts.tv>