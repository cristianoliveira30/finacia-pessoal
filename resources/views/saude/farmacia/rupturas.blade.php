<x-layouts.report :title="'Farmácia - Rupturas (Faltas)'">
    @php
        $rupturasConfig = [
            'id' => 'farmacia-rupturas-table',
            'columns' => [
                ['key' => 'code', 'label' => 'Cód. CATMAT', 'align' => 'center'],
                ['key' => 'medicine', 'label' => 'Medicamento / Insumo', 'align' => 'left'],
                ['key' => 'group', 'label' => 'Grupo', 'align' => 'left'],
                ['key' => 'days_out', 'label' => 'Dias sem Estoque', 'align' => 'center'],
                ['key' => 'avg_consumption', 'label' => 'Consumo Médio/Mês', 'align' => 'center'],
                ['key' => 'status_purchase', 'label' => 'Status Compra', 'align' => 'left'],
            ],
            'rows' => [
                [
                    'code' => 'BR01239',
                    'medicine' => 'Dipirona Sódica 500mg/ml',
                    'group' => 'Analgésicos',
                    'days_out' => 5,
                    'avg_consumption' => '15.000 frascos',
                    'status_purchase' => 'Empenhado - Aguardando Entrega',
                ],
                [
                    'code' => 'BR04510',
                    'medicine' => 'Losartana Potássica 50mg',
                    'group' => 'Anti-hipertensivos',
                    'days_out' => 12,
                    'avg_consumption' => '40.000 comp',
                    'status_purchase' => 'Em Licitação (Pregão 04/26)',
                ],
                [
                    'code' => 'BR00122',
                    'medicine' => 'Amoxicilina 500mg',
                    'group' => 'Antibióticos',
                    'days_out' => 2,
                    'avg_consumption' => '8.500 caps',
                    'status_purchase' => 'Estoque Crítico - Pedido Emergencial',
                ],
            ],
        ];
    @endphp

    <x-export-table :config="$rupturasConfig" />
</x-layouts.report>