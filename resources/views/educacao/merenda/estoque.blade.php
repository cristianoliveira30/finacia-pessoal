<x-layouts.report title="Estoque da Merenda (Depósito Central)">
    @php
        $merendaConfig = [
            'id' => 'merenda-estoque-table',
            'columns' => [
                ['key' => 'item', 'label' => 'Gênero Alimentício'],
                ['key' => 'lote', 'label' => 'Lote'],
                ['key' => 'validade', 'label' => 'Validade', 'align' => 'center'],
                ['key' => 'quantidade', 'label' => 'Qtd. Atual', 'align' => 'right'],
                ['key' => 'unidade', 'label' => 'Unidade', 'align' => 'center'],
                ['key' => 'status', 'label' => 'Status'],
            ],
            'rows' => [
                ['item' => 'Arroz Parboilizado Tipo 1', 'lote' => 'L-202401', 'validade' => '30/12/2026', 'quantidade' => '5.000', 'unidade' => 'Kg', 'status' => 'Normal'],
                ['item' => 'Feijão Preto', 'lote' => 'L-202405', 'validade' => '15/06/2026', 'quantidade' => '2.500', 'unidade' => 'Kg', 'status' => 'Normal'],
                ['item' => 'Peito de Frango Congelado', 'lote' => 'L-FR-99', 'validade' => '20/02/2026', 'quantidade' => '150', 'unidade' => 'Kg', 'status' => 'Crítico (Baixo)'],
                ['item' => 'Leite em Pó Integral', 'lote' => 'L-LE-10', 'validade' => '10/10/2026', 'quantidade' => '800', 'unidade' => 'Pct 400g', 'status' => 'Normal'],
            ],
        ];
    @endphp

    <x-export-table :config="$merendaConfig" />
</x-layouts.report>