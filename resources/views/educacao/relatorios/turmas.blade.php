<x-layouts.report>
    @php
        $tableConfig = [
            'id' => 'table-turmas',
            'columns' => [
                ['key' => 'class_code', 'label' => 'Cód. Turma', 'align' => 'center'],
                ['key' => 'school_name', 'label' => 'Escola'],
                ['key' => 'grade', 'label' => 'Série/Ano'],
                ['key' => 'shift', 'label' => 'Turno', 'align' => 'center'],
                ['key' => 'enrolled', 'label' => 'Alunos', 'align' => 'center'],
                ['key' => 'teacher', 'label' => 'Professor Regente'],
            ],
            'rows' => [
                ['class_code' => '101-M', 'school_name' => 'E.M. Monteiro Lobato', 'grade' => '1º Ano Fund.', 'shift' => 'Matutino', 'enrolled' => 25, 'teacher' => 'Ana Souza'],
                ['class_code' => '302-T', 'school_name' => 'E.M. Monteiro Lobato', 'grade' => '3º Ano Fund.', 'shift' => 'Vespertino', 'enrolled' => 28, 'teacher' => 'Mariana Costa'],
                ['class_code' => 'EI-01', 'school_name' => 'C.M.EI. Girassol', 'grade' => 'Berçário II', 'shift' => 'Integral', 'enrolled' => 12, 'teacher' => 'Cláudia Ramos'],
            ]
        ];
    @endphp
    <x-export-table :config="$tableConfig" />
</x-layouts.report>