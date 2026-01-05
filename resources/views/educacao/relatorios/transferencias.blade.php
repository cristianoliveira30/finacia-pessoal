<x-layouts.report title="Transferências Constitucionais">
    @php
        $config = [
            'id' => 'receitas-transferencias-table',
            'columns' => [
                ['key' => 'data', 'label' => 'Data Repasse', 'align' => 'center'],
                ['key' => 'origem', 'label' => 'Esfera (União/Estado)', 'align' => 'center'],
                ['key' => 'especie', 'label' => 'Espécie (FPM/ICMS/IPVA)'],
                ['key' => 'valor_bruto', 'label' => 'Valor Bruto', 'align' => 'right'],
                ['key' => 'deducao_fundeb', 'label' => 'Dedução Fundeb (20%)', 'align' => 'right'],
                ['key' => 'valor_liquido', 'label' => 'Valor Líquido', 'align' => 'right'],
            ],
            'rows' => [
                ['data' => '10/01/2025', 'origem' => 'União', 'especie' => 'FPM - 1º Decêndio', 'valor_bruto' => 'R$ 500.000', 'deducao_fundeb' => 'R$ 100.000', 'valor_liquido' => 'R$ 400.000'],
                ['data' => '15/01/2025', 'origem' => 'Estado', 'especie' => 'ICMS Semanal', 'valor_bruto' => 'R$ 200.000', 'deducao_fundeb' => 'R$ 40.000', 'valor_liquido' => 'R$ 160.000'],
            ],
        ];
    @endphp
    <x-export-table :config="$config" />
</x-layouts.report>