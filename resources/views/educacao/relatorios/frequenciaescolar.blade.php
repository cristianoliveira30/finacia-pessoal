<x-layouts.report>
    @php
        $tableConfig = [
            'id' => 'table-frequencia',
            'columns' => [
                ['key' => 'month', 'label' => 'Mês Ref.', 'align' => 'center'],
                ['key' => 'school_name', 'label' => 'Escola'],
                ['key' => 'total_classes', 'label' => 'Dias Letivos', 'align' => 'center'],
                ['key' => 'avg_attendance', 'label' => 'Freq. Média (%)', 'align' => 'center'],
                ['key' => 'critical_students', 'label' => 'Alunos em Risco (<75%)', 'align' => 'center'],
                ['key' => 'action_taken', 'label' => 'Ação do Conselho'],
            ],
            'rows' => [
                ['month' => 'Outubro', 'school_name' => 'E.M. Monteiro Lobato', 'total_classes' => 22, 'avg_attendance' => '92%', 'critical_students' => 15, 'action_taken' => 'Visita Domiciliar'],
                ['month' => 'Outubro', 'school_name' => 'C.M.EI. Girassol', 'total_classes' => 22, 'avg_attendance' => '85%', 'critical_students' => 8, 'action_taken' => 'Reunião com Pais'],
            ]
        ];
    @endphp
    <x-export-table :config="$tableConfig" />
</x-layouts.report>