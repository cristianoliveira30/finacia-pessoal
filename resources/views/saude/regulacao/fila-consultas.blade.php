<x-layouts.report :title="'Regulação - Fila de Consultas'">
    @php
        $filaConfig = [
            'id' => 'regulacao-fila-table',
            'columns' => [
                ['key' => 'specialty', 'label' => 'Especialidade', 'align' => 'left'],
                ['key' => 'waiting_list', 'label' => 'Aguardando', 'align' => 'center'],
                ['key' => 'avg_wait_time', 'label' => 'Tempo Médio (Dias)', 'align' => 'center'],
                ['key' => 'high_priority', 'label' => 'Prioridade Vermelha', 'align' => 'center'],
                ['key' => 'absenteeism', 'label' => '% Absenteísmo', 'align' => 'center'],
            ],
            'rows' => [
                [
                    'specialty' => 'Oftalmologia',
                    'waiting_list' => 450,
                    'avg_wait_time' => 45,
                    'high_priority' => 12,
                    'absenteeism' => '25%',
                ],
                [
                    'specialty' => 'Neurologia',
                    'waiting_list' => 320,
                    'avg_wait_time' => 60,
                    'high_priority' => 5,
                    'absenteeism' => '18%',
                ],
                [
                    'specialty' => 'Cardiologia',
                    'waiting_list' => 180,
                    'avg_wait_time' => 30,
                    'high_priority' => 2,
                    'absenteeism' => '15%',
                ],
                [
                    'specialty' => 'Ortopedia',
                    'waiting_list' => 600,
                    'avg_wait_time' => 90,
                    'high_priority' => 45,
                    'absenteeism' => '30%',
                ],
            ],
        ];
    @endphp

    <x-export-table :config="$filaConfig" />
</x-layouts.report>