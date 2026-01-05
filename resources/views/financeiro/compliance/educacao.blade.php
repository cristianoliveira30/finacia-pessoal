<x-layouts.report title="Compliance: Manutenção e Desenvolvimento do Ensino (MDE)">
    @php
        $config = [
            'id' => 'compliance-educacao-table',
            'columns' => [
                ['key' => 'bimestre', 'label' => 'Bimestre', 'align' => 'center'],
                ['key' => 'receita_base', 'label' => 'Receita Base (Impostos)', 'align' => 'right'],
                ['key' => 'minimo_25', 'label' => 'Mínimo (25%)', 'align' => 'right'],
                ['key' => 'aplicado_mde', 'label' => 'Aplicado MDE', 'align' => 'right'],
                ['key' => 'perc_mde', 'label' => '% MDE', 'align' => 'center'],
                ['key' => 'aplicado_fundeb', 'label' => 'Min. 70% Fundeb', 'align' => 'right'],
                ['key' => 'perc_fundeb', 'label' => '% Fundeb', 'align' => 'center'],
            ],
            'rows' => [
                ['bimestre' => '1º Bimestre', 'receita_base' => 'R$ 20.000.000', 'minimo_25' => 'R$ 5.000.000', 'aplicado_mde' => 'R$ 5.200.000', 'perc_mde' => '26.0%', 'aplicado_fundeb' => 'R$ 3.000.000', 'perc_fundeb' => '75.0%'],
            ],
        ];
    @endphp
    <x-export-table :config="$config" />
</x-layouts.report>