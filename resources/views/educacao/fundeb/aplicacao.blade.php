<x-layouts.report title="Aplicação de Recursos FUNDEB">
    @php
        $aplicacaoConfig = [
            'id' => 'fundeb-aplicacao-table',
            'columns' => [
                ['key' => 'data', 'label' => 'Data Pagto', 'align' => 'center'],
                ['key' => 'favorecido', 'label' => 'Favorecido / Fornecedor'],
                ['key' => 'historico', 'label' => 'Histórico / Descrição'],
                ['key' => 'categoria', 'label' => 'Categoria de Gasto', 'align' => 'center'],
                ['key' => 'valor', 'label' => 'Valor Pago', 'type' => 'currency'],
            ],
            'rows' => [
                ['data' => '05/01/2025', 'favorecido' => 'Folha de Pagamento', 'historico' => 'Salários Professores Efetivos - Ref. Dez/24', 'categoria' => '70% - Magistério', 'valor' => 850000.00],
                ['data' => '06/01/2025', 'favorecido' => 'Posto de Gasolina Silva', 'historico' => 'Abastecimento Frota Escolar - NF 554', 'categoria' => '30% - Manutenção', 'valor' => 15400.00],
                ['data' => '07/01/2025', 'favorecido' => 'Papelaria Central', 'historico' => 'Aquisição Material Didático - NF 102', 'categoria' => '30% - Manutenção', 'valor' => 2200.50],
            ],
        ];
    @endphp

    <x-export-table :config="$aplicacaoConfig" />
</x-layouts.report>