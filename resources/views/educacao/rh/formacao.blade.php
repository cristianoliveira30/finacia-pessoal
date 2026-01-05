<x-layouts.report title="Histórico de Formação Continuada">
    @php
        $formacaoConfig = [
            'id' => 'rh-formacao-table',
            'columns' => [
                ['key' => 'curso', 'label' => 'Nome do Curso / Capacitação'],
                ['key' => 'instituicao', 'label' => 'Instituição Ofertante'],
                ['key' => 'data', 'label' => 'Data Conclusão', 'align' => 'center'],
                ['key' => 'carga', 'label' => 'Carga Horária', 'align' => 'center'],
                ['key' => 'participantes', 'label' => 'Participantes (Qtd)', 'align' => 'center'],
                ['key' => 'status', 'label' => 'Certificação'],
            ],
            'rows' => [
                ['curso' => 'Alfabetização na Idade Certa', 'instituicao' => 'MEC / Plataforma Avamec', 'data' => '10/12/2024', 'carga' => '40h', 'participantes' => 45, 'status' => 'Emitida'],
                ['curso' => 'Inclusão Escolar e TEA', 'instituicao' => 'Secretaria Municipal', 'data' => '15/01/2025', 'carga' => '20h', 'participantes' => 60, 'status' => 'Em andamento'],
                ['curso' => 'Gestão Escolar Democrática', 'instituicao' => 'Undime', 'data' => '20/11/2024', 'carga' => '60h', 'participantes' => 12, 'status' => 'Emitida'],
            ],
        ];
    @endphp

    <x-export-table :config="$formacaoConfig" />
</x-layouts.report>