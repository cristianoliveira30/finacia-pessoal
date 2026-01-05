<x-layouts.report title="Despesas por Centro de Custo/Departamento">
    @php
        $config = [
            'id' => 'despesas-centro-custo-table',
            'columns' => [
                ['key' => 'cod', 'label' => 'Cód.', 'align' => 'center'],
                ['key' => 'departamento', 'label' => 'Unidade Administrativa'],
                ['key' => 'dotacao', 'label' => 'Dotação Atualizada', 'align' => 'right'],
                ['key' => 'empenhado', 'label' => 'Empenhado', 'align' => 'right'],
                ['key' => 'liquidado', 'label' => 'Liquidado', 'align' => 'right'],
                ['key' => 'pago', 'label' => 'Pago', 'align' => 'right'],
            ],
            'rows' => [
                ['cod' => '02.01', 'departamento' => 'Gabinete do Prefeito', 'dotacao' => 'R$ 2.000.000', 'empenhado' => 'R$ 1.500.000', 'liquidado' => 'R$ 1.400.000', 'pago' => 'R$ 1.350.000'],
                ['cod' => '02.05', 'departamento' => 'Secretaria de Obras', 'dotacao' => 'R$ 15.000.000', 'empenhado' => 'R$ 10.000.000', 'liquidado' => 'R$ 5.000.000', 'pago' => 'R$ 4.800.000'],
            ],
        ];
    @endphp
    <x-export-table :config="$config" />
</x-layouts.report>