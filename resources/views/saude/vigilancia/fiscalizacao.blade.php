<x-layouts.report :title="'Vigilância - Fiscalização Sanitária'">
    @php
        $fiscalizacaoConfig = [
            'id' => 'vigilancia-fiscalizacao-table',
            'columns' => [
                ['key' => 'establishment', 'label' => 'Estabelecimento', 'align' => 'left'],
                ['key' => 'district', 'label' => 'Bairro/Região', 'align' => 'left'],
                ['key' => 'activity', 'label' => 'Ramo de Atividade', 'align' => 'center'],
                ['key' => 'inspection_date', 'label' => 'Data Inspeção', 'align' => 'center'],
                ['key' => 'result', 'label' => 'Resultado', 'align' => 'center'],
            ],
            'rows' => [
                [
                    'establishment' => 'Supermercado Preço Bom',
                    'district' => 'Centro',
                    'activity' => 'Alimentos',
                    'inspection_date' => '02/01/2026',
                    'result' => 'Aprovado com Restrições',
                ],
                [
                    'establishment' => 'Farmácia Saúde Total',
                    'district' => 'Zona Norte',
                    'activity' => 'Medicamentos',
                    'inspection_date' => '03/01/2026',
                    'result' => 'Aprovado',
                ],
                [
                    'establishment' => 'Restaurante Sabor Caseiro',
                    'district' => 'Industrial',
                    'activity' => 'Alimentos',
                    'inspection_date' => '04/01/2026',
                    'result' => 'Interditado (Risco Iminente)',
                ],
            ],
        ];
    @endphp

    <x-export-table :config="$fiscalizacaoConfig" />
</x-layouts.report>