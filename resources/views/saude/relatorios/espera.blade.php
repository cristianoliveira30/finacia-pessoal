<x-layouts.report>
    @php
        $tableConfig = [
            'id' => 'table-espera',
            'columns' => [
                ['key' => 'unit_name', 'label' => 'Unidade', 'align' => 'left'],
                ['key' => 'risk_level', 'label' => 'Classificação de Risco', 'align' => 'center'],
                ['key' => 'patients_waiting', 'label' => 'Pessoas na Fila', 'align' => 'center'],
                ['key' => 'avg_wait_time', 'label' => 'Tempo Médio (min)', 'align' => 'center'],
                ['key' => 'max_wait_time', 'label' => 'Tempo Máximo (min)', 'align' => 'center'],
                ['key' => 'status', 'label' => 'Status'],
            ],
            'rows' => [
                ['unit_name' => 'UPA 24h', 'risk_level' => 'Vermelho (Emergência)', 'patients_waiting' => 0, 'avg_wait_time' => '0', 'max_wait_time' => '0', 'status' => 'Imediato'],
                ['unit_name' => 'UPA 24h', 'risk_level' => 'Verde (Pouco Urgente)', 'patients_waiting' => 15, 'avg_wait_time' => '45', 'max_wait_time' => '90', 'status' => 'Atenção'],
                ['unit_name' => 'Hosp. Municipal', 'risk_level' => 'Amarelo (Urgente)', 'patients_waiting' => 4, 'avg_wait_time' => '20', 'max_wait_time' => '35', 'status' => 'Normal'],
            ]
        ];
    @endphp
    <x-export-table :config="$tableConfig" />
</x-layouts.report>