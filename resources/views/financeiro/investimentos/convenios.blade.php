<x-layouts.report title="Gestão de Convênios e Contrapartidas">
    @php
        $contrapartidasConfig = [
            'id' => 'invest-contrapartidas-table',
            'columns' => [
                ['key' => 'n_convenio', 'label' => 'Nº Convênio/SICONV', 'align' => 'center'],
                ['key' => 'objeto', 'label' => 'Objeto do Convênio'],
                ['key' => 'concedente', 'label' => 'Órgão Concedente'],
                ['key' => 'vigencia', 'label' => 'Vigência', 'align' => 'center'],
                ['key' => 'valor_global', 'label' => 'Valor Global', 'align' => 'right'],
                ['key' => 'repasse_uniao', 'label' => 'Vlr. Repasse', 'align' => 'right'],
                ['key' => 'contrapartida', 'label' => 'Contrapartida (Mun.)', 'align' => 'right'],
                ['key' => 'situacao', 'label' => 'Situação', 'align' => 'center'],
            ],
            'rows' => [
                [
                    'n_convenio' => '895544/2024',
                    'objeto' => 'Pavimentação Asfáltica Bairro Novo Horizonte',
                    'concedente' => 'MDR / Caixa',
                    'vigencia' => '31/12/2025',
                    'valor_global' => 'R$ 1.000.000,00',
                    'repasse_uniao' => 'R$ 950.000,00',
                    'contrapartida' => 'R$ 50.000,00',
                    'situacao' => 'Em Execução'
                ],
                [
                    'n_convenio' => '900123/2024',
                    'objeto' => 'Aquisição de Equipamentos Hospitalares',
                    'concedente' => 'Ministério da Saúde',
                    'vigencia' => '30/06/2025',
                    'valor_global' => 'R$ 500.000,00',
                    'repasse_uniao' => 'R$ 500.000,00',
                    'contrapartida' => 'R$ 0,00',
                    'situacao' => 'Aguardando Licitação'
                ],
            ],
        ];
    @endphp

    <x-export-table :config="$contrapartidasConfig" />
</x-layouts.report>