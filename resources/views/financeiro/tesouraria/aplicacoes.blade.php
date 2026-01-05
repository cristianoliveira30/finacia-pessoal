<x-layouts.report title="Controle de Aplicações Financeiras">
    @php
        $config = [
            'id' => 'tesouraria-aplicacoes-table',
            'columns' => [
                ['key' => 'banco', 'label' => 'Banco'],
                ['key' => 'fundo', 'label' => 'Fundo de Investimento'],
                ['key' => 'data_aplic', 'label' => 'Data Aplic.', 'align' => 'center'],
                ['key' => 'valor_principal', 'label' => 'Valor Principal', 'align' => 'right'],
                ['key' => 'rendimento', 'label' => 'Rendimento Mês', 'align' => 'right'],
                ['key' => 'saldo_atual', 'label' => 'Saldo Atualizado', 'align' => 'right'],
            ],
            'rows' => [
                ['banco' => 'Banco do Brasil', 'fundo' => 'BB Público Supremo', 'data_aplic' => '01/01/2025', 'valor_principal' => 'R$ 1.000.000', 'rendimento' => 'R$ 10.500', 'saldo_atual' => 'R$ 1.010.500'],
            ],
        ];
    @endphp
    <x-export-table :config="$config" />
</x-layouts.report>