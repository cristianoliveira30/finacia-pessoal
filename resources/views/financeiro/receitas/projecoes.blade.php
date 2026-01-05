<x-layouts.report title="Projeções de Receita">
    @php
        $config = [
            'id' => 'receitas-projecoes-table',
            'columns' => [
                ['key' => 'receita', 'label' => 'Receita Principal'],
                ['key' => 'ano_anterior', 'label' => 'Realizado Ano Anterior', 'align' => 'right'],
                ['key' => 'ano_atual', 'label' => 'Previsto Ano Atual', 'align' => 'right'],
                ['key' => 'tendencia', 'label' => 'Tendência (%)', 'align' => 'center'],
                ['key' => 'projecao', 'label' => 'Projeção Próx. Exercício', 'align' => 'right'],
            ],
            'rows' => [
                ['receita' => 'FPM - Fundo Part. Municípios', 'ano_anterior' => 'R$ 12.000.000', 'ano_atual' => 'R$ 13.000.000', 'tendencia' => '+5%', 'projecao' => 'R$ 13.650.000'],
            ],
        ];
    @endphp
    <x-export-table :config="$config" />
</x-layouts.report>