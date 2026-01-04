<x-layouts.report :title="'Atenção Básica - UBS / Unidades'">
    @php
        $ubsConfig = [
            'id' => 'ubs-unidades-table',
            'columns' => [
                ['key' => 'unit_name', 'label' => 'Nome da Unidade', 'align' => 'left'],
                ['key' => 'neighborhood', 'label' => 'Bairro/Distrito', 'align' => 'left'],
                ['key' => 'teams_active', 'label' => 'Equipes ESF', 'align' => 'center'],
                ['key' => 'doctors_present', 'label' => 'Médicos Presentes', 'align' => 'center'],
                ['key' => 'daily_appointments', 'label' => 'Atendimentos Hoje', 'align' => 'center'],
                ['key' => 'status', 'label' => 'Status Operacional', 'align' => 'center'],
            ],
            'rows' => [
                [
                    'unit_name' => 'UBS Guamá',
                    'neighborhood' => 'Guamá',
                    'teams_active' => 4,
                    'doctors_present' => 3,
                    'daily_appointments' => 124,
                    'status' => 'Normal',
                ],
                [
                    'unit_name' => 'UBS Jurunas',
                    'neighborhood' => 'Jurunas',
                    'teams_active' => 5,
                    'doctors_present' => 5,
                    'daily_appointments' => 156,
                    'status' => 'Alta Demanda',
                ],
                [
                    'unit_name' => 'UBS Marambaia',
                    'neighborhood' => 'Marambaia',
                    'teams_active' => 3,
                    'doctors_present' => 2,
                    'daily_appointments' => 89,
                    'status' => 'Parcial (Reforma)',
                ],
                [
                    'unit_name' => 'USF Ilha do Combu',
                    'neighborhood' => 'Ilha do Combu',
                    'teams_active' => 1,
                    'doctors_present' => 1,
                    'daily_appointments' => 32,
                    'status' => 'Normal',
                ],
            ],
        ];
    @endphp

    <x-export-table :config="$ubsConfig" />
</x-layouts.report>