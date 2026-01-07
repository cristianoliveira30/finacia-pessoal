<x-layouts.tv :title="__('Painel de Gestão Municipal — TV')">
    @push('head')
        <meta http-equiv="refresh" content="30">
        <style>
            .animate-marquee { animation: marquee 25s linear infinite; }
            @keyframes marquee {
                0% { transform: translateX(100%); }
                100% { transform: translateX(-100%); }
            }
        </style>
    @endpush

    @php
        // ==========================
        // DADOS (os mesmos do seu código, com rand)
        // ==========================

        // --- SAÚDE ---
        $ocupacaoUPA = rand(60, 95);
        $casosDengue = rand(10, 50);
        $casosGripe  = rand(40, 80);
        $casosCovid  = rand(5, 20);

        // --- EDUCAÇÃO ---
        $presencaAlunos = rand(85, 98);

        // --- FINANÇAS ---
        $iptu = rand(100,200);
        $iss  = rand(80,150);
        $itbi = rand(20,50);

        $gastoFolha = rand(40, 48);
        $gastoCusteio = rand(30, 40);
        $gastoInvest = rand(5, 15);

        // --- OBRAS / SOCIAL ---
        $obrasNoPrazo = rand(10,20);
        $obrasAtras   = rand(1,5);
        $obrasConc    = rand(5,10);

        $socialCesta  = rand(50,100);
        $socialAux    = rand(30,60);
        $socialAlug   = rand(10,20);

        // ==========================
        // KPIs (5 cards) — claros e executivos
        // ==========================
        $kpiSaude = $ocupacaoUPA; // %
        $kpiEduc  = $presencaAlunos; // %
        $kpiFin   = ($iptu + $iss + $itbi); // "mil" (mantendo sua unidade original)
        $kpiObras = ($obrasNoPrazo + $obrasAtras + $obrasConc); // total obras
        $kpiSocial = ($socialCesta + $socialAux + $socialAlug); // total benefícios

        // ==========================
        // GRÁFICOS (padrão do financeiro: area + pie + column + bar)
        // ==========================

        // 1) AREA — Tendência consolidada (índice geral municipal)
        $meses = ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'];
        $indiceGeral = [72, 74, 73, 76, 78, 80, 79, 81, 83, 84, 85, 86]; // fake coerente
        $chartGeralArea = [
            'x_label' => 'Mês',
            'categories' => $meses,
            'series' => [
                ['name' => 'Índice Geral (0-100)', 'data' => $indiceGeral],
            ],
        ];

        // 2) PIE — Composição (participação por área no "painel")
        // (mantém a ideia “composição” do print, mas no geral)
        $chartComposicaoAreas = [
            'x_label' => '%',
            'categories' => ['Saúde','Educação','Finanças','Infra','Social'],
            'series' => [[
                'name' => 'Peso (%)',
                'data' => [28, 22, 20, 18, 12], // fake
            ]],
        ];

        // 3) COLUMN — Comparativo anual por área (Previsto/Realizado)
        // (igual ao “comparativo” do print, só que geral)
        $chartComparativoAno = [
            'x_label' => 'Áreas',
            'categories' => ['Saúde','Educação','Finanças','Infra','Social'],
            'series' => [
                ['name' => '2024', 'data' => [rand(140,200), rand(150,210), rand(90,140), rand(70,120), rand(40,90)]],
                ['name' => '2025', 'data' => [rand(150,210), rand(160,220), rand(95,150), rand(80,130), rand(45,95)]],
            ],
        ];

        // 4) BAR — Execução por área (Previsto x Realizado)
        // (seu componente tende a renderizar bar como horizontal)
        $prev = [210, 220, 150, 130, 95];
        $real = [190, 205, 128, 115, 82];
        $chartExecucaoAreas = [
            'x_label' => 'Execução',
            'categories' => ['Saúde','Educação','Finanças','Infra','Social'],
            'series' => [
                ['name' => 'Previsto', 'data' => $prev],
                ['name' => 'Realizado', 'data' => $real],
            ],
            'horizontal' => true,
        ];

    @endphp

    <div class="h-full grid grid-rows-[auto_auto_auto] gap-6 content-center">

        {{-- ===== TOPO: 5 KPIs claros ===== --}}
        <section class="grid grid-cols-5 gap-2 mt-3">

            {{-- Saúde --}}
            <div class="rounded-xl border border-rose-300/40 bg-white/5 dark:bg-gray-800/40 p-4 shadow-sm">
                <div class="text-xs text-gray-300 font-bold uppercase tracking-wide">Saúde</div>
                <div class="mt-2 text-5xl font-extrabold text-white">
                    {{ $kpiSaude }}<span class="text-xl opacity-70">%</span>
                </div>
                <div class="mt-1 text-xs text-gray-300">Ocupação UPA (agora)</div>
            </div>

            {{-- Educação --}}
            <div class="rounded-xl border border-emerald-300/40 bg-white/5 dark:bg-gray-800/40 p-4 shadow-sm">
                <div class="text-xs text-gray-300 font-bold uppercase tracking-wide">Educação</div>
                <div class="mt-2 text-5xl font-extrabold text-white">
                    {{ $kpiEduc }}<span class="text-xl opacity-70">%</span>
                </div>
                <div class="mt-1 text-xs text-gray-300">Frequência média (hoje)</div>
            </div>

            {{-- Finanças --}}
            <div class="rounded-xl border border-sky-300/40 bg-white/5 dark:bg-gray-800/40 p-4 shadow-sm">
                <div class="text-xs text-gray-300 font-bold uppercase tracking-wide">Finanças</div>
                <div class="mt-2 text-5xl font-extrabold text-white">
                    {{ $kpiFin }}<span class="text-xl opacity-70"> mil</span>
                </div>
                <div class="mt-1 text-xs text-gray-300">Arrecadação (IPTU+ISS+ITBI)</div>
            </div>

            {{-- Infra --}}
            <div class="rounded-xl border border-amber-300/40 bg-white/5 dark:bg-gray-800/40 p-4 shadow-sm">
                <div class="text-xs text-gray-300 font-bold uppercase tracking-wide">Infraestrutura</div>
                <div class="mt-2 text-5xl font-extrabold text-white">
                    {{ $kpiObras }}
                </div>
                <div class="mt-1 text-xs text-gray-300">Obras (total em acompanhamento)</div>
            </div>

            {{-- Social --}}
            <div class="rounded-xl border border-indigo-300/40 bg-white/5 dark:bg-gray-800/40 p-4 shadow-sm">
                <div class="text-xs text-gray-300 font-bold uppercase tracking-wide">Assistência Social</div>
                <div class="mt-2 text-5xl font-extrabold text-white">
                    {{ $kpiSocial }}
                </div>
                <div class="mt-1 text-xs text-gray-300">Benefícios entregues (hoje)</div>
            </div>
        </section>

        {{-- ===== GRÁFICOS: padrão 2x2 (mais legível) ===== --}}
        <section class="grid grid-cols-2 grid-rows-2 gap-6">
            {{-- 1) AREA --}}
            <x-cards.card-tv id="pref-01" title="Tendência Geral (Índice Municipal)" :chart="$chartGeralArea" chart-type="area" />

            {{-- 2) PIE --}}
            <x-cards.card-tv id="pref-02" title="Composição por Área (%)" :chart="$chartComposicaoAreas" chart-type="pie" />

            {{-- 3) COLUMN (igual ao “comparativo” que você curtiu) --}}
            <x-cards.card-tv id="pref-03" title="Comparativo 2024 x 2025 (por área)" :chart="$chartComparativoAno" chart-type="column" />

            {{-- 4) BAR (execução por área) --}}
            <x-cards.card-tv id="pref-04" title="Execução por Área (Previsto x Realizado)" :chart="$chartExecucaoAreas" chart-type="bar" />
        </section>

        {{-- ===== RODAPÉ ===== --}}
        <div class="bg-blue-900 text-white rounded-lg flex items-center overflow-hidden h-12 shadow-lg border border-blue-700">
            <div class="bg-red-600 text-white font-black px-4 h-full flex items-center z-10 uppercase text-sm tracking-wider shadow-md">
                Ao Vivo
            </div>
            <div class="flex-1 overflow-hidden relative h-full flex items-center bg-blue-900">
                <div class="animate-marquee whitespace-nowrap absolute">
                    <span class="mx-8 font-semibold text-lg">🏥 Saúde: ocupação UPA {{ $ocupacaoUPA }}% • Casos hoje — Dengue {{ $casosDengue }}, Gripe {{ $casosGripe }}, Covid {{ $casosCovid }}.</span>
                    <span class="mx-8 font-semibold text-lg text-yellow-300">⚠️ Finanças: folha {{ $gastoFolha }}% • Custeio {{ $gastoCusteio }}% • Investimento {{ $gastoInvest }}% (referência orçamentária).</span>
                    <span class="mx-8 font-semibold text-lg">🏗️ Infra: no prazo {{ $obrasNoPrazo }}, atrasadas {{ $obrasAtras }}, concluídas {{ $obrasConc }}.</span>
                    <span class="mx-8 font-semibold text-lg">📦 Social: cesta {{ $socialCesta }}, auxílio {{ $socialAux }}, aluguel social {{ $socialAlug }}.</span>
                </div>
            </div>
        </div>

    </div>
</x-layouts.tv>
