<x-layouts.report>
    @php
        $tableConfig = [
            'id' => 'table-regulacao',
            'columns' => [
                ['key' => 'request_date', 'label' => 'Data Solicitação', 'align' => 'center'],
                ['key' => 'priority', 'label' => 'Prioridade', 'align' => 'center'],
                ['key' => 'specialty_exam', 'label' => 'Especialidade/Exame'],
                ['key' => 'patient_count', 'label' => 'Fila de Espera (Qtd)', 'align' => 'center'],
                ['key' => 'avg_wait_days', 'label' => 'Espera Média (Dias)', 'align' => 'center'],
                ['key' => 'status', 'label' => 'Situação'],
            ],
            'rows' => [
                ['request_date' => 'Diversas', 'priority' => 'Alta', 'specialty_exam' => 'Cardiologia', 'patient_count' => 45, 'avg_wait_days' => 25, 'status' => 'Aguardando Vaga'],
                ['request_date' => 'Diversas', 'priority' => 'Média', 'specialty_exam' => 'Oftalmologia', 'patient_count' => 120, 'avg_wait_days' => 60, 'status' => 'Fila Crescente'],
                ['request_date' => 'Diversas', 'priority' => 'Baixa', 'specialty_exam' => 'Ressonância Magnética', 'patient_count' => 15, 'avg_wait_days' => 10, 'status' => 'Fluxo Normal'],
            ]
        ];
    @endphp
    <x-export-table :config="$tableConfig" />
</x-layouts.report>