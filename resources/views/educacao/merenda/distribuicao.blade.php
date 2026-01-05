<x-layouts.report title="Logística de Distribuição (Saída)">
    @php
        $distribuicaoConfig = [
            'id' => 'merenda-distribuicao-table',
            'columns' => [
                ['key' => 'data_saida', 'label' => 'Data Entrega', 'align' => 'center'],
                ['key' => 'guia', 'label' => 'Nº Guia Remessa', 'align' => 'center'],
                ['key' => 'destino', 'label' => 'Escola Destino'],
                ['key' => 'responsavel', 'label' => 'Recebido Por'],
                ['key' => 'itens', 'label' => 'Qtd. Itens'],
                ['key' => 'status', 'label' => 'Confirmação'],
            ],
            'rows' => [
                ['data_saida' => '05/01/2025', 'guia' => 'G-5021', 'destino' => 'EMEF Monteiro Lobato', 'responsavel' => 'Dir. Ana Maria', 'itens' => '15 Caixas', 'status' => 'Entregue'],
                ['data_saida' => '05/01/2025', 'guia' => 'G-5022', 'destino' => 'CMEI Pingo de Gente', 'responsavel' => 'Merendeira Sônia', 'itens' => '8 Caixas', 'status' => 'Entregue'],
                ['data_saida' => '06/01/2025', 'guia' => 'G-5023', 'destino' => 'Escola Rural Km 10', 'responsavel' => '-', 'itens' => '10 Caixas', 'status' => 'Em Trânsito'],
            ],
        ];
    @endphp

    <x-export-table :config="$distribuicaoConfig" />
</x-layouts.report>