<x-layouts.report title="Indicadores de Conformidade Legal (FUNDEB)">
    @php
        $indicadoresConfig = [
            'id' => 'fundeb-indicadores-table',
            'columns' => [
                ['key' => 'indicador', 'label' => 'Indicador Legal'],
                ['key' => 'meta', 'label' => 'Meta Legal (Min/Max)', 'align' => 'center'],
                ['key' => 'atual', 'label' => 'Índice Atual', 'align' => 'center'],
                ['key' => 'diferenca', 'label' => 'Diferença ($)', 'type' => 'currency'],
                ['key' => 'situacao', 'label' => 'Situação'],
            ],
            'rows' => [
                ['indicador' => 'Mínimo 70% com Profissionais da Educação', 'meta' => 'Mín. 70%', 'atual' => '72.5%', 'diferenca' => 0.00, 'situacao' => 'Regular (OK)'],
                ['indicador' => 'Máximo 30% com Despesas Gerais', 'meta' => 'Máx. 30%', 'atual' => '20.0%', 'diferenca' => 0.00, 'situacao' => 'Regular (OK)'],
                ['indicador' => 'Aplicação Mínima Anual (25% Receita Total)', 'meta' => 'Mín. 25%', 'atual' => '24.8%', 'diferenca' => -15000.00, 'situacao' => 'Alerta (Abaixo)'],
            ],
        ];
    @endphp

    <x-export-table :config="$indicadoresConfig" />
</x-layouts.report>