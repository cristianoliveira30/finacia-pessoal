<x-layouts.report title="Créditos Adicionais (Suplementares e Especiais)">
    @php
        $config = [
            'id' => 'orcamento-creditos-table',
            'columns' => [
                ['key' => 'decreto', 'label' => 'Lei/Decreto', 'align' => 'center'],
                ['key' => 'data', 'label' => 'Data', 'align' => 'center'],
                ['key' => 'tipo', 'label' => 'Tipo de Crédito'],
                ['key' => 'origem', 'label' => 'Origem Recurso (Superávit/Excesso)'],
                ['key' => 'valor', 'label' => 'Valor Aberto', 'align' => 'right'],
            ],
            'rows' => [
                ['decreto' => 'Dec. 05/2025', 'data' => '10/02/2025', 'tipo' => 'Suplementar', 'origem' => 'Superávit Financeiro', 'valor' => 'R$ 150.000,00'],
                ['decreto' => 'Lei 102/2025', 'data' => '15/03/2025', 'tipo' => 'Especial', 'origem' => 'Excesso de Arrecadação', 'valor' => 'R$ 500.000,00'],
            ],
        ];
    @endphp
    <x-export-table :config="$config" />
</x-layouts.report>