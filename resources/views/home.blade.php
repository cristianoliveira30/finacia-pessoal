<x-layouts.app :title="__('Painel do Prefeito')">

    <div class="w-full min-h-screen pt-2 px-4 sm:px-4 lg:pl-16 space-y-4" data-page-ai>

        @php
            $summaryMap = [
                'gestao' => $summary['balance'],
                'financas' => $summary['income'],
                'pendencias' => $summary['expense'],
                'nps' => $summary['expense_percentage'],
            ];
        @endphp

        <div class="pt-01">
            {{-- 1) KPIs Macro --}}
            <div class="grid grid-cols-1 md:grid-cols-4 gap-2 m-3 ">

                <div class="md:col-span-1" id="wrapper-card-gestao">
                    <x-cards.box.mainbox id="gestao" :value="$summary['balance']['value']" :status="$summary['balance']['status']" />
                </div>

                <div class="md:col-span-1" id="wrapper-card-financas">
                    <x-cards.box.mainbox id="financas" :value="$summary['income']['value']" :status="$summary['income']['status']" />
                </div>

                <div class="md:col-span-1" id="wrapper-card-pendencias">
                    <x-cards.box.mainbox id="pendencias" :value="$summary['expense']['value']" :status="$summary['expense']['status']" />
                </div>

                {{-- NPS agora irá renderizar corretamente --}}
                <div class="md:col-span-1" id="wrapper-card-nps">
                    <x-cards.box.mainbox id="nps" :value="$summary['expense_percentage']['value']" :status="$summary['expense_percentage']['status']" />
                </div>
            </div>

            {{-- 2) KPIs por Setor --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-3 m-3 ">
                @foreach ($miniboxes as $box)
                    <x-cards.box.minibox :box="$box" />
                @endforeach
            </div>

            {{-- 3) Gráficos Implementados --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 m-3">
                @php
                    // Gráfico 1: Evolução da Receita x Despesa (Área)
                    $chartGestaoFiscal = [
                        'categories' => $charts['income_vs_expense']['labels'],
                        'series' => $charts['income_vs_expense']['series'],
                    ];

                    // Gráfico 2: Demandas por Secretaria (Pizza)
                    $chartDemandas = [
                        'categories' => $charts['expenses_by_category']['labels'],
                        'series' => $charts['expenses_by_category']['series'],
                    ];

                    // Gráfico 3: Controle Interno - Prazos (Barra)
                    $chartPrazos = [
                        'categories' => ['Licitações', 'RH', 'Contratos', 'Fiscal'],
                        'series' => [
                            ['name' => 'No Prazo', 'data' => [95, 98, 92, 100]],
                            ['name' => 'Atraso', 'data' => [5, 2, 8, 0]],
                        ],
                        'colors' => ['#3b82f6', '#f59e0b'],
                    ];

                    // Gráfico 4: Execução Orçamentária por Pasta (Coluna)
                    $chartOrcamento = [
                        'categories' => ['Saúde', 'Educação', 'Infra'],
                        'series' => [
                            ['name' => 'Empenhado', 'data' => [12.5, 10.2, 8.5]],
                            ['name' => 'Liquidado', 'data' => [10.1, 9.8, 4.2]],
                        ],
                        'overlays' => [
                            'movingAverage' => [
                                'enabled' => true,
                                'period' => 1,
                                'seriesIndex' => 1, // 0 = previsto, 1 = realizado
                                'name' => 'Média Móvel',
                            ],
                            'trendline' => [
                                'enabled' => true,
                                'seriesIndex' => 1,
                                'name' => 'Tendência',
                            ],
                        ],
                    ];

                    // Gráfico 5: Performance Setorial (Radar)
                    $chartPerformance = [
                        'categories' => ['Finanças', 'Saúde', 'Educação', 'Obras', 'Social'],
                        'series' => [['name' => 'Score Atual', 'data' => [82, 65, 78, 90, 88]]],
                    ];
                @endphp

                <x-cards.card id="central-indice" title="Evolução da Gestão Fiscal (R$ mi)" :chart="$chartGestaoFiscal"
                    chart-type="area" />
                <x-cards.card id="central-demandas" title="Demandas por Secretaria" :chart="$chartDemandas"
                    chart-type="pie" />
                <x-cards.card id="central-pendencias" title="Controle Interno (Conformidade %)" :chart="$chartPrazos"
                    chart-type="bar" />
                <x-cards.card id="central-execucao" title="Execução Orçamentária (R$ mi)" :chart="$chartOrcamento"
                    chart-type="column" />
                <x-cards.card id="central-scores" title="Performance Setorial (0-100)" :chart="$chartPerformance"
                    chart-type="radial" />
            </div>
        </div>

    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                window.CardAI?.init?.();
                window.Card?.bindAllOverlayToggles?.();
            });
        </script>
    @endpush
</x-layouts.app>
