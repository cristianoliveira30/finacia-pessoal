<x-layouts.report :title="$tableConfig['title'] ?? 'execução orçamentária'">
    @php
        $tableConfig = [
            'id' => 'budget-execution-table',

            'columns' => [
                [
                    'key' => 'period',
                    'label' => 'Mês/Ano',
                    // Se o componente suportar ordenação, isso ajuda a agrupar
                ],
                [
                    'key' => 'description',
                    'label' => 'Natureza da Despesa',
                ],
                [
                    'key' => 'commitment_date',
                    'label' => 'Data do Empenho',
                    'type' => 'date',
                    'date_format' => 'DD/MM/YYYY',
                ],
                [
                    'key' => 'value',
                    'label' => 'Valor (R$)',
                    'type' => 'currency', 
                ],
                [
                    'key' => 'status',
                    'label' => 'Situação',
                ],
                [
                    'key' => 'percentage',
                    'label' => 'Execução',
                ],
            ],

            'rows' => [
                [
                    'period' => '01/2024',
                    'description' => 'Aquisição de Equipamentos de TI',
                    'commitment_date' => '15/01/2024',
                    'value' => 45000.00,
                    'status' => 'Liquidado',
                    'percentage' => '100%',
                ],
                [
                    'period' => '02/2024',
                    'description' => 'Serviços de Manutenção Predial',
                    'commitment_date' => '02/02/2024',
                    'value' => 12500.50,
                    'status' => 'Pago',
                    'percentage' => '100%',
                ],
                [
                    'period' => '03/2024',
                    'description' => 'Licenciamento de Software (Anual)',
                    'commitment_date' => '10/03/2024',
                    'value' => 8900.00,
                    'status' => 'Empenhado',
                    'percentage' => '0%',
                ],
                [
                    'period' => '04/2024',
                    'description' => 'Treinamento e Capacitação Técnica',
                    'commitment_date' => '22/04/2024',
                    'value' => 5400.00,
                    'status' => 'Em Processamento',
                    'percentage' => '25%',
                ],
                [
                    'period' => '05/2024',
                    'description' => 'Material de Consumo (Escritório)',
                    'commitment_date' => '05/05/2024',
                    'value' => 2100.00,
                    'status' => 'Pago',
                    'percentage' => '100%',
                ],
                [
                    'period' => '06/2024',
                    'description' => 'Contratação de Consultoria',
                    'commitment_date' => '12/06/2024',
                    'value' => 75000.00,
                    'status' => 'Liquidado',
                    'percentage' => '80%',
                ],
                [
                    'period' => '07/2024',
                    'description' => 'Despesas com Viagens e Diárias',
                    'commitment_date' => '18/07/2024',
                    'value' => 3200.00,
                    'status' => 'Pago',
                    'percentage' => '100%',
                ],
                [
                    'period' => '08/2024',
                    'description' => 'Serviços de Nuvem (Cloud)',
                    'commitment_date' => '01/08/2024',
                    'value' => 1500.00,
                    'status' => 'Empenhado',
                    'percentage' => '10%',
                ],
                [
                    'period' => '09/2024',
                    'description' => 'Publicidade e Propaganda',
                    'commitment_date' => '14/09/2024',
                    'value' => 20000.00,
                    'status' => 'Cancelado',
                    'percentage' => '0%',
                ],
                [
                    'period' => '10/2024',
                    'description' => 'Obras e Instalações (Reforma)',
                    'commitment_date' => '30/10/2024',
                    'value' => 120000.00,
                    'status' => 'Liquidado',
                    'percentage' => '50%',
                ],
            ],
        ];
    @endphp

    <x-export-table :config="$tableConfig" />
</x-layouts.report>