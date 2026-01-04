<x-layouts.report :title="$tableConfig['title'] ?? 'empenhos'">
    @php
        $tableConfig = [
            'id' => 'commitments-table',
            'columns' => [
                ['key' => 'commitment_number', 'label' => 'Nº Empenho'],
                ['key' => 'issue_date', 'label' => 'Data Emissão', 'type' => 'date', 'date_format' => 'DD/MM/YYYY'],
                ['key' => 'creditor', 'label' => 'Credor/Fornecedor'],
                ['key' => 'history', 'label' => 'Histórico/Objeto'],
                ['key' => 'source', 'label' => 'Fonte Recurso'],
                ['key' => 'value', 'label' => 'Valor Original', 'type' => 'currency'],
                ['key' => 'current_stage', 'label' => 'Fase Atual'],
            ],
            'rows' => [
                [
                    'commitment_number' => '00152/2024',
                    'issue_date' => '02/01/2024',
                    'creditor' => 'COMERCIAL DE PAPEIS LTDA',
                    'history' => 'Aquisição de material de expediente para a secretaria.',
                    'source' => 'Recursos Próprios',
                    'value' => 1500.00,
                    'current_stage' => 'Pago',
                ],
                [
                    'commitment_number' => '00230/2024',
                    'issue_date' => '15/02/2024',
                    'creditor' => 'CONSTRUTORA ALFA S.A.',
                    'history' => '1ª Medição da reforma da Praça Central.',
                    'source' => 'Convênio Federal',
                    'value' => 85000.00,
                    'current_stage' => 'Liquidado',
                ],
                [
                    'commitment_number' => '00310/2024',
                    'issue_date' => '10/03/2024',
                    'creditor' => 'AUTO POSTO CIDADE',
                    'history' => 'Fornecimento de combustível para frota da saúde.',
                    'source' => 'Recursos da Saúde',
                    'value' => 4200.50,
                    'current_stage' => 'Em Liquidação',
                ],
                [
                    'commitment_number' => '00405/2024',
                    'issue_date' => '22/04/2024',
                    'creditor' => 'TECH SOLUÇÕES EM TI',
                    'history' => 'Licença de software de gestão tributária.',
                    'source' => 'Recursos Próprios',
                    'value' => 12000.00,
                    'current_stage' => 'Empenhado',
                ],
            ],
        ];
    @endphp

    <x-export-table :config="$tableConfig" />
</x-layouts.report>