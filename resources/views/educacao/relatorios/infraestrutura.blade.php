<x-layouts.report>
    @php
        $tableConfig = [
            'id' => 'table-infra',
            'columns' => [
                ['key' => 'school_code', 'label' => 'Cód. Patrimônio', 'align' => 'center'],
                ['key' => 'school_name', 'label' => 'Unidade Escolar'],
                ['key' => 'condition', 'label' => 'Estado de Conservação'],
                ['key' => 'last_maintenance', 'label' => 'Última Manutenção', 'align' => 'center'],
                ['key' => 'maintenance_cost', 'label' => 'Custo Anual', 'type' => 'currency'],
                ['key' => 'capacity', 'label' => 'Capacidade (Alunos)', 'align' => 'center'],
            ],
            'rows' => [
                ['school_code' => 'PRED-01', 'school_name' => 'E.M. Monteiro Lobato', 'condition' => 'Bom', 'last_maintenance' => '10/01/2024', 'maintenance_cost' => 15000.00, 'capacity' => 500],
                ['school_code' => 'PRED-05', 'school_name' => 'Quadra Poliesportiva Central', 'condition' => 'Precisa de Reparos', 'last_maintenance' => '15/05/2022', 'maintenance_cost' => 0.00, 'capacity' => 0],
                ['school_code' => 'PRED-08', 'school_name' => 'C.M.EI. Pingo de Gente', 'condition' => 'Ótimo', 'last_maintenance' => '20/08/2024', 'maintenance_cost' => 5400.00, 'capacity' => 120],
            ]
        ];
    @endphp
    <x-export-table :config="$tableConfig" />
</x-layouts.report>