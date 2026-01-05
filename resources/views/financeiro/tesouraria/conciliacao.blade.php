<x-layouts.report title="Conciliação Bancária">
    @php
        $config = [
            'id' => 'tesouraria-conciliacao-table',
            'columns' => [
                ['key' => 'conta', 'label' => 'Conta Bancária'],
                ['key' => 'saldo_extrato', 'label' => 'Saldo Extrato', 'align' => 'right'],
                ['key' => 'pendencias_credito', 'label' => '(+) Dep. não ident.', 'align' => 'right'],
                ['key' => 'pendencias_debito', 'label' => '(-) Cheques não comp.', 'align' => 'right'],
                ['key' => 'saldo_contabil', 'label' => 'Saldo Sistema', 'align' => 'right'],
                ['key' => 'diferenca', 'label' => 'Diferença', 'align' => 'center'],
            ],
            'rows' => [
                ['conta' => 'BB - Movimento', 'saldo_extrato' => 'R$ 50.000,00', 'pendencias_credito' => 'R$ 0,00', 'pendencias_debito' => 'R$ 1.500,00', 'saldo_contabil' => 'R$ 48.500,00', 'diferenca' => '0,00'],
            ],
        ];
    @endphp
    <x-export-table :config="$config" />
</x-layouts.report>