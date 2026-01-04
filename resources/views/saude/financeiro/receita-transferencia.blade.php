<x-layouts.report :title="'Financeiro - Receitas SUS / Transferências'">
    @php
        $receitaConfig = [
            'id' => 'financeiro-receita-table',
            'columns' => [
                ['key' => 'source', 'label' => 'Fonte do Recurso', 'align' => 'left'],
                ['key' => 'nature', 'label' => 'Natureza', 'align' => 'left'],
                ['key' => 'date', 'label' => 'Data Crédito', 'align' => 'center'],
                ['key' => 'value', 'label' => 'Valor Creditado', 'type' => 'currency'],
                ['key' => 'destination', 'label' => 'Destinação (Bloco)', 'align' => 'left'],
            ],
            'rows' => [
                [
                    'source' => 'Fundo Nacional de Saúde (FNS)',
                    'nature' => 'PAB Fixo (Custeio)',
                    'date' => '10/01/2026',
                    'value' => 1250000.00,
                    'destination' => 'Atenção Primária',
                ],
                [
                    'source' => 'Tesouro Estadual',
                    'nature' => 'Cofinanciamento UPA',
                    'date' => '12/01/2026',
                    'value' => 500000.00,
                    'destination' => 'Média e Alta Complexidade',
                ],
                [
                    'source' => 'Emenda Parlamentar',
                    'nature' => 'Emenda Indiv. 4552',
                    'date' => '05/01/2026',
                    'value' => 300000.00,
                    'destination' => 'Investimento (Equipamentos)',
                ],
                [
                    'source' => 'Royalties do Petróleo',
                    'nature' => 'Compensação Financeira',
                    'date' => '15/01/2026',
                    'value' => 120000.00,
                    'destination' => 'Saúde Geral (Livre)',
                ],
            ],
        ];
    @endphp

    <x-export-table :config="$receitaConfig" />
</x-layouts.report>