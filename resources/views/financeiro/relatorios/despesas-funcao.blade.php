<x-layouts.report>
    @php
        $tableConfig = [
            'id' => 'expenses-function-table',
            'columns' => [
                ['key' => 'function_code', 'label' => 'Cód.', 'align' => 'center'],
                ['key' => 'description', 'label' => 'Função/Subfunção'],
                ['key' => 'budget_initial', 'label' => 'Dotação Inicial', 'type' => 'currency'],
                ['key' => 'committed', 'label' => 'Empenhado', 'type' => 'currency'],
                ['key' => 'liquidated', 'label' => 'Liquidado', 'type' => 'currency'],
                ['key' => 'paid', 'label' => 'Pago', 'type' => 'currency'],
                ['key' => 'balance', 'label' => 'Saldo a Empenhar', 'type' => 'currency'],
            ],
            'rows' => [
                [
                    'function_code' => '12',
                    'description' => 'Educação / Ensino Fundamental',
                    'budget_initial' => 5000000.00,
                    'committed' => 4200000.00,
                    'liquidated' => 3800000.00,
                    'paid' => 3800000.00,
                    'balance' => 800000.00,
                ],
                [
                    'function_code' => '10',
                    'description' => 'Saúde / Atenção Básica',
                    'budget_initial' => 3500000.00,
                    'committed' => 2900000.00,
                    'liquidated' => 2500000.00,
                    'paid' => 2450000.00,
                    'balance' => 600000.00,
                ],
                [
                    'function_code' => '15',
                    'description' => 'Urbanismo / Infraestrutura Urbana',
                    'budget_initial' => 2000000.00,
                    'committed' => 1800000.00,
                    'liquidated' => 1000000.00,
                    'paid' => 950000.00,
                    'balance' => 200000.00,
                ],
                [
                    'function_code' => '04',
                    'description' => 'Administração / Geral',
                    'budget_initial' => 1200000.00,
                    'committed' => 1100000.00,
                    'liquidated' => 1100000.00,
                    'paid' => 1100000.00,
                    'balance' => 100000.00,
                ],
            ],
        ];
    @endphp

    <x-export-table :config="$tableConfig" />
</x-layouts.report>