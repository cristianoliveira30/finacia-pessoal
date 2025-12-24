<x-layouts.report>
    @php
        $tableConfig = [
            'id' => 'table-inclusao',
            'columns' => [
                ['key' => 'school_name', 'label' => 'Unidade Escolar'],
                ['key' => 'pcd_students', 'label' => 'Alunos PCD', 'align' => 'center'],
                ['key' => 'disability_type', 'label' => 'Tipos Prevalentes'],
                ['key' => 'resource_room', 'label' => 'Sala de Recursos', 'align' => 'center'],
                ['key' => 'support_teachers', 'label' => 'Prof. Apoio', 'align' => 'center'],
                ['key' => 'caregivers', 'label' => 'Cuidadores', 'align' => 'center'],
            ],
            'rows' => [
                ['school_name' => 'E.M. Paulo Freire', 'pcd_students' => 12, 'disability_type' => 'TEA / TDAH', 'resource_room' => 'Sim', 'support_teachers' => 4, 'caregivers' => 2],
                ['school_name' => 'E.M. Cora Coralina', 'pcd_students' => 5, 'disability_type' => 'Def. Motora', 'resource_room' => 'Não (Polo vizinho)', 'support_teachers' => 2, 'caregivers' => 3],
            ]
        ];
    @endphp
    <x-export-table :config="$tableConfig" />
</x-layouts.report>