<x-layouts.report title="Resumo por Fontes de Recurso">
    @php
        $config = [
            'id' => 'receitas-fontes-table',
            'columns' => [
                ['key' => 'codigo', 'label' => 'Cód. Fonte', 'align' => 'center'],
                ['key' => 'descricao', 'label' => 'Descrição da Fonte'],
                ['key' => 'arrecadado', 'label' => 'Total Arrecadado', 'align' => 'right'],
                ['key' => 'empenhado', 'label' => 'Total Empenhado', 'align' => 'right'],
                ['key' => 'disponivel', 'label' => 'Disponibilidade Financeira', 'align' => 'right'],
            ],
            'rows' => [
                ['codigo' => '1500', 'descricao' => 'Recursos Livres (Não Vinculados)', 'arrecadado' => 'R$ 10.000.000', 'empenhado' => 'R$ 9.000.000', 'disponivel' => 'R$ 1.000.000'],
                ['codigo' => '1540', 'descricao' => 'Fundeb 70%', 'arrecadado' => 'R$ 5.000.000', 'empenhado' => 'R$ 4.800.000', 'disponivel' => 'R$ 200.000'],
            ],
        ];
    @endphp
    <x-export-table :config="$config" />
</x-layouts.report>