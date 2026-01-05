<x-layouts.report title="Compliance: Despesa com Pessoal (LRF)">
    @php
        $config = [
            'id' => 'compliance-pessoal-table',
            'columns' => [
                ['key' => 'periodo', 'label' => 'Período de Apuração', 'align' => 'center'],
                ['key' => 'rcl', 'label' => 'RCL (12 Meses)', 'align' => 'right'],
                ['key' => 'dtp', 'label' => 'Despesa Total Pessoal', 'align' => 'right'],
                ['key' => 'percentual', 'label' => '% Apurado', 'align' => 'center'],
                ['key' => 'limite_alerta', 'label' => 'Lim. Alerta (48,6%)', 'align' => 'center'],
                ['key' => 'limite_prudencial', 'label' => 'Lim. Prudencial (51,3%)', 'align' => 'center'],
                ['key' => 'limite_maximo', 'label' => 'Lim. Máximo (54%)', 'align' => 'center'],
            ],
            'rows' => [
                ['periodo' => '1º Quadrimestre/2025', 'rcl' => 'R$ 100.000.000', 'dtp' => 'R$ 45.000.000', 'percentual' => '45.00%', 'limite_alerta' => 'OK', 'limite_prudencial' => 'OK', 'limite_maximo' => 'OK'],
                ['periodo' => '2º Quadrimestre/2025', 'rcl' => 'R$ 105.000.000', 'dtp' => 'R$ 52.000.000', 'percentual' => '49.52%', 'limite_alerta' => 'ULTRAPASSADO', 'limite_prudencial' => 'OK', 'limite_maximo' => 'OK'],
            ],
        ];
    @endphp
    <x-export-table :config="$config" />
</x-layouts.report>