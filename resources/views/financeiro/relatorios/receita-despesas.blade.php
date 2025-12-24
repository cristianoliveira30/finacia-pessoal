<x-layouts.report>
    @php
        $financialReportConfig = [
            'id' => 'revenue-expenses-comparison',
            
            // Definição das Colunas
            'columns' => [
                [
                    'key' => 'period',
                    'label' => 'Competência',
                    'class' => 'font-bold text-gray-700', // Exemplo de estilização extra se seu componente suportar
                ],
                [
                    'key' => 'revenue_forecast',
                    'label' => 'Receita Prevista',
                    'type' => 'currency',
                ],
                [
                    'key' => 'revenue_collected',
                    'label' => 'Receita Arrecadada',
                    'type' => 'currency',
                    'color' => 'text-green-600', // Sugestão visual
                ],
                [
                    'key' => 'expense_fixed',
                    'label' => 'Despesa Fixada',
                    'type' => 'currency',
                ],
                [
                    'key' => 'expense_liquidated',
                    'label' => 'Despesa Liquidada', // "Liquidado" é o fato gerador mais comum para comparação financeira pública
                    'type' => 'currency',
                    'color' => 'text-red-600',
                ],
                [
                    'key' => 'balance',
                    'label' => 'Superávit/Déficit',
                    'type' => 'currency', // O componente idealmente deve tratar negativos com cor vermelha
                ],
                [
                    'key' => 'performance',
                    'label' => 'Perf. Arrecadação',
                    'type' => 'percentage', // % do que foi arrecadado vs previsto
                ],
            ],

            // Dados Mockados (Cenário de Prefeitura/Órgão Público)
            'rows' => [
                [
                    'period' => '01/2024',
                    'revenue_forecast' => 15000000.00,
                    'revenue_collected' => 18500000.00, // Janeiro geralmente tem alta arrecadação (IPTU/IPVA)
                    'expense_fixed' => 12000000.00,
                    'expense_liquidated' => 9500000.00,
                    'balance' => 9000000.00, // Arrecadado - Liquidado
                    'performance' => '123%',
                ],
                [
                    'period' => '02/2024',
                    'revenue_forecast' => 14000000.00,
                    'revenue_collected' => 13200000.00,
                    'expense_fixed' => 12000000.00,
                    'expense_liquidated' => 11000000.00,
                    'balance' => 2200000.00,
                    'performance' => '94%',
                ],
                [
                    'period' => '03/2024',
                    'revenue_forecast' => 13500000.00,
                    'revenue_collected' => 13500000.00,
                    'expense_fixed' => 12500000.00,
                    'expense_liquidated' => 12100000.00,
                    'balance' => 1400000.00,
                    'performance' => '100%',
                ],
                [
                    'period' => '04/2024',
                    'revenue_forecast' => 13500000.00,
                    'revenue_collected' => 12800000.00, // Queda na arrecadação
                    'expense_fixed' => 13000000.00,
                    'expense_liquidated' => 13200000.00, // Déficit financeiro no mês
                    'balance' => -400000.00, 
                    'performance' => '94%',
                ],
                [
                    'period' => '05/2024',
                    'revenue_forecast' => 14000000.00,
                    'revenue_collected' => 14500000.00,
                    'expense_fixed' => 13000000.00,
                    'expense_liquidated' => 12500000.00,
                    'balance' => 2000000.00,
                    'performance' => '103%',
                ],
                [
                    'period' => '06/2024',
                    'revenue_forecast' => 14500000.00,
                    'revenue_collected' => 15000000.00,
                    'expense_fixed' => 14000000.00,
                    'expense_liquidated' => 16000000.00, // Alto custo (ex: adiantamento 13º)
                    'balance' => -1000000.00,
                    'performance' => '103%',
                ],
            ],
        ];
    @endphp

    <x-export-table :config="$financialReportConfig" />
</x-layouts.report>