<x-layouts.report>
    @php
        $tableConfig = [
            'id' => 'table-prod-prof',
            'columns' => [
                ['key' => 'professional_name', 'label' => 'Profissional'],
                ['key' => 'cns', 'label' => 'CNS', 'align' => 'center'],
                ['key' => 'role', 'label' => 'Cargo/Função'],
                ['key' => 'unit_linked', 'label' => 'Lotação'],
                ['key' => 'days_worked', 'label' => 'Dias Trab.', 'align' => 'center'],
                ['key' => 'procedures_count', 'label' => 'Produção Total', 'align' => 'center'],
            ],
            'rows' => [
                ['professional_name' => 'Dr. Carlos Mendes', 'cns' => '700012345...', 'role' => 'Médico Clínico', 'unit_linked' => 'UBS Centro', 'days_worked' => 20, 'procedures_count' => 320],
                ['professional_name' => 'Enf. Ana Paula', 'cns' => '700098765...', 'role' => 'Enfermeira ESF', 'unit_linked' => 'ESF Vila Nova', 'days_worked' => 22, 'procedures_count' => 850],
                ['professional_name' => 'Dra. Luiza Silva', 'cns' => '700055544...', 'role' => 'Odontóloga', 'unit_linked' => 'UBS Centro', 'days_worked' => 18, 'procedures_count' => 140],
            ]
        ];
    @endphp
    <x-export-table :config="$tableConfig" />
</x-layouts.report>