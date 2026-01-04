<x-layouts.report :title="'Urgência - Unidades UPA/24h'">
    @php
        $upaConfig = [
            'id' => 'urgencia-unidades-table',
            'columns' => [
                ['key' => 'unit', 'label' => 'Unidade', 'align' => 'left'],
                ['key' => 'type', 'label' => 'Tipo/Porte', 'align' => 'center'],
                ['key' => 'beds_occupied', 'label' => 'Ocupação Leitos', 'align' => 'center'],
                ['key' => 'avg_wait_green', 'label' => 'Espera (Verde)', 'align' => 'center'],
                ['key' => 'doctors_shift', 'label' => 'Médicos no Plantão', 'align' => 'center'],
                ['key' => 'status', 'label' => 'Situação Agora', 'align' => 'center'],
            ],
            'rows' => [
                [
                    'unit' => 'UPA Da Marambaia',
                    'type' => 'Porte III',
                    'beds_occupied' => '95% (19/20)',
                    'avg_wait_green' => '45 min',
                    'doctors_shift' => '4 Clínicos / 2 Pediatras',
                    'status' => 'Lotada',
                ],
                [
                    'unit' => 'UPA Sacramenta',
                    'type' => 'Porte II',
                    'beds_occupied' => '60% (9/15)',
                    'avg_wait_green' => '20 min',
                    'doctors_shift' => '3 Clínicos / 1 Pediatra',
                    'status' => 'Normal',
                ],
                [
                    'unit' => 'UPA Terra Firme',
                    'type' => 'Porte II',
                    'beds_occupied' => '80% (12/15)',
                    'avg_wait_green' => '35 min',
                    'doctors_shift' => '3 Clínicos / 1 Pediatra',
                    'status' => 'Movimentada',
                ],
                [
                    'unit' => 'HPSM 14 de Março (PS)',
                    'type' => 'Hospitalar',
                    'beds_occupied' => '110% (Macas extras)',
                    'avg_wait_green' => '120 min',
                    'doctors_shift' => 'Equipe Completa',
                    'status' => 'Superlotado',
                ],
            ],
        ];
    @endphp

    <x-export-table :config="$upaConfig" />
</x-layouts.report>