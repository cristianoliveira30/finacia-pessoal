<x-layouts.report>
    @php
        $tableConfig = [
            'id' => 'table-absenteismo',
            'columns' => [
                ['key' => 'specialty', 'label' => 'Especialidade'],
                ['key' => 'unit_name', 'label' => 'Local'],
                ['key' => 'scheduled', 'label' => 'Agendados', 'align' => 'center'],
                ['key' => 'attended', 'label' => 'Compareceram', 'align' => 'center'],
                ['key' => 'absent', 'label' => 'Faltas', 'align' => 'center'],
                ['key' => 'absent_rate', 'label' => 'Taxa de Absenteísmo', 'align' => 'center', 'style' => 'font-weight: bold;'],
            ],
            'rows' => [
                ['specialty' => 'Pediatria', 'unit_name' => 'Centro de Especialidades', 'scheduled' => 100, 'attended' => 90, 'absent' => 10, 'absent_rate' => '10%'],
                ['specialty' => 'Psicologia', 'unit_name' => 'CAPS II', 'scheduled' => 50, 'attended' => 35, 'absent' => 15, 'absent_rate' => '30%'],
                ['specialty' => 'Ultrassonografia', 'unit_name' => 'Policlínica', 'scheduled' => 40, 'attended' => 28, 'absent' => 12, 'absent_rate' => '30%'],
            ]
        ];
    @endphp
    <x-export-table :config="$tableConfig" />
</x-layouts.report>