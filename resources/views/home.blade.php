<x-layouts.app :title="__('Painel do Prefeito')">

    <div class="w-full min-h-screen pt-2 px-4 sm:px-4 lg:pl-16 space-y-4" data-page-ai>

        @php
            // Dados Mockados Ajustados (Compatíveis com a imagem)
            $dtpValor = 52.1;
            $resultadoFinanceiro = 24.9;
            $indiceControleInterno = 94;
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
                'overlays' => [
                    'movingAverage' => [
                        'enabled' => true,
                        'period' => 1,
                        'seriesIndex' => 1, // 0=Previsto, 1=Realizado
                        'name' => 'Média móvel',
                    ],
                    'trendline' => [
                        'enabled' => true,
                        'seriesIndex' => 1,
                        'name' => 'Tendência',
                    ],
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
            {{-- 1) KPIs Macro --}}
            <div class="grid grid-cols-1 md:grid-cols-4 gap-2 m-3 ">

                <div class="md:col-span-1" id="wrapper-card-gestao">
                    <x-cards.box.mainbox id="gestao" :value="$dtpValor" />
                </div>

                <div class="md:col-span-1" id="wrapper-card-financas">
                    <x-cards.box.mainbox id="financas" :value="$resultadoFinanceiro" />
                </div>

                <div class="md:col-span-1" id="wrapper-card-pendencias">
                    <x-cards.box.mainbox id="pendencias" :value="$indiceControleInterno" />
                </div>

                {{-- NPS agora irá renderizar corretamente --}}
                <div class="md:col-span-1" id="wrapper-card-nps">
                    <x-cards.box.mainbox id="nps" :value="$nps" />
                </div>
            </div>

            {{-- 2) KPIs por Setor --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-3 m-3 ">
                <x-cards.box.minibox id="fin_exec" />
                <x-cards.box.minibox id="fin_arr" />
                <x-cards.box.minibox id="saude_esp" />
                <x-cards.box.minibox id="saude_med" />
                <x-cards.box.minibox id="edu_freq" />
                {{-- Edu Vagas agora irá renderizar (Fila Creche) --}}
                <x-cards.box.minibox id="edu_vagas" />
            </div>

            {{-- 3) Gráficos Implementados --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 m-3">
                @php
                     // Gráfico 1: Evolução da Receita x Despesa (Área)
                     $chartGestaoFiscal = [
                        'categories' => ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun'],
                        'series' => [
                            ['name' => 'Receita', 'data' => [18.2, 19.5, 20.1, 21.0, 22.5, 22.8]],
                            ['name' => 'Despesa', 'data' => [14.0, 15.2, 16.5, 15.8, 14.9, 14.2]]
                        ],
                        'colors' => ['#10b981', '#ef4444'] // Verde e Vermelho
                     ];

                     // Gráfico 2: Demandas por Secretaria (Pizza)
                     $chartDemandas = [
                        'categories' => ['Saúde', 'Educação', 'Obras', 'Social', 'ADM'],
                        'series' => [
                            ['name' => 'Chamados', 'data' => [450, 320, 210, 150, 80]]
                        ]
                     ];

                     // Gráfico 3: Controle Interno - Prazos (Barra)
                     $chartPrazos = [
                        'categories' => ['Licitações', 'RH', 'Contratos', 'Fiscal'],
                        'series' => [
                            ['name' => 'No Prazo', 'data' => [95, 98, 92, 100]],
                            ['name' => 'Atraso', 'data' => [5, 2, 8, 0]]
                        ],
                        'colors' => ['#3b82f6', '#f59e0b']
                     ];

                     // Gráfico 4: Execução Orçamentária por Pasta (Coluna)
                     $chartOrcamento = [
                        'categories' => ['Saúde', 'Educação', 'Infra'],
                        'series' => [
                            ['name' => 'Empenhado', 'data' => [12.5, 10.2, 8.5]],
                            ['name' => 'Liquidado', 'data' => [10.1, 9.8, 4.2]]
                        ],
                        'overlays' => [
                            'movingAverage' => [
                                'enabled' => true,
                                'period' => 1,
                                'seriesIndex' => 1, // 0 = previsto, 1 = realizado
                                'name' => 'Média Móvel'
                            ],
                            'trendline' => [
                                'enabled' => true,
                                'seriesIndex' => 1,
                                'name' => 'Tendência'
                            ]
                        ]
                     ];

                     // Gráfico 5: Performance Setorial (Radar)
                     $chartPerformance = [
                        'categories' => ['Finanças', 'Saúde', 'Educação', 'Obras', 'Social'],
                        'series' => [
                            ['name' => 'Score Atual', 'data' => [82, 65, 78, 90, 88]]
                        ]
                     ];
                @endphp

                <x-cards.card id="central-indice" title="Evolução da Gestão Fiscal (R$ mi)" :chart="$chartGestaoFiscal" chart-type="area" />
                <x-cards.card id="central-demandas" title="Demandas por Secretaria" :chart="$chartDemandas" chart-type="pie" />
                <x-cards.card id="central-pendencias" title="Controle Interno (Conformidade %)" :chart="$chartPrazos" chart-type="bar" />
                <x-cards.card id="central-execucao" title="Execução Orçamentária (R$ mi)" :chart="$chartOrcamento" chart-type="column" />
                <x-cards.card id="central-scores" title="Performance Setorial (0-100)" :chart="$chartPerformance" chart-type="radial" />
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
