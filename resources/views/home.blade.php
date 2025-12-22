<x-layouts.app :title="__('Painel do Prefeito')">
    <div class="w-full min-h-screen pt-4 px-8 sm:px-4 lg:pl-16 space-y-4">
        @php
            // Lógica de dados mantida intacta
            $setoresDados = [
                'Finanças' => ['score' => 82],
                'Obras'    => ['score' => 71],
                'Saúde'    => ['score' => 74],
                'Educação' => ['score' => 79],
                'Assist.'  => ['score' => 77],
                'Ouvidoria'=> ['score' => 69],
            ];

            $pesos = [
                'Finanças' => 0.25, 'Obras' => 0.20, 'Saúde' => 0.20,
                'Educação' => 0.15, 'Assist.' => 0.10, 'Ouvidoria'=> 0.10,
            ];

            $indiceGeral = 0;
            foreach ($setoresDados as $nome => $meta) {
                $indiceGeral += ($meta['score'] ?? 0) * ($pesos[$nome] ?? 0);
            }
            $indiceGeral = (int) round($indiceGeral);

            $execucaoOrcamentaria = 76;
            $pendenciasCriticas = 143;
            $nps = 48;

            // Variáveis dos gráficos mantidas para evitar erros no JS existente
            $chartIndice = ['x_label' => 'Mês', 'categories' => ['Jan','Fev'], 'series' => []]; 
            $chartPendencias = ['categories' => [], 'series' => []];
            $chartDemandas = ['categories' => [], 'series' => []];
            $chartExecucao = ['categories' => [], 'series' => []];
            $chartScoreSetor = ['categories' => [], 'series' => []];
        @endphp

        {{-- 1) KPIs Macro (4 boxes no topo) --}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-2">
            <div class="md:col-span-1">
                <x-cards.box.box-01 :config="['link' => '/dashboard/central', 'prefix' => '', 'suffix' => '/100', 'label' => 'Índice Geral de Gestão', 'value' => $indiceGeral, 'text' => 'composto por setores']" />
            </div>
            <div class="md:col-span-1">
                <x-cards.box.box-02 :config="['link' => '/dashboard/financas', 'prefix' => '', 'suffix' => '%', 'label' => 'Execução Orçamentária', 'value' => $execucaoOrcamentaria, 'text' => 'realizado / previsto']" />
            </div>
            <div class="md:col-span-1">
                <x-cards.box.box-01 :config="['link' => '/dashboard/ouvidoria', 'prefix' => '', 'suffix' => '', 'label' => 'Pendências Críticas', 'value' => $pendenciasCriticas, 'text' => 'itens vencidos/atrasados']" />
            </div>
            <div class="md:col-span-1">
                <x-cards.box.box-02 :config="['link' => '/dashboard/ouvidoria', 'prefix' => '', 'suffix' => '', 'label' => 'Satisfação (NPS)', 'value' => $nps, 'text' => 'pesquisas do cidadão']" />
            </div>
        </div>
        {{-- 2) KPIs por Setor (1 box por secretaria) --}}
        <div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-6 gap-2">
            @foreach ($setores as $nome => $meta)
                <div>
                    <x-cards.box.box-01 :config="[
                        'link' => $meta['link'],
                        'prefix' => '',
                        'suffix' => '/100',
                        'label' => $nome,
                        'value' => $meta['score'],
                        'text' => $meta['hint']
                    ]" />
                </div>
            @endforeach
        </div>
        {{-- 3) Gráficos gerais (painel central) --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <x-cards.card id="central-indice" title="Evolução do Índice Geral" :chart="$chartIndice" chart-type="area" />
            <x-cards.card id="central-demandas" title="Distribuição de Demandas por Setor" :chart="$chartDemandas" chart-type="pie" />
            <x-cards.card id="central-pendencias" title="Pendências por Setor (Abertas x Vencidas)" :chart="$chartPendencias" chart-type="bar" />
            <x-cards.card id="central-execucao" title="Execução por Setor (Previsto x Realizado)" :chart="$chartExecucao" chart-type="column" />
            <x-cards.card id="central-scores" title="Score por Setor (0-100)" :chart="$chartScoreSetor" chart-type="radial" />
        </div>

    </div>

    @push('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                if (!document.getElementById("relatorio-vendas")) return;

                const alerts = window.Alerts;
                let controller = null;

                function setLoading(id, on) {
                    const el = document.getElementById(id);
                    if (!el) return;
                    el.classList.toggle("opacity-60", on);
                    el.classList.toggle("pointer-events-none", on);
                }

                function renderChart(id, chartData) {
                    console.log("Render", id, chartData);
                }

                window.fetchData = async function() {
                    const btn = document.querySelector("[data-action='refresh-dashboard']");
                    btn?.toggleAttribute("disabled", true);
                    btn?.setAttribute("aria-busy", "true");

                    // se clicar várias vezes, cancela a anterior
                    if (controller) controller.abort();
                    controller = new AbortController();

                    const jobs = [{
                            targetId: "relatorio-vendas",
                            link: "/api/graph/semana",
                            method: "POST",
                            filtros: {
                                range: "7d"
                            }
                        },
                        {
                            targetId: "relatorio-canais",
                            link: "/api/graph/canais",
                            method: "POST",
                            filtros: {
                                range: "7d"
                            }
                        },
                        {
                            targetId: "relatorio-dias",
                            link: "/api/graph/areas",
                            method: "POST",
                            filtros: {
                                range: "30d"
                            }
                        },
                        {
                            targetId: "relatorio-mes",
                            link: "/api/graph/mes",
                            method: "POST",
                            filtros: {
                                year: 2025
                            }
                        },
                        {
                            targetId: "progresso-time",
                            link: "/api/graph/status",
                            method: "POST",
                            filtros: {}
                        },
                    ];

                    const promises = jobs.map(async (job) => {
                        setLoading(job.targetId, true);
                        try {
                            const data = await window.Api.getRelatoriosGraph(job, {
                                signal: controller.signal
                            });
                            renderChart(job.targetId, data);
                        } catch (err) {
                            // não alerta se foi abort
                            if (err?.name !== "AbortError") {
                                alerts?.showError?.({
                                    title: "Erro ao carregar",
                                    msg: "Erro ao chamar os dados"
                                });
                            }
                        } finally {
                            setLoading(job.targetId, false);
                            btn?.toggleAttribute("disabled", false);
                            btn?.setAttribute("aria-busy", "false");
                        }
                    });

                    await Promise.allSettled(promises);
                };

                // ✅ clique em qualquer lugar, pega o botão certo
                document.addEventListener("click", (e) => {
                    const btn = e.target.closest("[data-action='refresh-dashboard']");
                    if (!btn) return;
                    window.fetchData();
                });

                window.fetchData();
                window.addEventListener("beforeunload", () => controller?.abort(), {
                    once: true
                });
            });
        </script>
    @endpush
</x-layouts.app>