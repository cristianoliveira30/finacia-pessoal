<x-layouts.report title="Despesas por Natureza (Elemento)">
    @php
        $config = [
            'id' => 'despesas-elemento-table',
            'columns' => [
                ['key' => 'elemento', 'label' => 'Elemento de Despesa'],
                ['key' => 'descricao', 'label' => 'Descrição'],
                ['key' => 'empenhado', 'label' => 'Empenhado', 'align' => 'right'],
                ['key' => 'liquidado', 'label' => 'Liquidado', 'align' => 'right'],
                ['key' => 'pago', 'label' => 'Pago', 'align' => 'right'],
                ['key' => 'apagar', 'label' => 'Restos a Pagar', 'align' => 'right'],
            ],
            'rows' => [
                ['elemento' => '3.1.90.11', 'descricao' => 'Vencimentos e Vantagens Fixas', 'empenhado' => 'R$ 5.000.000', 'liquidado' => 'R$ 5.000.000', 'pago' => 'R$ 4.900.000', 'apagar' => 'R$ 100.000'],
                ['elemento' => '3.3.90.30', 'descricao' => 'Material de Consumo', 'empenhado' => 'R$ 800.000', 'liquidado' => 'R$ 600.000', 'pago' => 'R$ 550.000', 'apagar' => 'R$ 50.000'],
            ],
        ];
    @endphp
    <x-export-table :config="$config" />
</x-layouts.report>