<x-layouts.report>
    @php
        $tableConfig = [
            'id' => 'table-indicadores-sus',
            'columns' => [
                ['key' => 'indicator_id', 'label' => 'Item', 'align' => 'center'],
                ['key' => 'description', 'label' => 'Indicador (Previne Brasil)'],
                ['key' => 'target', 'label' => 'Meta MS', 'align' => 'center'],
                ['key' => 'current_result', 'label' => 'Resultado Atual', 'align' => 'center'],
                ['key' => 'weight', 'label' => 'Peso', 'align' => 'center'],
                ['key' => 'status', 'label' => 'Status'],
            ],
            'rows' => [
                ['indicator_id' => '1', 'description' => 'Prop. de gestantes com pelo menos 6 consultas de pré-natal', 'target' => '45%', 'current_result' => '52%', 'weight' => '10', 'status' => 'Atingida'],
                ['indicator_id' => '2', 'description' => 'Prop. de gestantes com exames para sífilis e HIV realizados', 'target' => '60%', 'current_result' => '58%', 'weight' => '10', 'status' => 'Quase Lá'],
                ['indicator_id' => '6', 'description' => 'Prop. de pessoas com hipertensão com consulta e PA aferida', 'target' => '50%', 'current_result' => '35%', 'weight' => '10', 'status' => 'Crítico'],
            ]
        ];
    @endphp
    <x-export-table :config="$tableConfig" />
</x-layouts.report>