<x-layouts.report title="Cronograma Físico-Financeiro de Obras">
    @php
        $config = [
            'id' => 'invest-cronograma-table',
            'columns' => [
                ['key' => 'obra', 'label' => 'Obra/Projeto'],
                ['key' => 'fase', 'label' => 'Etapa/Fase'],
                ['key' => 'previsao', 'label' => 'Data Prevista', 'align' => 'center'],
                ['key' => 'peso', 'label' => 'Peso (%)', 'align' => 'center'],
                ['key' => 'realizado', 'label' => '% Realizado', 'align' => 'center'],
                ['key' => 'valor_medido', 'label' => 'Valor Medido', 'align' => 'right'],
            ],
            'rows' => [
                ['obra' => 'Reforma Mercado Municipal', 'fase' => 'Demolição', 'previsao' => '15/02/2025', 'peso' => '10%', 'realizado' => '100%', 'valor_medido' => 'R$ 25.000'],
                ['obra' => 'Reforma Mercado Municipal', 'fase' => 'Alvenaria', 'previsao' => '30/03/2025', 'peso' => '30%', 'realizado' => '10%', 'valor_medido' => 'R$ 15.000'],
            ],
        ];
    @endphp
    <x-export-table :config="$config" />
</x-layouts.report>