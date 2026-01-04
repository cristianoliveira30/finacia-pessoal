<x-layouts.report :title="'Financeiro - Contratos e Fornecedores'">
    @php
        $contratosConfig = [
            'id' => 'financeiro-contratos-table',
            'columns' => [
                ['key' => 'contract_number', 'label' => 'Nº Contrato', 'align' => 'center'],
                ['key' => 'supplier', 'label' => 'Fornecedor', 'align' => 'left'],
                ['key' => 'object', 'label' => 'Objeto', 'align' => 'left'],
                ['key' => 'validity', 'label' => 'Vigência', 'align' => 'center'],
                ['key' => 'value_total', 'label' => 'Valor Total', 'type' => 'currency'],
                ['key' => 'status', 'label' => 'Status', 'align' => 'center'],
            ],
            'rows' => [
                [
                    'contract_number' => '102/2025',
                    'supplier' => 'Distribuidora Nacional de Medicamentos Ltda',
                    'object' => 'Fornecimento de medicamentos éticos',
                    'validity' => '31/12/2026',
                    'value_total' => 4500000.00,
                    'status' => 'Ativo',
                ],
                [
                    'contract_number' => '055/2024',
                    'supplier' => 'Limpeza Total Serviços Gerais',
                    'object' => 'Higienização hospitalar',
                    'validity' => '15/06/2026',
                    'value_total' => 1200000.00,
                    'status' => 'Ativo',
                ],
                [
                    'contract_number' => '010/2023',
                    'supplier' => 'TechSaúde Sistemas',
                    'object' => 'Prontuário Eletrônico',
                    'validity' => '01/02/2026',
                    'value_total' => 350000.00,
                    'status' => 'Vencendo em breve',
                ],
            ],
        ];
    @endphp

    <x-export-table :config="$contratosConfig" />
</x-layouts.report>