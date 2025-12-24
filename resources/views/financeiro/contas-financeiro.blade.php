<x-layouts.report>
    @php
        $contasFinanceiroConfig = [
            'id' => 'contas-financeiro-table',
            'columns' => [
                ['key' => 'bank', 'label' => 'Banco', 'align' => 'left'],
                ['key' => 'account', 'label' => 'Agência / Conta', 'align' => 'center'],
                ['key' => 'description', 'label' => 'Descrição da Conta'],
                ['key' => 'balance', 'label' => 'Saldo Disponível', 'type' => 'currency'],
                ['key' => 'status', 'label' => 'Tipo', 'align' => 'center'],
            ],
            'rows' => [
                [
                    'bank' => 'Banco do Brasil',
                    'account' => '1234-5 / 5.000-1',
                    'description' => 'Conta Movimento Geral (FPM)',
                    'balance' => 1250000.00,
                    'status' => 'Principal',
                ],
                [
                    'bank' => 'Banco do Brasil',
                    'account' => '1234-5 / 7.500-X',
                    'description' => 'Arrecadação Tributária (IPTU/ISS)',
                    'balance' => 45000.00,
                    'status' => 'Arrecadação',
                ],
                [
                    'bank' => 'Caixa Econômica',
                    'account' => '0890 / 001.050-9',
                    'description' => 'Convênio Pavimentação Ruas',
                    'balance' => 300000.00,
                    'status' => 'Vinculado',
                ],
                [
                    'bank' => 'Banco do Brasil',
                    'account' => '1234-5 / 99.000-9',
                    'description' => 'Reserva de Contingência',
                    'balance' => 50000.00,
                    'status' => 'Reserva',
                ],
            ],
        ];
    @endphp

    <x-export-table :config="$contasFinanceiroConfig" />
</x-layouts.report>