<x-layouts.report>
    @php
        $tableConfig = [
            'id' => 'relatorio-matriculas',
            'columns' => [
                ['key' => 'school_code', 'label' => 'Cód. INEP', 'align' => 'center'],
                ['key' => 'school_name', 'label' => 'Unidade Escolar'],
                ['key' => 'segment', 'label' => 'Etapa de Ensino'],
                ['key' => 'classes_count', 'label' => 'Total Turmas', 'align' => 'center'],
                ['key' => 'active_students', 'label' => 'Matrículas Ativas', 'align' => 'center'],
                ['key' => 'vacancies', 'label' => 'Vagas Disponíveis', 'align' => 'center'],
                ['key' => 'status', 'label' => 'Situação', 'align' => 'center'],
            ],
            'rows' => [
                [
                    'school_code' => '12345678',
                    'school_name' => 'E.M. Monteiro Lobato',
                    'segment' => 'Ensino Fundamental I',
                    'classes_count' => 12,
                    'active_students' => 320,
                    'vacancies' => 15,
                    'status' => 'Regular',
                ],
                [
                    'school_code' => '87654321',
                    'school_name' => 'C.M.EI. Pingo de Gente',
                    'segment' => 'Educação Infantil',
                    'classes_count' => 8,
                    'active_students' => 150,
                    'vacancies' => 0,
                    'status' => 'Lotado',
                ],
                [
                    'school_code' => '11223344',
                    'school_name' => 'E.M. Paulo Freire',
                    'segment' => 'EJA / Fundamental II',
                    'classes_count' => 10,
                    'active_students' => 280,
                    'vacancies' => 40,
                    'status' => 'Vagas Abertas',
                ],
                [
                    'school_code' => '55667788',
                    'school_name' => 'E.M. Cecília Meireles',
                    'segment' => 'Ensino Fundamental I',
                    'classes_count' => 14,
                    'active_students' => 350,
                    'vacancies' => 10,
                    'status' => 'Regular',
                ],
            ],
        ];
    @endphp

    <x-export-table :config="$tableConfig" />
</x-layouts.report>