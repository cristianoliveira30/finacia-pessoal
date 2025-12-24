<x-layouts.report>
    @php
        $tableConfig = [
            'id' => 'suppliers-table',
            'columns' => [
                ['key' => 'doc', 'label' => 'CNPJ/CPF'],
                ['key' => 'name', 'label' => 'Razão Social'],
                ['key' => 'contracts_count', 'label' => 'Qtd. Empenhos', 'align' => 'center'],
                ['key' => 'total_committed', 'label' => 'Total Empenhado', 'type' => 'currency'],
                ['key' => 'total_paid', 'label' => 'Total Pago', 'type' => 'currency'],
                ['key' => 'debt', 'label' => 'Restos a Pagar', 'type' => 'currency'],
            ],
            'rows' => [
                [
                    'doc' => '12.345.678/0001-90',
                    'name' => 'CONSTRUTORA ALFA S.A.',
                    'contracts_count' => 3,
                    'total_committed' => 450000.00,
                    'total_paid' => 150000.00,
                    'debt' => 300000.00,
                ],
                [
                    'doc' => '98.765.432/0001-10',
                    'name' => 'MEDICAMENTOS E SAUDE DIST.',
                    'contracts_count' => 12,
                    'total_committed' => 120000.00,
                    'total_paid' => 118000.00,
                    'debt' => 2000.00,
                ],
                [
                    'doc' => '45.123.789/0001-55',
                    'name' => 'TRANSPORTE ESCOLAR SEGURO',
                    'contracts_count' => 5,
                    'total_committed' => 80000.00,
                    'total_paid' => 80000.00,
                    'debt' => 0.00,
                ],
                [
                    'doc' => '11.222.333/0001-44',
                    'name' => 'LIMPEZA URBANA EIRELI',
                    'contracts_count' => 1,
                    'total_committed' => 25000.00,
                    'total_paid' => 0.00,
                    'debt' => 25000.00,
                ],
            ],
        ];
    @endphp

    <x-export-table :config="$tableConfig" />
</x-layouts.report>