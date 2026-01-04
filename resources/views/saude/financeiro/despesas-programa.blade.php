<x-layouts.report :title="'Financeiro - Despesas por Programa'">
    @php
        $despesasConfig = [
            'id' => 'financeiro-despesas-table',
            'columns' => [
                ['key' => 'program', 'label' => 'Programa / Bloco', 'align' => 'left'],
                ['key' => 'budget_loas', 'label' => 'Dotação Inicial (LOA)', 'type' => 'currency'],
                ['key' => 'committed', 'label' => 'Empenhado', 'type' => 'currency'],
                ['key' => 'liquidated', 'label' => 'Liquidado', 'type' => 'currency'],
                ['key' => 'paid', 'label' => 'Pago', 'type' => 'currency'],
                ['key' => 'execution_perc', 'label' => '% Execução', 'align' => 'center'],
            ],
            'rows' => [
                [
                    'program' => 'Atenção Primária à Saúde (PAB)',
                    'budget_loas' => 12000000.00,
                    'committed' => 8500000.00,
                    'liquidated' => 8200000.00,
                    'paid' => 8000000.00,
                    'execution_perc' => '66.6%',
                ],
                [
                    'program' => 'Média e Alta Complexidade (MAC)',
                    'budget_loas' => 25000000.00,
                    'committed' => 18000000.00,
                    'liquidated' => 17500000.00,
                    'paid' => 16000000.00,
                    'execution_perc' => '64.0%',
                ],
                [
                    'program' => 'Vigilância em Saúde',
                    'budget_loas' => 3000000.00,
                    'committed' => 1500000.00,
                    'liquidated' => 1200000.00,
                    'paid' => 1100000.00,
                    'execution_perc' => '36.6%',
                ],
            ],
        ];
    @endphp

    <x-export-table :config="$despesasConfig" />
</x-layouts.report>