<x-layouts.report>
    @php
        $tableConfig = [
            'id' => 'table-prod-unidade',
            'columns' => [
                ['key' => 'cnes', 'label' => 'CNES', 'align' => 'center'],
                ['key' => 'unit_name', 'label' => 'Unidade de Saúde'],
                ['key' => 'medical_consultations', 'label' => 'Consultas Médicas', 'align' => 'center'],
                ['key' => 'nursing_procedures', 'label' => 'Proced. Enfermagem', 'align' => 'center'],
                ['key' => 'dental_care', 'label' => 'Atend. Odonto', 'align' => 'center'],
                ['key' => 'total_procedures', 'label' => 'Total Geral', 'align' => 'center'],
            ],
            'rows' => [
                ['cnes' => '1234567', 'unit_name' => 'UBS Jardim das Flores', 'medical_consultations' => 520, 'nursing_procedures' => 1200, 'dental_care' => 150, 'total_procedures' => 1870],
                ['cnes' => '7654321', 'unit_name' => 'ESF Rural', 'medical_consultations' => 180, 'nursing_procedures' => 400, 'dental_care' => 0, 'total_procedures' => 580],
                ['cnes' => '9988776', 'unit_name' => 'Centro de Especialidades', 'medical_consultations' => 850, 'nursing_procedures' => 200, 'dental_care' => 300, 'total_procedures' => 1350],
            ]
        ];
    @endphp
    <x-export-table :config="$tableConfig" />
</x-layouts.report>