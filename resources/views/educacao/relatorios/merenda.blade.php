<x-layouts.report :title="$tableConfig['title'] ?? 'relatório de merenda escolar'">
    @php
        $tableConfig = [
            'id' => 'relatorio-merenda',
            'columns' => [
                ['key' => 'date', 'label' => 'Data', 'align' => 'center'],
                ['key' => 'school_name', 'label' => 'Unidade Escolar'],
                ['key' => 'meal_type', 'label' => 'Tipo de Refeição'],
                ['key' => 'students_served', 'label' => 'Alunos Servidos', 'align' => 'center'],
                ['key' => 'cost_per_plate', 'label' => 'Custo Prato', 'type' => 'currency'],
                ['key' => 'total_cost', 'label' => 'Custo Total Diário', 'type' => 'currency'],
            ],
            'rows' => [
                [
                    'date' => '24/12/2025',
                    'school_name' => 'E.M. Monteiro Lobato',
                    'meal_type' => 'Almoço',
                    'students_served' => 310,
                    'cost_per_plate' => 4.50,
                    'total_cost' => 1395.00,
                ],
                // ... mais linhas
            ]
        ];
    @endphp
    
    <x-export-table :config="$tableConfig" />
</x-layouts.report>