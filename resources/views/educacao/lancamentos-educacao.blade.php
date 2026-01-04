<x-layouts.report :title="$tableConfig['title'] ?? 'Lançamentos Financeiro'">
    @php
        $lancamentosEducacaoConfig = [
            'id' => 'lancamentos-educacao-table',
            'columns' => [
                ['key' => 'date', 'label' => 'Data', 'align' => 'center'],
                ['key' => 'type', 'label' => 'Tipo', 'align' => 'center'],
                ['key' => 'description', 'label' => 'Histórico / Fornecedor'],
                ['key' => 'source', 'label' => 'Fonte Recurso', 'align' => 'center'],
                ['key' => 'value', 'label' => 'Valor', 'type' => 'currency'],
                ['key' => 'status', 'label' => 'Status', 'align' => 'center'],
            ],
            'rows' => [
                [
                    'date' => '24/12/2025',
                    'type' => 'Despesa',
                    'description' => 'Pgto. Folha Magistério (Efetivos)',
                    'source' => 'FUNDEB 70%',
                    'value' => -320000.00,
                    'status' => 'Agendado',
                ],
                [
                    'date' => '24/12/2025',
                    'type' => 'Despesa',
                    'description' => 'Aquisição de Material Didático - Papelaria Central',
                    'source' => 'MDE',
                    'value' => -4500.90,
                    'status' => 'Pago',
                ],
                [
                    'date' => '23/12/2025',
                    'type' => 'Receita',
                    'description' => 'Repasse Constitucional FUNDEB',
                    'source' => 'Tesouro Nacional',
                    'value' => 580000.00,
                    'status' => 'Confirmado',
                ],
                [
                    'date' => '22/12/2025',
                    'type' => 'Despesa',
                    'description' => 'Manutenção Transporte Escolar (Peças Ônibus)',
                    'source' => 'PNATE',
                    'value' => -2100.00,
                    'status' => 'Liquidado',
                ],
            ],
        ];
    @endphp

    <x-export-table :config="$lancamentosEducacaoConfig" />
</x-layouts.report>