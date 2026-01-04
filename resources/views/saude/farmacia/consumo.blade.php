<x-layouts.report :title="'Farmácia - Consumo (Curva ABC)'">
    @php
        $consumoConfig = [
            'id' => 'farmacia-consumo-table',
            'columns' => [
                ['key' => 'item', 'label' => 'Item', 'align' => 'left'],
                ['key' => 'classification', 'label' => 'Curva ABC', 'align' => 'center'],
                ['key' => 'monthly_qty', 'label' => 'Qtd. Mensal', 'align' => 'center'],
                ['key' => 'unit_cost', 'label' => 'Custo Unit.', 'type' => 'currency'],
                ['key' => 'total_cost', 'label' => 'Custo Total', 'type' => 'currency'],
                ['key' => 'impact', 'label' => 'Impacto %', 'align' => 'center'],
            ],
            'rows' => [
                [
                    'item' => 'Insulina Glargina 100UI/ml',
                    'classification' => 'A',
                    'monthly_qty' => 1500,
                    'unit_cost' => 85.00,
                    'total_cost' => 127500.00,
                    'impact' => '18%',
                ],
                [
                    'item' => 'Enoxaparina Sódica 40mg',
                    'classification' => 'A',
                    'monthly_qty' => 2000,
                    'unit_cost' => 32.50,
                    'total_cost' => 65000.00,
                    'impact' => '9%',
                ],
                [
                    'item' => 'Paracetamol 500mg (Comprimido)',
                    'classification' => 'C',
                    'monthly_qty' => 50000,
                    'unit_cost' => 0.05,
                    'total_cost' => 2500.00,
                    'impact' => '0.3%',
                ],
            ],
        ];
    @endphp

    <x-export-table :config="$consumoConfig" />
</x-layouts.report>