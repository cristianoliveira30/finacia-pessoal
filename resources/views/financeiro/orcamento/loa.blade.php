<x-layouts.report title="Execução da LOA - Por Programa de Trabalho">
    @php
        $loaConfig = [
            'id' => 'orcamento-loa-table',
            'columns' => [
                ['key' => 'funcional', 'label' => 'Funcional Programática'],
                ['key' => 'descricao', 'label' => 'Programa/Ação'],
                ['key' => 'inicial', 'label' => 'Dotação Inicial', 'align' => 'right'],
                ['key' => 'atualizada', 'label' => 'Dotação Atualizada', 'align' => 'right'],
                ['key' => 'congelado', 'label' => 'Contingenciado', 'align' => 'right'],
                ['key' => 'saldo', 'label' => 'Saldo Disponível', 'align' => 'right'],
            ],
            'rows' => [
                ['funcional' => '02.06.12.361.0005', 'descricao' => 'Manutenção do Ensino Fundamental', 'inicial' => 'R$ 5.000.000', 'atualizada' => 'R$ 5.200.000', 'congelado' => 'R$ 0', 'saldo' => 'R$ 1.500.000'],
            ],
        ];
    @endphp
    <x-export-table :config="$loaConfig" />
</x-layouts.report>