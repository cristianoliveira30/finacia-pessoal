<x-layouts.report title="Compliance: Dívida Consolidada Líquida (DCL)">
    @php
        $config = [
            'id' => 'compliance-divida-table',
            'columns' => [
                ['key' => 'exercicio', 'label' => 'Exercício', 'align' => 'center'],
                ['key' => 'rcl', 'label' => 'RCL', 'align' => 'right'],
                ['key' => 'dc', 'label' => 'Dívida Consolidada (DC)', 'align' => 'right'],
                ['key' => 'deducoes', 'label' => 'Deduções/Ativos', 'align' => 'right'],
                ['key' => 'dcl', 'label' => 'DCL (DC - Deduções)', 'align' => 'right'],
                ['key' => 'percentual', 'label' => '% DCL sobre RCL', 'align' => 'center'],
                ['key' => 'limite', 'label' => 'Limite Senado (120%)', 'align' => 'center'],
            ],
            'rows' => [
                ['exercicio' => '2024', 'rcl' => 'R$ 100.000.000', 'dc' => 'R$ 30.000.000', 'deducoes' => 'R$ 5.000.000', 'dcl' => 'R$ 25.000.000', 'percentual' => '25.0%', 'limite' => 'OK'],
            ],
        ];
    @endphp
    <x-export-table :config="$config" />
</x-layouts.report>