<x-layouts.report title="Solicitações de Manutenção e Pendências">
    @php
        $pendenciasConfig = [
            'id' => 'obras-pendencias-table',
            'columns' => [
                ['key' => 'data_solicitacao', 'label' => 'Data Abertura', 'align' => 'center'],
                ['key' => 'escola', 'label' => 'Escola Solicitante'],
                ['key' => 'problema', 'label' => 'Descrição do Problema'],
                ['key' => 'prioridade', 'label' => 'Prioridade', 'align' => 'center'],
                ['key' => 'status', 'label' => 'Status Atual'],
            ],
            'rows' => [
                ['data_solicitacao' => '02/01/2025', 'escola' => 'EMEF Monteiro Lobato', 'problema' => 'Vazamento no banheiro masculino', 'prioridade' => 'Alta', 'status' => 'Orçamento Aprovado'],
                ['data_solicitacao' => '03/01/2025', 'escola' => 'CMEI Pingo de Gente', 'problema' => 'Lâmpadas queimadas no pátio', 'prioridade' => 'Média', 'status' => 'Aguardando Eletricista'],
                ['data_solicitacao' => '15/12/2024', 'escola' => 'EMEF Tiradentes', 'problema' => 'Janela da sala 4 quebrada', 'prioridade' => 'Baixa', 'status' => 'Pendente'],
            ],
        ];
    @endphp

    <x-export-table :config="$pendenciasConfig" />
</x-layouts.report>