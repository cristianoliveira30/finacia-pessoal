<x-layouts.report>
    @php
        $tableConfig = [
            'id' => 'table-transporte',
            'columns' => [
                ['key' => 'route_code', 'label' => 'Rota', 'align' => 'center'],
                ['key' => 'vehicle_plate', 'label' => 'Placa / Veículo'],
                ['key' => 'driver', 'label' => 'Motorista'],
                ['key' => 'students_transported', 'label' => 'Alunos', 'align' => 'center'],
                ['key' => 'km_daily', 'label' => 'KM Diário', 'align' => 'center'],
                ['key' => 'monthly_cost', 'label' => 'Custo Mensal', 'type' => 'currency'],
            ],
            'rows' => [
                ['route_code' => 'R-01', 'vehicle_plate' => 'ABC-1234 (Ônibus)', 'driver' => 'Carlos Lima', 'students_transported' => 45, 'km_daily' => 120, 'monthly_cost' => 8500.00],
                ['route_code' => 'R-02', 'vehicle_plate' => 'XYZ-9876 (Van)', 'driver' => 'Roberto Alves', 'students_transported' => 15, 'km_daily' => 80, 'monthly_cost' => 4200.00],
                ['route_code' => 'R-05', 'vehicle_plate' => 'Proprio (Amarelinho)', 'driver' => 'Servidor Municipal', 'students_transported' => 30, 'km_daily' => 50, 'monthly_cost' => 1800.00],
            ]
        ];
    @endphp
    <x-export-table :config="$tableConfig" />
</x-layouts.report>