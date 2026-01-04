<x-layouts.report :title="$tableConfig['title'] ?? 'CAPEX'">
    @php
        $tableConfig = [
            'id' => 'health-expenses-table',

            'columns' => [
                [
                    'key' => 'period',
                    'label' => 'Competência',
                ],
                [
                    'key' => 'description',
                    'label' => 'Objeto da Despesa',
                ],
                [
                    'key' => 'source', // Adicionei uma coluna extra comum em prefeituras
                    'label' => 'Fonte de Recurso',
                ],
                [
                    'key' => 'commitment_date',
                    'label' => 'Data',
                    'type' => 'date',
                    'date_format' => 'DD/MM/YYYY',
                ],
                [
                    'key' => 'value',
                    'label' => 'Valor Total (R$)',
                    'type' => 'currency', 
                ],
                [
                    'key' => 'status',
                    'label' => 'Status',
                ],
            ],

            'rows' => [
                [
                    'period' => '01/2024',
                    'description' => 'Aquisição de Insulina e Metformina',
                    'source' => 'SUS / Federal',
                    'commitment_date' => '10/01/2024',
                    'value' => 18500.00,
                    'status' => 'Liquidado',
                ],
                [
                    'period' => '02/2024',
                    'description' => 'Reforma do Telhado - UBS Centro',
                    'source' => 'Tesouro Municipal',
                    'commitment_date' => '05/02/2024',
                    'value' => 42000.50,
                    'status' => 'Em Execução',
                ],
                [
                    'period' => '02/2024',
                    'description' => 'Locação de Ambulância UTI Móvel',
                    'source' => 'Tesouro Municipal',
                    'commitment_date' => '20/02/2024',
                    'value' => 15000.00,
                    'status' => 'Pago',
                ],
                [
                    'period' => '03/2024',
                    'description' => 'Material Odontológico de Consumo',
                    'source' => 'Transferência Estado',
                    'commitment_date' => '12/03/2024',
                    'value' => 8450.00,
                    'status' => 'Empenhado',
                ],
                [
                    'period' => '04/2024',
                    'description' => 'Campanha de Vacinação (Marketing)',
                    'source' => 'Tesouro Municipal',
                    'commitment_date' => '02/04/2024',
                    'value' => 5000.00,
                    'status' => 'Cancelado',
                ],
                [
                    'period' => '05/2024',
                    'description' => 'Manutenção de Aparelhos de Raio-X',
                    'source' => 'SUS / MAC',
                    'commitment_date' => '18/05/2024',
                    'value' => 12300.00,
                    'status' => 'Liquidado',
                ],
            ],
        ];
    @endphp

    {{-- Passando a configuração para o componente --}}
    <x-export-table :config="$tableConfig" />
</x-layouts.report>