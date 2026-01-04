<x-layouts.report :title="$tableConfig['title'] ?? 'Cobertura Vacinal'"></x-layouts.report
    @php
        $tableConfig = [
            'id' => 'table-cobertura-vacinal',
            'columns' => [
                ['key' => 'vaccine', 'label' => 'Imunobiológico (Vacina)'],
                ['key' => 'target_population', 'label' => 'Público Alvo (Estimado)', 'align' => 'center'],
                ['key' => 'doses_applied', 'label' => 'Doses Aplicadas', 'align' => 'center'],
                ['key' => 'coverage_pct', 'label' => 'Cobertura (%)', 'align' => 'center'], // Importante
                ['key' => 'goal_pct', 'label' => 'Meta do MS (%)', 'align' => 'center'],
                ['key' => 'status', 'label' => 'Situação'],
            ],
            'rows' => [
                [
                    'vaccine' => 'BCG (Tuberculose)',
                    'target_population' => '2.450',
                    'doses_applied' => '2.380',
                    'coverage_pct' => '97,1%',
                    'goal_pct' => '90%',
                    'status' => 'Atingida'
                ],
                [
                    'vaccine' => 'Rotavírus Humano',
                    'target_population' => '2.450',
                    'doses_applied' => '2.100',
                    'coverage_pct' => '85,7%',
                    'goal_pct' => '90%',
                    'status' => 'Atenção'
                ],
                [
                    'vaccine' => 'Poliomielite (VIP/VOP)',
                    'target_population' => '2.450',
                    'doses_applied' => '1.850',
                    'coverage_pct' => '75,5%',
                    'goal_pct' => '95%',
                    'status' => 'Crítico (Busca Ativa)'
                ],
                [
                    'vaccine' => 'Pneumocócica 10v',
                    'target_population' => '2.450',
                    'doses_applied' => '2.250',
                    'coverage_pct' => '91,8%',
                    'goal_pct' => '95%',
                    'status' => 'Próximo da Meta'
                ],
                [
                    'vaccine' => 'Meningocócica C',
                    'target_population' => '2.450',
                    'doses_applied' => '2.300',
                    'coverage_pct' => '93,8%',
                    'goal_pct' => '95%',
                    'status' => 'Próximo da Meta'
                ],
                [
                    'vaccine' => 'Pentavalente (DTP+HB+Hib)',
                    'target_population' => '2.450',
                    'doses_applied' => '2.050',
                    'coverage_pct' => '83,6%',
                    'goal_pct' => '95%',
                    'status' => 'Atenção'
                ],
                [
                    'vaccine' => 'Tríplice Viral (D1 - Sarampo)',
                    'target_population' => '2.450',
                    'doses_applied' => '1.980',
                    'coverage_pct' => '80,8%',
                    'goal_pct' => '95%',
                    'status' => 'Alerta'
                ],
                [
                    'vaccine' => 'Febre Amarela',
                    'target_population' => '2.450',
                    'doses_applied' => '1.700',
                    'coverage_pct' => '69,3%',
                    'goal_pct' => '100%',
                    'status' => 'Crítico'
                ],
            ]
        ];
    @endphp

    {{-- Renderização da tabela --}}
    <x-export-table :config="$tableConfig" />

</x-layouts.report>