<x-layouts.report title="Obras e Manutenções Escolares">
    @php
        $obrasConfig = [
            'id' => 'obras-os-table',
            'columns' => [
                ['key' => 'os_id', 'label' => 'Nº O.S.', 'align' => 'center'],
                ['key' => 'escola', 'label' => 'Local/Escola'],
                ['key' => 'descricao', 'label' => 'Serviço'],
                ['key' => 'empresa', 'label' => 'Empresa Responsável'],
                ['key' => 'valor', 'label' => 'Valor', 'type' => 'currency'],
                ['key' => 'status', 'label' => 'Situação', 'align' => 'center'],
            ],
            'rows' => [
                ['os_id' => '054/25', 'escola' => 'EMEF Monteiro Lobato', 'descricao' => 'Reforma do Telhado e Calhas', 'empresa' => 'Construtora Forte Ltda', 'valor' => 45000.00, 'status' => 'Em Execução'],
                ['os_id' => '055/25', 'escola' => 'CMEI Pingo de Gente', 'descricao' => 'Instalação de Ar Condicionado', 'empresa' => 'Clima Tech', 'valor' => 12000.00, 'status' => 'Concluído'],
                ['os_id' => '058/25', 'escola' => 'Quadra Poliesportiva Central', 'descricao' => 'Pintura do Piso', 'empresa' => 'Tintas & Cores', 'valor' => 8500.00, 'status' => 'Aguardando Medição'],
            ],
        ];
    @endphp

    <x-export-table :config="$obrasConfig" />
</x-layouts.report>