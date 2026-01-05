<x-layouts.report title="Cronograma Físico-Financeiro de Obras">
    @php
        $cronogramaConfig = [
            'id' => 'obras-cronograma-table',
            'columns' => [
                ['key' => 'obra', 'label' => 'Obra / Projeto'],
                ['key' => 'inicio', 'label' => 'Início Previsto', 'align' => 'center'],
                ['key' => 'fim', 'label' => 'Fim Previsto', 'align' => 'center'],
                ['key' => 'percentual', 'label' => '% Concluído', 'align' => 'center'],
                ['key' => 'proxima_etapa', 'label' => 'Próxima Medição'],
                ['key' => 'status', 'label' => 'Andamento'],
            ],
            'rows' => [
                ['obra' => 'Reforma EMEF Monteiro', 'inicio' => '01/12/2024', 'fim' => '28/02/2025', 'percentual' => '45%', 'proxima_etapa' => 'Instalação Elétrica', 'status' => 'No Prazo'],
                ['obra' => 'Construção Quadra CMEI', 'inicio' => '10/01/2025', 'fim' => '10/06/2025', 'percentual' => '0%', 'proxima_etapa' => 'Terraplanagem', 'status' => 'A Iniciar'],
                ['obra' => 'Pintura Geral Escolas Rurais', 'inicio' => '01/11/2024', 'fim' => '30/12/2024', 'percentual' => '95%', 'proxima_etapa' => 'Entrega Final', 'status' => 'Atrasado'],
            ],
        ];
    @endphp

    <x-export-table :config="$cronogramaConfig" />
</x-layouts.report>