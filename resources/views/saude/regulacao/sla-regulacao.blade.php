<x-layouts.report :title="'Regulação - SLA (Tempos de Resposta)'">
    @php
        $slaConfig = [
            'id' => 'regulacao-sla-table',
            'columns' => [
                ['key' => 'type', 'label' => 'Tipo de Solicitação', 'align' => 'left'],
                ['key' => 'priority', 'label' => 'Prioridade', 'align' => 'center'],
                ['key' => 'avg_response', 'label' => 'Tempo Médio Resposta', 'align' => 'center'],
                ['key' => 'sla_target', 'label' => 'Meta (SLA)', 'align' => 'center'],
                ['key' => 'compliance', 'label' => '% Dentro do Prazo', 'align' => 'center'],
            ],
            'rows' => [
                [
                    'type' => 'Leito de UTI Adulto',
                    'priority' => 'Vermelha',
                    'avg_response' => '45 min',
                    'sla_target' => '60 min',
                    'compliance' => '92%',
                ],
                [
                    'type' => 'Consulta Especializada',
                    'priority' => 'Amarela',
                    'avg_response' => '5 dias',
                    'sla_target' => '3 dias',
                    'compliance' => '40% (Crítico)',
                ],
                [
                    'type' => 'Ressonância Magnética',
                    'priority' => 'Azul (Eletiva)',
                    'avg_response' => '25 dias',
                    'sla_target' => '30 dias',
                    'compliance' => '85%',
                ],
            ],
        ];
    @endphp

    <x-export-table :config="$slaConfig" />
</x-layouts.report>