<x-layouts.report title="Controle de Restos a Pagar (RP)">
    @php
        $config = [
            'id' => 'orcamento-rp-table',
            'columns' => [
                ['key' => 'exercicio', 'label' => 'Ano Origem', 'align' => 'center'],
                ['key' => 'tipo', 'label' => 'Tipo (Proc./Não Proc.)'],
                ['key' => 'inscrito', 'label' => 'Inscrito', 'align' => 'right'],
                ['key' => 'cancelado', 'label' => 'Cancelado', 'align' => 'right'],
                ['key' => 'pago', 'label' => 'Pago', 'align' => 'right'],
                ['key' => 'saldo', 'label' => 'Saldo a Pagar', 'align' => 'right'],
            ],
            'rows' => [
                ['exercicio' => '2024', 'tipo' => 'Processados', 'inscrito' => 'R$ 1.000.000', 'cancelado' => 'R$ 0', 'pago' => 'R$ 800.000', 'saldo' => 'R$ 200.000'],
                ['exercicio' => '2024', 'tipo' => 'Não Processados', 'inscrito' => 'R$ 500.000', 'cancelado' => 'R$ 50.000', 'pago' => 'R$ 100.000', 'saldo' => 'R$ 350.000'],
            ],
        ];
    @endphp
    <x-export-table :config="$config" />
</x-layouts.report>