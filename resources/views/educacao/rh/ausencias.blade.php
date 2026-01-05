<x-layouts.report title="Controle de Frequência e Afastamentos">
    @php
        $ausenciasConfig = [
            'id' => 'rh-ausencias-table',
            'columns' => [
                ['key' => 'servidor', 'label' => 'Servidor'],
                ['key' => 'lotacao', 'label' => 'Lotação'],
                ['key' => 'tipo', 'label' => 'Tipo Afastamento'],
                ['key' => 'periodo', 'label' => 'Período', 'align' => 'center'],
                ['key' => 'status', 'label' => 'Substituição', 'align' => 'center'],
            ],
            'rows' => [
                ['servidor' => 'Prof. Raimundo', 'lotacao' => 'EMEF Monteiro Lobato', 'tipo' => 'Licença Médica (15 dias)', 'periodo' => '01/01 a 15/01', 'status' => 'Coberta (Prof. Substituto)'],
                ['servidor' => 'Merendeira Sônia', 'lotacao' => 'CMEI Pingo de Gente', 'tipo' => 'Falta Justificada', 'periodo' => '02/01', 'status' => 'Não necessária'],
                ['servidor' => 'Vigia Carlos', 'lotacao' => 'Almoxarifado Central', 'tipo' => 'Licença Prêmio', 'periodo' => 'Jan/2025', 'status' => 'Sem cobertura'],
            ],
        ];
    @endphp

    <x-export-table :config="$ausenciasConfig" />
</x-layouts.report>