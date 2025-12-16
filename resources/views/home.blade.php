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
            // 1. Gráfico de Linha: Atendimentos do Gabinete (Saúde vs Infraestrutura)
            // Mostra a evolução das demandas que chegam ao escritório político
            $chartData = [
                'x_label' => 'Dia da Semana',
                'categories' => ['Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta'],
                'series' => [
                    // Série 1: Custos operacionais (Gasolina, Lanches, Material Gráfico)
                    // (Antigo "Atendimento Presencial")
                    ['name' => 'Gasto Operacional/Gabinete', 'data' => [150.00, 220.50, 180.00, 300.00, 120.00]],
                    
                    // Série 2: Investimento em Mídia (Facebook Ads, Disparos, Google)
                    // (Antigo "WhatsApp/Digital")
                    ['name' => 'Impulsionamento Digital', 'data' => [450.00, 380.00, 550.00, 420.00, 600.00]],
                ],
            ];

            // 2. Gráfico de Pizza: Problemas de Trânsito mais relatados pelos bairros
            // Ajuda a criar "Indicações" para a prefeitura
// 2. Gráfico de Pizza: Origem das Demandas (Canais de Atendimento)
            // Mostra qual canal é mais efetivo para captar solicitações
            $pieChartData = [
                'x_label' => 'Canal de Origem',
                'categories' => ['WhatsApp Oficial', 'Indicação de Lideranças', 'Redes Sociais (Insta/FB)', 'Gabinete Presencial', 'Ações de Rua'],
                'series' => [['name' => 'Solicitações', 'data' => [45, 25, 15, 10, 5]]],
            ];

            // 3. Gráfico de Colunas: Perfil de Escolaridade dos Cidadãos Atendidos
            // Importante para entender o público-alvo do mandato
            $columnChartData = [
        'x_label' => 'Região / Bairro',
        'categories' => ['Centro Histórico', 'Zona Norte', 'Jd. Primavera', 'Distrito Industrial', 'Zona Rural'],
        'series' => [
            // Série 1: Pedidos físicos (Buraco, Luz, Lixo)
            ['name' => 'Infraestrutura Urbana', 'data' => [45, 120, 85, 60, 150]],
            // Série 2: Pedidos assistenciais (Remédio, Cesta Básica, Vaga Creche)
            ['name' => 'Social e Saúde', 'data' => [90, 80, 50, 30, 40]],
        ],
    ];

    // 4. Gráfico de Barras: Execução Orçamentária (Emendas Impositivas)
            // MOSTRA: O dinheiro que o político destinou vs. o que a prefeitura realmente pagou.
            // Isso é vital para cobrar o Executivo.
            $barChartData = [
                'categories' => ['Reforma UBS Centro', 'Pavimentação Rua 12', 'Aquisição Ambulância', 'Iluminação da Praça'],
                'series' => [
                    // Quanto você mandou de verba
                    ['name' => 'Verba Destinada (R$)', 'data' => [150000, 300000, 250000, 80000]],
                    // Quanto a prefeitura já liberou (Execução)
                    ['name' => 'Valor Pago (R$)', 'data' => [120000, 50000, 250000, 10000]], 
                ],
            ];

            // 5. Gráfico Radial: Andamento de Programas (Legislativo)
            // MOSTRA: O funil de aprovação dos seus projetos de lei na Câmara.
            $radialChartData = [
                'categories' => ['Protocolados', 'Aprovados na Comissão', 'Sancionados (Lei)'], 
                'series' => [
                    [
                        'name' => 'Taxa de Conversão', 
                        'data' => [100, 65, 30] // Ex: De 100% das ideias, 30% viraram lei de fato.
                    ]
                ],
            ];
        @endphp

        {{-- grid dos gráficos --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <x-cards.card id="relatorio-vendas" title="Investimento Diário" :chart="$chartData" />

            <x-cards.card id="relatorio-canais" title="Origem das Demandas" :chart="$pieChartData" chart-type="pie" />

            <x-cards.card id="relatorio-dias" title="Diagnóstico Regional" :chart="$columnChartData" chart-type="column" />

            <x-cards.card id="relatorio-mes" title="Monitoramento de Emendas" :chart="$barChartData" chart-type="bar" />

            <x-cards.card id="progresso-time" title="Produtividade Legislativa" :chart="$radialChartData" chart-type="radial" />
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
