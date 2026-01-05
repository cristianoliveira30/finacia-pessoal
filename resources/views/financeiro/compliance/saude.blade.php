<x-layouts.report title="Compliance: Aplicação Constitucional em Saúde (ASPS)">
    @php
        $saudeConfig = [
            'id' => 'compliance-saude-table',
            'columns' => [
                ['key' => 'periodo', 'label' => 'Período/Bimestre', 'align' => 'center'],
                ['key' => 'base', 'label' => 'Base de Cálculo (Impostos)', 'align' => 'right'],
                ['key' => 'minimo', 'label' => 'Mínimo (15%)', 'align' => 'right'],
                ['key' => 'aplicado', 'label' => 'Valor Aplicado', 'align' => 'right'],
                ['key' => 'percentual', 'label' => '% Atingido', 'align' => 'center'],
                ['key' => 'status', 'label' => 'Status', 'align' => 'center'],
            ],
            'rows' => [
                ['periodo' => '1º Bimestre', 'base' => 'R$ 10.000.000,00', 'minimo' => 'R$ 1.500.000,00', 'aplicado' => 'R$ 1.600.000,00', 'percentual' => '16.0%', 'status' => 'OK'],
                ['periodo' => '2º Bimestre', 'base' => 'R$ 12.000.000,00', 'minimo' => 'R$ 1.800.000,00', 'aplicado' => 'R$ 1.750.000,00', 'percentual' => '14.5%', 'status' => 'Aleta'],
                ['periodo' => 'Acumulado', 'base' => 'R$ 22.000.000,00', 'minimo' => 'R$ 3.300.000,00', 'aplicado' => 'R$ 3.350.000,00', 'percentual' => '15.2%', 'status' => 'OK'],
            ],
        ];
    @endphp

    <x-export-table :config="$saudeConfig" />
</x-layouts.report>