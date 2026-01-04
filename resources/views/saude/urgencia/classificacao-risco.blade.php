<x-layouts.report :title="'Urgência - Classificação de Risco'">
    @php
        $riscoConfig = [
            'id' => 'urgencia-risco-table',
            'columns' => [
                ['key' => 'unit', 'label' => 'Unidade (UPA/PS)', 'align' => 'left'],
                ['key' => 'red', 'label' => 'Vermelho (Emergência)', 'align' => 'center'],
                ['key' => 'orange', 'label' => 'Laranja (Mto Urgente)', 'align' => 'center'],
                ['key' => 'yellow', 'label' => 'Amarelo (Urgente)', 'align' => 'center'],
                ['key' => 'green', 'label' => 'Verde (Pouco Urgente)', 'align' => 'center'],
                ['key' => 'blue', 'label' => 'Azul (Não Urgente)', 'align' => 'center'],
                ['key' => 'total_24h', 'label' => 'Total 24h', 'align' => 'center'],
            ],
            'rows' => [
                [
                    'unit' => 'UPA Da Marambaia',
                    'red' => 2,
                    'orange' => 15,
                    'yellow' => 120,
                    'green' => 200,
                    'blue' => 45,
                    'total_24h' => 382,
                ],
                [
                    'unit' => 'UPA Sacramenta',
                    'red' => 5,
                    'orange' => 22,
                    'yellow' => 140,
                    'green' => 180,
                    'blue' => 30,
                    'total_24h' => 377,
                ],
                [
                    'unit' => 'HPSM 14 de Março',
                    'red' => 15,
                    'orange' => 40,
                    'yellow' => 150,
                    'green' => 80,
                    'blue' => 10,
                    'total_24h' => 295,
                ],
            ],
        ];
    @endphp

    <x-export-table :config="$riscoConfig" />
</x-layouts.report>