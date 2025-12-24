<x-layouts.report>
    @php
        $tableConfig = [
            'id' => 'table-aprendizagem',
            'columns' => [
                ['key' => 'school_name', 'label' => 'Unidade Escolar'],
                ['key' => 'grade_level', 'label' => 'Ano/Série', 'align' => 'center'],
                ['key' => 'subject', 'label' => 'Disciplina'],
                ['key' => 'avg_score', 'label' => 'Média Geral', 'align' => 'center'],
                ['key' => 'ideb_target', 'label' => 'Meta IDEB', 'align' => 'center'],
                ['key' => 'ideb_actual', 'label' => 'IDEB Atual', 'align' => 'center'],
                ['key' => 'status', 'label' => 'Desempenho'],
            ],
            'rows' => [
                ['school_name' => 'E.M. Monteiro Lobato', 'grade_level' => '5º Ano', 'subject' => 'Matemática', 'avg_score' => '7.5', 'ideb_target' => '6.0', 'ideb_actual' => '6.2', 'status' => 'Acima da Meta'],
                ['school_name' => 'E.M. Monteiro Lobato', 'grade_level' => '5º Ano', 'subject' => 'Português', 'avg_score' => '8.0', 'ideb_target' => '6.0', 'ideb_actual' => '6.5', 'status' => 'Acima da Meta'],
                ['school_name' => 'E.M. Paulo Freire', 'grade_level' => '9º Ano', 'subject' => 'Matemática', 'avg_score' => '5.5', 'ideb_target' => '5.5', 'ideb_actual' => '5.1', 'status' => 'Abaixo da Meta'],
            ]
        ];
    @endphp
    <x-export-table :config="$tableConfig" />
</x-layouts.report>