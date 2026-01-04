<x-layouts.report :title="$tableConfig['title'] ?? 'Lançamentos Financeiro'">
    @php
        $lancamentosSaudeConfig = [
            'id' => 'lancamentos-saude-table',
            'columns' => [
                ['key' => 'date', 'label' => 'Data', 'align' => 'center'],
                ['key' => 'type', 'label' => 'Tipo', 'align' => 'center'],
                ['key' => 'program', 'label' => 'Programa/Bloco', 'align' => 'left'],
                ['key' => 'description', 'label' => 'Histórico / Fornecedor'],
                ['key' => 'value', 'label' => 'Valor', 'type' => 'currency'],
                ['key' => 'status', 'label' => 'Status', 'align' => 'center'],
            ],
            'rows' => [
                [
                    'date' => '24/12/2025',
                    'type' => 'Despesa',
                    'program' => 'Farmácia Básica',
                    'description' => 'Compra de Medicamentos (Antibióticos e Insulinas)',
                    'value' => -28500.00,
                    'status' => 'Liquidado',
                ],
                [
                    'date' => '24/12/2025',
                    'type' => 'Despesa',
                    'program' => 'MAC',
                    'description' => 'Plantão Médico Extra - Hospital Municipal',
                    'value' => -6000.00,
                    'status' => 'Agendado',
                ],
                [
                    'date' => '23/12/2025',
                    'type' => 'Receita',
                    'program' => 'PAB',
                    'description' => 'Repasse Fundo a Fundo - Piso Atenção Básica',
                    'value' => 110000.00,
                    'status' => 'Confirmado',
                ],
                [
                    'date' => '22/12/2025',
                    'type' => 'Despesa',
                    'program' => 'Vigilância Sanitária',
                    'description' => 'Combustível Veículos Fiscalização',
                    'value' => -850.00,
                    'status' => 'Pago',
                ],
            ],
        ];
    @endphp

    <x-export-table :config="$lancamentosSaudeConfig" />
</x-layouts.report>