<x-layouts.report title="Acompanhamento da Arrecadação">
    @php
        $arrecadacaoConfig = [
            'id' => 'receitas-arrecadacao-table',
            'columns' => [
                ['key' => 'codigo', 'label' => 'Rubrica', 'align' => 'center'],
                ['key' => 'fonte', 'label' => 'Fonte de Recurso'],
                ['key' => 'descricao', 'label' => 'Especificação'],
                ['key' => 'previsto', 'label' => 'Previsão Atualizada', 'align' => 'right'],
                ['key' => 'arrecadado_mes', 'label' => 'No Mês', 'align' => 'right'],
                ['key' => 'arrecadado_ano', 'label' => 'Acumulado Ano', 'align' => 'right'],
                ['key' => 'diferenca', 'label' => 'A Arrecadar', 'align' => 'right'],
            ],
            'rows' => [
                ['codigo' => '1.1.1.3.03.1.1', 'fonte' => '1500', 'descricao' => 'Imposto de Renda Retido na Fonte - IRRF', 'previsto' => 'R$ 500.000', 'arrecadado_mes' => 'R$ 45.000', 'arrecadado_ano' => 'R$ 200.000', 'diferenca' => 'R$ 300.000'],
            ],
        ];
    @endphp
    <x-export-table :config="$arrecadacaoConfig" />
</x-layouts.report>