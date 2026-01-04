<x-layouts.report :title="'Financeiro - Mínimo Constitucional (15%)'">
    @php
        $minimoConfig = [
            'id' => 'financeiro-minimo-table',
            'columns' => [
                ['key' => 'period', 'label' => 'Período Apuração', 'align' => 'center'],
                ['key' => 'revenue_base', 'label' => 'Receita Base de Cálculo', 'type' => 'currency'],
                ['key' => 'applied_value', 'label' => 'Valor Aplicado (ASPS)', 'type' => 'currency'],
                ['key' => 'percentage', 'label' => '% Aplicado', 'align' => 'center'],
                ['key' => 'status', 'label' => 'Status Legal', 'align' => 'center'],
            ],
            'rows' => [
                [
                    'period' => '1º Quadrimestre 2025',
                    'revenue_base' => 150000000.00,
                    'applied_value' => 24500000.00,
                    'percentage' => '16.33%',
                    'status' => 'Regular',
                ],
                [
                    'period' => '2º Quadrimestre 2025',
                    'revenue_base' => 160000000.00,
                    'applied_value' => 23000000.00,
                    'percentage' => '14.37%',
                    'status' => 'Abaixo da Meta (Alerta)',
                ],
                [
                    'period' => '3º Quadrimestre 2025',
                    'revenue_base' => 155000000.00,
                    'applied_value' => 27000000.00,
                    'percentage' => '17.41%',
                    'status' => 'Regular (Compensado)',
                ],
            ],
        ];
    @endphp

    <x-export-table :config="$minimoConfig" />
</x-layouts.report>