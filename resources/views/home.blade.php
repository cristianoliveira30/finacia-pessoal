<x-layouts.app :title="__('Painel do Prefeito')">

    <div class="w-full min-h-screen pt-2 px-4 sm:px-4 lg:pl-16 space-y-4" data-page-ai>

        @php
            $summaryMap = [
                'gestao' => $summary['balance'],
                'financas' => $summary['income'],
                'pendencias' => $summary['expense'],
                'nps' => $summary['expense_percentage'],
            ];

            $dtpValor = number_format($summary['expense_percentage']['value'] ?? 0, 2, ',', '.');
            $resultadoFinanceiro = number_format($summary['income']['value'] ?? 0, 2, ',', '.');
            $indiceControleInterno = number_format($summary['expense']['value'] ?? 0, 2, ',', '.');
            $nps = number_format($summary['balance']['value'] ?? 0, 2, ',', '.');

        @endphp

        <div class="pt-01">
            {{-- 1) KPIs Macro --}}
            <div class="grid grid-cols-1 md:grid-cols-4 gap-2 m-3 ">

                <div class="md:col-span-1" id="wrapper-card-gestao">
                    <x-cards.box.mainbox id="gestao" :value="$summaryMap['gestao']['value']" :status="$summaryMap['gestao']['status']" />
                </div>

                <div class="md:col-span-1" id="wrapper-card-financas">
                    <x-cards.box.mainbox id="financas" :value="$summaryMap['financas']['value']" :status="$summaryMap['financas']['status']" />
                </div>

                <div class="md:col-span-1" id="wrapper-card-pendencias">
                    <x-cards.box.mainbox id="pendencias" :value="$summaryMap['pendencias']['value']" :status="$summaryMap['pendencias']['status']" />
                </div>

                {{-- NPS agora irá renderizar corretamente --}}
                <div class="md:col-span-1" id="wrapper-card-nps">
                    <x-cards.box.mainbox id="nps" :value="$summaryMap['nps']['value']" :status="$summaryMap['nps']['status']" />
                </div>
            </div>

            {{-- 2) KPIs por Setor --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-3 m-3 ">
                <x-cards.box.minibox id="fin_exec" :data="$miniboxes" />
                <x-cards.box.minibox id="fin_arr" :data="$miniboxes" />
                <x-cards.box.minibox id="biggest_category" :data="$miniboxes" />
                <x-cards.box.minibox id="transactions_count" :data="$miniboxes" />
                <x-cards.box.minibox id="food_expense" :data="$miniboxes" />
                <x-cards.box.minibox id="transport_expense" :data="$miniboxes" />
            </div>

            {{-- 3) Gráficos Implementados --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 m-3">
                @php
                    // Gráfico 1: Evolução da Receita x Despesa (Área)
                    $chartGestaoFiscal = [
                        'categories' => ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun'],
                        'series' => [
                            ['name' => 'Receita', 'data' => [18.2, 19.5, 20.1, 21.0, 22.5, 22.8]],
                            ['name' => 'Despesa', 'data' => [14.0, 15.2, 16.5, 15.8, 14.9, 14.2]],
                        ],
                        'colors' => ['#10b981', '#ef4444'], // Verde e Vermelho
                    ];

                    // Gráfico 2: Demandas por Secretaria (Pizza)
                    $chartDemandas = [
                        'categories' => ['Saúde', 'Educação', 'Obras', 'Social', 'ADM'],
                        'series' => [['name' => 'Chamados', 'data' => [450, 320, 210, 150, 80]]],
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
