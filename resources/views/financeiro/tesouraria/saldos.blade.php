<x-layouts.report title="Saldos Bancários e Disponibilidades">
    @php
        $saldosConfig = [
            'id' => 'tesouraria-saldos-table',
            'columns' => [
                ['key' => 'banco', 'label' => 'Banco', 'align' => 'center'],
                ['key' => 'agencia', 'label' => 'Agência/Conta'],
                ['key' => 'descricao', 'label' => 'Descrição da Conta'],
                ['key' => 'saldo_anterior', 'label' => 'Saldo Anterior', 'align' => 'right'],
                ['key' => 'creditos', 'label' => 'Entradas', 'align' => 'right'],
                ['key' => 'debitos', 'label' => 'Saídas', 'align' => 'right'],
                ['key' => 'saldo_atual', 'label' => 'Saldo Atual', 'align' => 'right'],
            ],
            'rows' => [
                ['banco' => 'BB', 'agencia' => '1234-5 / 9988-X', 'descricao' => 'Movimento Geral', 'saldo_anterior' => 'R$ 50.000', 'creditos' => 'R$ 10.000', 'debitos' => 'R$ 5.000', 'saldo_atual' => 'R$ 55.000'],
            ],
        ];
    @endphp
    <x-export-table :config="$saldosConfig" />
</x-layouts.report>