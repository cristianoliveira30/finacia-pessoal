<x-layouts.report :title="$tableConfig['title'] ?? 'Contas Financeiro'">
    @php
        $contasEducacaoConfig = [
            'id' => 'contas-educacao-table',
            'columns' => [
                ['key' => 'bank', 'label' => 'Banco', 'align' => 'left'],
                ['key' => 'account', 'label' => 'Agência / Conta', 'align' => 'center'],
                ['key' => 'description', 'label' => 'Fundo / Descrição'],
                ['key' => 'balance', 'label' => 'Saldo Atual', 'type' => 'currency'],
                ['key' => 'status', 'label' => 'Situação', 'align' => 'center'],
            ],
            'rows' => [
                [
                    'bank' => 'Banco do Brasil',
                    'account' => '1234-5 / 10.001-X',
                    'description' => 'FUNDEB 70% - Pagamento Professores',
                    'balance' => 450200.50,
                    'status' => 'Ativa',
                ],
                [
                    'bank' => 'Banco do Brasil',
                    'account' => '1234-5 / 10.002-X',
                    'description' => 'FUNDEB 30% - Custeio e Manutenção',
                    'balance' => 85000.00,
                    'status' => 'Ativa',
                ],
                [
                    'bank' => 'Caixa Econômica',
                    'account' => '0890 / 006.0050-1',
                    'description' => 'QSE - Salário Educação',
                    'balance' => 12500.75,
                    'status' => 'Ativa',
                ],
                [
                    'bank' => 'Banco do Brasil',
                    'account' => '1234-5 / 10.005-9',
                    'description' => 'PNAE - Alimentação Escolar',
                    'balance' => 3200.00,
                    'status' => 'Baixo',
                ],
            ],
        ];
    @endphp

    <x-export-table :config="$contasEducacaoConfig" />
</x-layouts.report>