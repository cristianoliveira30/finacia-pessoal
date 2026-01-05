<x-layouts.report title="Relatório de Liquidações">
    @php
        $config = [
            'id' => 'despesas-liquidacoes-table',
            'columns' => [
                ['key' => 'data', 'label' => 'Data Liq.', 'align' => 'center'],
                ['key' => 'numero', 'label' => 'Nº Liquidação', 'align' => 'center'],
                ['key' => 'empenho', 'label' => 'Empenho', 'align' => 'center'],
                ['key' => 'documento', 'label' => 'Nota Fiscal/Doc'],
                ['key' => 'fornecedor', 'label' => 'Fornecedor'],
                ['key' => 'valor', 'label' => 'Valor Liquidado', 'align' => 'right'],
            ],
            'rows' => [
                ['data' => '05/01/2025', 'numero' => '102/2025', 'empenho' => '40/2025', 'documento' => 'NF-e 5502', 'fornecedor' => 'Distribuidora de Medicamentos', 'valor' => 'R$ 12.500,00'],
            ],
        ];
    @endphp
    <x-export-table :config="$config" />
</x-layouts.report>