<x-layouts.report title="PPA - Plano Plurianual (Investimentos)">
    @php
        $config = [
            'id' => 'orcamento-ppa-table',
            'columns' => [
                ['key' => 'programa', 'label' => 'Programa de Governo'],
                ['key' => 'ano_1', 'label' => 'Valor Ano 1', 'align' => 'right'],
                ['key' => 'ano_2', 'label' => 'Valor Ano 2', 'align' => 'right'],
                ['key' => 'ano_3', 'label' => 'Valor Ano 3', 'align' => 'right'],
                ['key' => 'ano_4', 'label' => 'Valor Ano 4', 'align' => 'right'],
                ['key' => 'total', 'label' => 'Total Programa', 'align' => 'right'],
            ],
            'rows' => [
                ['programa' => 'Infraestrutura Urbana', 'ano_1' => 'R$ 5 mi', 'ano_2' => 'R$ 6 mi', 'ano_3' => 'R$ 6 mi', 'ano_4' => 'R$ 7 mi', 'total' => 'R$ 24 mi'],
            ],
        ];
    @endphp
    <x-export-table :config="$config" />
</x-layouts.report>