<x-layouts.app :title="__('Painel do Prefeito')">

    <div class="w-full min-h-screen pt-2 px-4 sm:px-4 lg:pl-16 space-y-4" data-page-ai>

        @php
            // ------------------------------------------------------
            // Lógica de dados (Scores e Pesos)
            // ------------------------------------------------------
            $setoresDados = [
                'Finanças' => ['score' => 82],
                'Obras' => ['score' => 71],
                'Saúde' => ['score' => 74],
                'Educação' => ['score' => 79],
                'Assist.' => ['score' => 77],
                'Ouvidoria' => ['score' => 69],
            ];

            $pesos = [
                'Finanças' => 0.25,
                'Obras' => 0.2,
                'Saúde' => 0.2,
                'Educação' => 0.15,
                'Assist.' => 0.1,
                'Ouvidoria' => 0.1,
            ];

            $indiceGeral = 0;
            foreach ($setoresDados as $nome => $meta) {
                $indiceGeral += ($meta['score'] ?? 0) * ($pesos[$nome] ?? 0);
            }
            $indiceGeral = (int) round($indiceGeral);

            $execucaoOrcamentaria = 76;
            $pendenciasCriticas = 143;
            $nps = 48;

            // ------------------------------------------------------
            // CORREÇÃO: Preenchimento dos Arrays para os Gráficos
            // ------------------------------------------------------

            // (A) Linha/Área: Evolução do Índice Geral
            $chartIndice = [
                'x_label' => 'Mês',
                'categories' => ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
                'series' => [
                    [
                        'name' => 'Índice Geral (0-100)',
                        'data' => [63, 65, 66, 68, 70, 72, 74, 73, 75, 76, 77, $indiceGeral],
                    ],
                ],
            ];

            // (B) Barras: Pendências por setor
            // Nota: usamos array_keys($setoresDados) pois $setores não existe nesta branch
            $chartPendencias = [
                'categories' => array_keys($setoresDados),
                'series' => [
                    ['name' => 'Abertas', 'data' => [38, 52, 41, 29, 18, 33]],
                    ['name' => 'Vencidas', 'data' => [12, 24, 15, 9, 6, 17]],
                ],
            ];

            // (C) Pizza: Distribuição de Demandas
            $chartDemandas = [
                'x_label' => 'Setor',
                'categories' => array_keys($setoresDados),
                'series' => [['name' => 'Solicitações', 'data' => [18, 22, 26, 12, 9, 13]]],
            ];

            // (D) Colunas: Execução por setor
            $chartExecucao = [
                'x_label' => 'Setor',
                'categories' => array_keys($setoresDados),
                'series' => [
                    ['name' => 'Previsto (R$ mi)', 'data' => [12, 25, 18, 14, 9, 6]],
                    ['name' => 'Realizado (R$ mi)', 'data' => [10, 16, 14, 12, 7, 4]],
                ],
            ];

            // (E) Radial: Score por setor
            $chartScoreSetor = [
                'categories' => array_keys($setoresDados),
                'series' => [
                    [
                        'name' => 'Score do Setor',
                        'data' => array_map(fn($s) => $s['score'], array_values($setoresDados)),
                    ],
                ],
            ];
        @endphp
        <div class="pt-01">
            {{-- 1) KPIs Macro (4 boxes no topo) --}}
            <div class="grid grid-cols-1 md:grid-cols-4 gap-2 m-3 ">

                {{-- 1. Índice Geral de Gestão --}}
                <div class="md:col-span-1" id="wrapper-card-gestao">
                    <x-cards.box.mainbox id="gestao" :value="$indiceGeral" />
                </div>

                {{-- 2. Execução Orçamentária --}}
                <div class="md:col-span-1" id="wrapper-card-financas">
                    <x-cards.box.mainbox id="financas" :value="$execucaoOrcamentaria" />
                </div>

                {{-- 3. Pendências Críticas --}}
                <div class="md:col-span-1" id="wrapper-card-pendencias">
                    <x-cards.box.mainbox id="pendencias" :value="$pendenciasCriticas" />
                </div>

                {{-- 4. Satisfação (NPS) --}}
                <div class="md:col-span-1" id="wrapper-card-nps">
                    <x-cards.box.mainbox id="nps" :value="$nps" />
                </div>

            </div>

            {{-- 2) KPIs por Setor --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-3 m-3 ">
                <x-cards.box.minibox id="Finanças" />
                <x-cards.box.minibox id="Obras" />
                <x-cards.box.minibox id="Saúde" />
                <x-cards.box.minibox id="Educação" />
                <x-cards.box.minibox id="Assist." />
                <x-cards.box.minibox id="Ouvidoria" />
            </div>

            {{-- 3) Gráficos gerais --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <x-cards.card id="central-indice" title="Evolução do Índice Geral" :chart="$chartIndice"
                    chart-type="area" />
                <x-cards.card id="central-demandas" title="Distribuição de Demandas por Setor" :chart="$chartDemandas"
                    chart-type="pie" />
                <x-cards.card id="central-pendencias" title="Pendências por Setor (Abertas x Vencidas)"
                    :chart="$chartPendencias" chart-type="bar" />
                <x-cards.card id="central-execucao" title="Execução por Setor (Previsto x Realizado)" :chart="$chartExecucao"
                    chart-type="column" />
                <x-cards.card id="central-scores" title="Score por Setor (0-100)" :chart="$chartScoreSetor"
                    chart-type="radial" />
            </div>

        </div>

    </div>

    @push('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                if (!document.getElementById("central-indice")) return;

                const alerts = window.Alerts;
                let controller = null;

                const btnSelector = "[data-action='refresh-dashboard']";

                const jobs = [{
                        targetId: "central-indice",
                        link: "/api/graph/indice-geral",
                        method: "POST",
                        filtros: {}
                    },
                    {
                        targetId: "central-demandas",
                        link: "/api/graph/demandas",
                        method: "POST",
                        filtros: {}
                    },
                    {
                        targetId: "central-pendencias",
                        link: "/api/graph/pendencias",
                        method: "POST",
                        filtros: {}
                    },
                    {
                        targetId: "central-execucao",
                        link: "/api/graph/execucao",
                        method: "POST",
                        filtros: {}
                    },
                    {
                        targetId: "central-scores",
                        link: "/api/graph/scores",
                        method: "POST",
                        filtros: {}
                    },
                ];

                const setLoading = (id, on) => {
                    const el = document.getElementById(id);
                    if (!el) return;
                    el.classList.toggle("opacity-60", on);
                    el.classList.toggle("pointer-events-none", on);
                };

                const setBusy = (on) => {
                    const btn = document.querySelector(btnSelector);
                    btn?.toggleAttribute("disabled", on);
                    btn?.setAttribute("aria-busy", on ? "true" : "false");
                };

                const renderChart = (id, chartData) => {
                    console.log("Render", id, chartData);
                    // aqui você atualiza ApexCharts / DOM etc.
                };

                const getTipotempo = () => localStorage.getItem("tipotempo") || "hoje";

                async function fetchData() {
                    // cancela a anterior
                    if (controller) controller.abort();
                    controller = new AbortController();

                    const tipotempo = getTipotempo();

                    setBusy(true);
                    jobs.forEach(j => setLoading(j.targetId, true));

                    try {
                        const results = await Promise.allSettled(
                            jobs.map(j => window.Api.getRelatoriosGraph({
                                    ...j,
                                    filtros: {
                                        ...j.filtros,
                                        tipotempo
                                    }
                                }, // <<< injeta tipotempo em todas
                                {
                                    signal: controller.signal
                                }
                            ))
                        );

                        results.forEach((r, idx) => {
                            const job = jobs[idx];
                            if (r.status === "fulfilled") {
                                renderChart(job.targetId, r.value);
                            } else {
                                const err = r.reason;
                                if (err?.code !== "ERR_CANCELED" && err?.name !== "AbortError") {
                                    alerts?.showError?.({
                                        title: "Erro ao carregar",
                                        msg: `Falha em ${job.targetId}`
                                    });
                                }
                            }
                        });
                    } finally {
                        jobs.forEach(j => setLoading(j.targetId, false));
                        setBusy(false);
                    }
                }

                // Clique no botão refresh
                document.addEventListener("click", (e) => {
                    const btn = e.target.closest(btnSelector);
                    if (!btn) return;
                    fetchData();
                });

                // ✅ Quando o tipotempo mudar, refaz tudo
                window.addEventListener("tipotempo:change", () => fetchData());

                // primeira carga
                fetchData();

                window.addEventListener("beforeunload", () => controller?.abort(), {
                    once: true
                });
            });
        </script>
    @endpush

    {{-- script para a ia nos cards --}}
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                window.CardAI?.init?.();
            });
        </script>
    @endpush
</x-layouts.app>
