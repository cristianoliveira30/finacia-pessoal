<x-layouts.report>
    @php
        $tableConfig = [
            'id' => 'table-evasao',
            'columns' => [
                ['key' => 'school_name', 'label' => 'Escola'],
                ['key' => 'segment', 'label' => 'Segmento'],
                ['key' => 'active_students', 'label' => 'Matriculados', 'align' => 'center'],
                ['key' => 'dropouts', 'label' => 'Desistências', 'align' => 'center'],
                ['key' => 'dropout_rate', 'label' => 'Taxa (%)', 'align' => 'center'],
                ['key' => 'main_cause', 'label' => 'Motivo Predominante'],
            ],
            'rows' => [
                ['school_name' => 'C.E. Darcy Ribeiro', 'segment' => 'EJA', 'active_students' => 200, 'dropouts' => 25, 'dropout_rate' => '12.5%', 'main_cause' => 'Trabalho/Emprego'],
                ['school_name' => 'E.M. Cecília Meireles', 'segment' => 'Fund. II', 'active_students' => 450, 'dropouts' => 12, 'dropout_rate' => '2.6%', 'main_cause' => 'Mudança de Município'],
                ['school_name' => 'E.M. Tiradentes', 'segment' => 'Fund. I', 'active_students' => 380, 'dropouts' => 2, 'dropout_rate' => '0.5%', 'main_cause' => 'Saúde'],
            ]
        ];
    @endphp
    <x-export-table :config="$tableConfig" />
</x-layouts.report>