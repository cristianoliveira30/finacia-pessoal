<x-layouts.report title="Fluxo de Caixa Diário">
    @php
        $config = [
            'id' => 'tesouraria-fluxo-table',
            'columns' => [
                ['key' => 'data', 'label' => 'Data', 'align' => 'center'],
                ['key' => 'saldo_anterior', 'label' => 'Saldo Inicial', 'align' => 'right'],
                ['key' => 'ingressos', 'label' => '(+) Ingressos', 'align' => 'right'],
                ['key' => 'desembolsos', 'label' => '(-) Desembolsos', 'align' => 'right'],
                ['key' => 'saldo_final', 'label' => 'Saldo Final', 'align' => 'right'],
            ],
            'rows' => [
                ['data' => '02/01/2025', 'saldo_anterior' => 'R$ 100.000', 'ingressos' => 'R$ 20.000', 'desembolsos' => 'R$ 15.000', 'saldo_final' => 'R$ 105.000'],
                ['data' => '03/01/2025', 'saldo_anterior' => 'R$ 105.000', 'ingressos' => 'R$ 5.000', 'desembolsos' => 'R$ 50.000', 'saldo_final' => 'R$ 60.000'],
            ],
        ];
    @endphp
    <x-export-table :config="$config" />
</x-layouts.report>