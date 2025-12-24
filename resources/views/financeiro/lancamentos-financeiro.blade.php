<x-layouts.report>
    @php
        $lancamentosFinanceiroConfig = [
            'id' => 'lancamentos-financeiro-table',
            'columns' => [
                ['key' => 'date', 'label' => 'Data', 'align' => 'center'],
                ['key' => 'type', 'label' => 'Tipo', 'align' => 'center'],
                ['key' => 'category', 'label' => 'Categoria', 'align' => 'left'],
                ['key' => 'description', 'label' => 'Histórico'],
                ['key' => 'value', 'label' => 'Valor', 'type' => 'currency'],
                ['key' => 'status', 'label' => 'Status', 'align' => 'center'],
            ],
            'rows' => [
                [
                    'date' => '24/12/2025',
                    'type' => 'Receita',
                    'category' => 'Repasses',
                    'description' => 'Cota-Parte FPM (3º Decêndio)',
                    'value' => 450000.00,
                    'status' => 'Confirmado',
                ],
                [
                    'date' => '24/12/2025',
                    'type' => 'Receita',
                    'category' => 'Tributos',
                    'description' => 'Arrecadação ISSQN Diária',
                    'value' => 5600.50,
                    'status' => 'Conciliado',
                ],
                [
                    'date' => '23/12/2025',
                    'type' => 'Despesa',
                    'category' => 'Administrativo',
                    'description' => 'Pgto. Concessionária de Energia (Prédio Sede)',
                    'value' => -12500.00,
                    'status' => 'Pago',
                ],
                [
                    'date' => '23/12/2025',
                    'type' => 'Despesa',
                    'category' => 'Dívida Pública',
                    'description' => 'Amortização PASEP',
                    'value' => -8900.00,
                    'status' => 'Liquidado',
                ],
            ],
        ];
    @endphp

    <x-export-table :config="$lancamentosFinanceiroConfig" />
</x-layouts.report>