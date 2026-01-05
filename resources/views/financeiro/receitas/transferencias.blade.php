<x-layouts.report title="Relatório de Transferências Constitucionais e Voluntárias">
    @php
        $transferenciasConfig = [
            'id' => 'receitas-transferencias-table',
            'columns' => [
                ['key' => 'data', 'label' => 'Data Repasse', 'align' => 'center'],
                ['key' => 'esfera', 'label' => 'Esfera', 'align' => 'center'], // União ou Estado
                ['key' => 'especie', 'label' => 'Espécie/Rubrica'], // Ex: FPM, ICMS, SUS
                ['key' => 'valor_bruto', 'label' => 'Valor Bruto', 'align' => 'right'],
                ['key' => 'deducao', 'label' => 'Dedução (Fundeb/Pasep)', 'align' => 'right'],
                ['key' => 'valor_liquido', 'label' => 'Valor Líquido', 'align' => 'right'],
                ['key' => 'banco', 'label' => 'Conta Destino', 'align' => 'center'],
            ],
            'rows' => [
                [
                    'data' => '10/01/2025',
                    'esfera' => 'União',
                    'especie' => 'FPM - 1º Decêndio',
                    'valor_bruto' => 'R$ 1.500.000,00',
                    'deducao' => 'R$ 300.000,00',
                    'valor_liquido' => 'R$ 1.200.000,00',
                    'banco' => 'BB - 5500-2'
                ],
                [
                    'data' => '12/01/2025',
                    'esfera' => 'Estado',
                    'especie' => 'ICMS - Cota Parte',
                    'valor_bruto' => 'R$ 800.000,00',
                    'deducao' => 'R$ 160.000,00',
                    'valor_liquido' => 'R$ 640.000,00',
                    'banco' => 'BB - 5500-2'
                ],
                [
                    'data' => '15/01/2025',
                    'esfera' => 'União',
                    'especie' => 'Transf. SUS - Bloco Atenção Básica',
                    'valor_bruto' => 'R$ 250.000,00',
                    'deducao' => 'R$ 0,00',
                    'valor_liquido' => 'R$ 250.000,00',
                    'banco' => 'CEF - 7788-9'
                ],
            ],
        ];
    @endphp

    <x-export-table :config="$transferenciasConfig" />
</x-layouts.report>