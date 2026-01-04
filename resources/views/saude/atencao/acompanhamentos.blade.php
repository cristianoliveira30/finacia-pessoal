<x-layouts.report :title="'Atenção Básica - Acompanhamentos (Crônicos/Prioritários)'">
    @php
        $cronicosConfig = [
            'id' => 'atencao-cronicos-table',
            'columns' => [
                ['key' => 'group', 'label' => 'Grupo Prioritário', 'align' => 'left'],
                ['key' => 'registered_total', 'label' => 'Total Cadastrados', 'align' => 'center'],
                ['key' => 'evaluated_semester', 'label' => 'Avaliados no Semestre', 'align' => 'center'],
                ['key' => 'coverage_perc', 'label' => '% Cobertura', 'align' => 'center'],
                ['key' => 'controlled', 'label' => '% Controlados (PA/Glicemia)', 'align' => 'center'],
            ],
            'rows' => [
                [
                    'group' => 'Hipertensos (HAS)',
                    'registered_total' => 15400,
                    'evaluated_semester' => 11200,
                    'coverage_perc' => '72.7%',
                    'controlled' => '65%',
                ],
                [
                    'group' => 'Diabéticos (DM)',
                    'registered_total' => 6200,
                    'evaluated_semester' => 5100,
                    'coverage_perc' => '82.2%',
                    'controlled' => '58%',
                ],
                [
                    'group' => 'Gestantes (Pré-Natal)',
                    'registered_total' => 1800,
                    'evaluated_semester' => 1800,
                    'coverage_perc' => '100%',
                    'controlled' => '98%',
                ],
            ],
        ];
    @endphp

    <x-export-table :config="$cronicosConfig" />
</x-layouts.report>