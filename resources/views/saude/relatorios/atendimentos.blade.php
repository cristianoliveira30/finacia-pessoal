<x-layouts.report>
    @php
        $tableConfig = [
            'id' => 'table-atendimentos',
            'columns' => [
                ['key' => 'date', 'label' => 'Data', 'align' => 'center'],
                ['key' => 'unit_name', 'label' => 'Unidade de Saúde'],
                ['key' => 'type', 'label' => 'Tipo de Atendimento'],
                ['key' => 'specialty', 'label' => 'Especialidade'],
                ['key' => 'total', 'label' => 'Qtd. Atendimentos', 'align' => 'center'],
            ],
            'rows' => [
                ['date' => '24/12/2025', 'unit_name' => 'UBS Centro', 'type' => 'Consulta Agendada', 'specialty' => 'Clínica Médica', 'total' => 45],
                ['date' => '24/12/2025', 'unit_name' => 'UPA 24h', 'type' => 'Urgência/Emergência', 'specialty' => 'Traumatologia', 'total' => 112],
                ['date' => '24/12/2025', 'unit_name' => 'ESF Vila Nova', 'type' => 'Visita Domiciliar', 'specialty' => 'Enfermagem', 'total' => 18],
            ]
        ];
    @endphp
    <x-export-table :config="$tableConfig" />
</x-layouts.report>