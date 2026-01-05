<x-layouts.report title="LDO - Metas e Prioridades">
    @php
        $config = [
            'id' => 'orcamento-ldo-table',
            'columns' => [
                ['key' => 'programa', 'label' => 'Programa'],
                ['key' => 'acao', 'label' => 'Ação/Meta Física'],
                ['key' => 'produto', 'label' => 'Produto'],
                ['key' => 'meta_ano', 'label' => 'Meta Ano', 'align' => 'center'],
                ['key' => 'valor_estimado', 'label' => 'Custo Estimado', 'align' => 'right'],
            ],
            'rows' => [
                ['programa' => 'Saúde para Todos', 'acao' => 'Construção de UBS', 'produto' => 'Unidade Construída', 'meta_ano' => '2', 'valor_estimado' => 'R$ 1.200.000'],
            ],
        ];
    @endphp
    <x-export-table :config="$config" />
</x-layouts.report>