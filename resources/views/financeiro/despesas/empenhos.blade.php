<x-layouts.report title="Relatório de Empenhos Emitidos">
    @php
        $empenhosConfig = [
            'id' => 'despesas-empenhos-table',
            'columns' => [
                ['key' => 'data', 'label' => 'Data', 'align' => 'center'],
                ['key' => 'numero', 'label' => 'Nº Empenho', 'align' => 'center'],
                ['key' => 'credor', 'label' => 'Credor/Fornecedor'],
                ['key' => 'historico', 'label' => 'Histórico/Descrição'],
                ['key' => 'tipo', 'label' => 'Tipo', 'align' => 'center'], // Ordinário, Estimativo, Global
                ['key' => 'valor', 'label' => 'Valor', 'align' => 'right'],
            ],
            'rows' => [
                ['data' => '02/01/2025', 'numero' => '0001/2025', 'credor' => 'Comercial Papelaria LTDA', 'historico' => 'Mat. expediente sec. saude', 'tipo' => 'Ordinário', 'valor' => 'R$ 1.500,00'],
                ['data' => '05/01/2025', 'numero' => '0002/2025', 'credor' => 'Construtora Forte', 'historico' => 'Reforma escola municipal', 'tipo' => 'Global', 'valor' => 'R$ 150.000,00'],
            ],
        ];
    @endphp
    <x-export-table :config="$empenhosConfig" />
</x-layouts.report>