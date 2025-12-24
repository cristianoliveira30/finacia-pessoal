<x-layouts.report>
    @php
        $contasSaudeConfig = [
            'id' => 'contas-saude-table',
            'columns' => [
                ['key' => 'bank', 'label' => 'Banco', 'align' => 'left'],
                ['key' => 'account', 'label' => 'Agência / Conta', 'align' => 'center'],
                ['key' => 'description', 'label' => 'Bloco de Financiamento'],
                ['key' => 'balance', 'label' => 'Saldo Atual', 'type' => 'currency'],
                ['key' => 'last_update', 'label' => 'Última Atualização', 'align' => 'center'],
            ],
            'rows' => [
                [
                    'bank' => 'Banco do Brasil',
                    'account' => '1234-5 / 20.100-1',
                    'description' => 'FMS - Custeio SUS (Bloco Manutenção)',
                    'balance' => 210000.00,
                    'last_update' => '24/12/2025',
                ],
                [
                    'bank' => 'Banco do Brasil',
                    'account' => '1234-5 / 20.200-5',
                    'description' => 'FMS - Investimentos (Equipamentos)',
                    'balance' => 150000.00,
                    'last_update' => '24/12/2025',
                ],
                [
                    'bank' => 'Banco do Brasil',
                    'account' => '1234-5 / 20.300-9',
                    'description' => 'Farmácia Popular / Assistência Farmacêutica',
                    'balance' => 4500.50,
                    'last_update' => '23/12/2025',
                ],
            ],
        ];
    @endphp

    <x-export-table :config="$contasSaudeConfig" />
</x-layouts.report>