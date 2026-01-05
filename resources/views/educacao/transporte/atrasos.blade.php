<x-layouts.report title="Diário de Ocorrências e Atrasos">
    @php
        $atrasosConfig = [
            'id' => 'transporte-atrasos-table',
            'columns' => [
                ['key' => 'data', 'label' => 'Data/Hora', 'align' => 'center'],
                ['key' => 'rota', 'label' => 'Rota Afetada'],
                ['key' => 'veiculo', 'label' => 'Veículo'],
                ['key' => 'motivo', 'label' => 'Motivo da Ocorrência'],
                ['key' => 'tempo', 'label' => 'Tempo Atraso', 'align' => 'center'],
                ['key' => 'acao', 'label' => 'Ação Tomada'],
            ],
            'rows' => [
                ['data' => '05/01/2025 06:45', 'rota' => 'R-03 (Zona Rural)', 'veiculo' => 'Ônibus ABC-1234', 'motivo' => 'Pneu furado', 'tempo' => '45 min', 'acao' => 'Troca realizada pelo motorista'],
                ['data' => '04/01/2025 12:10', 'rota' => 'R-01 (Centro)', 'veiculo' => 'Van XYZ-9876', 'motivo' => 'Trânsito/Obra na via', 'tempo' => '15 min', 'acao' => 'Nenhuma'],
                ['data' => '02/01/2025 07:00', 'rota' => 'R-05 (Universitário)', 'veiculo' => 'Micro DEF-5678', 'motivo' => 'Falha mecânica (Motor)', 'tempo' => 'Cancelado', 'acao' => 'Veículo reserva enviado'],
            ],
        ];
    @endphp

    <x-export-table :config="$atrasosConfig" />
</x-layouts.report>