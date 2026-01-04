<x-layouts.report :title="'Vigilância - Indicadores Epidemiológicos'">
    @php
        $indicadoresConfig = [
            'id' => 'vigilancia-indicadores-table',
            'columns' => [
                ['key' => 'indicator', 'label' => 'Indicador', 'align' => 'left'],
                ['key' => 'period', 'label' => 'Período', 'align' => 'center'],
                ['key' => 'value_current', 'label' => 'Valor Atual', 'align' => 'center'],
                ['key' => 'goal', 'label' => 'Meta', 'align' => 'center'],
                ['key' => 'trend', 'label' => 'Tendência', 'align' => 'center'],
                ['key' => 'status', 'label' => 'Status', 'align' => 'center'],
            ],
            'rows' => [
                [
                    'indicator' => 'Taxa de Mortalidade Infantil',
                    'period' => '2025',
                    'value_current' => '10.5 / 1000',
                    'goal' => '< 10',
                    'trend' => 'Estável',
                    'status' => 'Atenção',
                ],
                [
                    'indicator' => 'Proporção de Cura (Tuberculose)',
                    'period' => '2025',
                    'value_current' => '82%',
                    'goal' => '> 85%',
                    'trend' => 'Crescente',
                    'status' => 'Regular',
                ],
                [
                    'indicator' => 'Incidência de Dengue (x100k hab)',
                    'period' => 'Dez/25',
                    'value_current' => '150.2',
                    'goal' => '< 100',
                    'trend' => 'Alta Sazonal',
                    'status' => 'Crítico',
                ],
                [
                    'indicator' => 'Mortalidade Prematura (DCNT)',
                    'period' => '2025',
                    'value_current' => '12%',
                    'goal' => '< 15%',
                    'trend' => 'Decrescente',
                    'status' => 'Bom',
                ],
            ],
        ];
    @endphp

    <x-export-table :config="$indicadoresConfig" />
</x-layouts.report>