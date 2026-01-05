<x-layouts.report title="Gestão de Convênios e Contrapartidas">
    @php
        $config = [
            'id' => 'invest-contrapartidas-table',
            'columns' => [
                ['key' => 'convenio', 'label' => 'Nº Convênio', 'align' => 'center'],
                ['key' => 'objeto', 'label' => 'Objeto do Convênio'],
                ['key' => 'orgao', 'label' => 'Órgão Concedente'],
                ['key' => 'valor_total', 'label' => 'Valor Total', 'align' => 'right'],
                ['key' => 'repasse', 'label' => 'Vlr. Repasse', 'align' => 'right'],
                ['key' => 'contrapartida', 'label' => 'Contrapartida (Mun.)', 'align' => 'right'],
                ['key' => 'status', 'label' => 'Status Financeiro', 'align' => 'center'],
            ],
            'rows' => [
                ['convenio' => '889977/2024', 'objeto' => 'Pavimentação Rua A', 'orgao' => 'MDR/Caixa', 'valor_total' => 'R$ 500.000', 'repasse' => 'R$ 450.000', 'contrapartida' => 'R$ 50.000', 'status' => 'Em Execução'],
            ],
        ];
    @endphp
    <x-export-table :config="$config" />
</x-layouts.report>