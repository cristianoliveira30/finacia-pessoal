<x-layouts.app :title="__('Dashboard')">

    {{-- Wrapper geral do conteúdo da página --}}
    <div class="w-full min-h-screen pt-4 px-8 sm:px-4 lg:pl-16 space-y-4">
        <!-- cards de cima -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-2">
            <div class="md:col-span-1">
                <x-cards.box.atendimentos.hoje :config="['link' => '/report']" />
            </div>
            <div class="md:col-span-1">
                <x-cards.box.atendimentos.mes :config="['link' => '/report']" />
            </div>
            <div class="md:col-span-1">
                <x-cards.box.cadastrados.hoje :config="['link' => '/report']" />
            </div>
            <div class="md:col-span-1">
                <x-cards.box.cadastrados.mes :config="['link' => '/report']" />
            </div>
        </div>

        @php
            // Linha (semana): protocolos/solicitações
            $chartData = [
                'x_label' => 'Data',
                'categories' => ['01 Fev', '02 Fev', '03 Fev', '04 Fev', '05 Fev', '06 Fev', '07 Fev'],
                'series' => [
                    ['name' => 'Protocolos Abertos', 'data' => [84, 91, 76, 98, 102, 87, 110]],
                    ['name' => 'Protocolos Resolvidos', 'data' => [62, 70, 58, 79, 88, 74, 95]],
                ],
            ];

            // Pizza: origem/canal de entrada do atendimento
            $pieChartData = [
                'x_label' => 'Canal',
                'categories' => ['Presencial', 'Telefone', 'Portal/App'],
                'series' => [['name' => 'Percentual', 'data' => [35, 25, 40]]],
            ];

            // Colunas: demandas por área/secretaria
            $columnChartData = [
                'x_label' => 'Área',
                'categories' => ['Saúde', 'Educação', 'Obras', 'Iluminação', 'Limpeza', 'Trânsito', 'Assistência'],
                'series' => [
                    ['name' => 'Solicitações', 'data' => [120, 95, 140, 110, 130, 80, 70]],
                    ['name' => 'Concluídas', 'data' => [88, 72, 101, 79, 96, 55, 51]],
                ],
            ];

            // Barras: execução (receita x despesa) por mês
            $barChartData = [
                'categories' => ['Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
                'series' => [
                    ['name' => 'Receita (R$ mil)', 'data' => [1820, 1910, 2050, 1980, 2140, 2290]],
                    ['name' => 'Despesa (R$ mil)', 'data' => [1650, 1720, 1880, 1810, 1950, 2060]],
                ],
            ];

            // Radial: status de programas/obras/ações
            $radialChartData = [
                ['name' => 'Planejado', 'data' => [92]],
                ['name' => 'Em execução', 'data' => [78]],
                ['name' => 'Concluído', 'data' => [64]],
            ];
        @endphp

        {{-- grid dos gráficos --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <x-cards.card id="relatorio-vendas" title="Protocolos da Semana" :chart="$chartData" />

            <x-cards.card id="relatorio-canais" title="Entrada por Canal" :chart="$pieChartData" chart-type="pie" />

            <x-cards.card id="relatorio-dias" title="Demandas por Área" :chart="$columnChartData" chart-type="column" />

            <x-cards.card id="relatorio-mes" title="Execução Orçamentária" :chart="$barChartData" chart-type="bar" />

            <x-cards.card id="progresso-time" title="Andamento de Programas" :chart="$radialChartData" chart-type="radial" />
        </div>
    </div>
    @push('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                if (!document.getElementById("relatorio-vendas")) return;

                const alerts = window.Alerts;
                function setLoading(id, on) {
                    const el = document.getElementById(id);
                    if (!el) return;
                    el.classList.toggle("opacity-60", on);
                    el.classList.toggle("pointer-events-none", on);
                }

                function renderChart(id, chartData) {
                    console.log("Render", id, chartData);
                }

                const controller = new AbortController();

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
                        alerts.showError({title: 'Erro ao carregar', msg: 'Erro ao carregar relatório...'})
                    } finally {
                        setLoading(job.targetId, false);
                    }
                });

                Promise.allSettled(promises);

                window.addEventListener("beforeunload", () => controller.abort(), {
                    once: true
                });
            });
        </script>
    @endpush

</x-layouts.app>
