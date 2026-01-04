<x-layouts.report :title="'Farmácia - Disponibilidade de Itens'">
    @php
        $dispConfig = [
            'id' => 'farmacia-disp-table',
            'columns' => [
                ['key' => 'group', 'label' => 'Grupo Farmacológico', 'align' => 'left'],
                ['key' => 'total_items', 'label' => 'Total Itens (REMUME)', 'align' => 'center'],
                ['key' => 'available', 'label' => 'Disponíveis', 'align' => 'center'],
                ['key' => 'perc_availability', 'label' => '% Disponibilidade', 'align' => 'center'],
                ['key' => 'critical_items', 'label' => 'Itens Críticos (Estoque Baixo)', 'align' => 'center'],
            ],
            'rows' => [
                [
                    'group' => 'A - Trato Alimentar e Metabolismo',
                    'total_items' => 45,
                    'available' => 42,
                    'perc_availability' => '93.3%',
                    'critical_items' => 2,
                ],
                [
                    'group' => 'C - Sistema Cardiovascular',
                    'total_items' => 60,
                    'available' => 58,
                    'perc_availability' => '96.6%',
                    'critical_items' => 5,
                ],
                [
                    'group' => 'J - Anti-infecciosos (Antibióticos)',
                    'total_items' => 35,
                    'available' => 28,
                    'perc_availability' => '80.0%',
                    'critical_items' => 4,
                ],
                [
                    'group' => 'N - Sistema Nervoso',
                    'total_items' => 50,
                    'available' => 45,
                    'perc_availability' => '90.0%',
                    'critical_items' => 3,
                ],
            ],
        ];
    @endphp

    <div class="mb-4 p-4 bg-green-50 border border-green-200 rounded-lg">
        <h3 class="text-lg font-bold text-green-800">Índice Geral de Abastecimento: 92.1%</h3>
        <p class="text-sm text-green-700">Meta da Secretaria: > 90%</p>
    </div>

    <x-export-table :config="$dispConfig" />
</x-layouts.report>