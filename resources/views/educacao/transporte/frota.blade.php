<x-layouts.report title="Frota do Transporte Escolar">
    @php
        $frotaConfig = [
            'id' => 'frota-table',
            'columns' => [
                ['key' => 'placa', 'label' => 'Placa / Prefixo', 'align' => 'center'],
                ['key' => 'modelo', 'label' => 'Modelo / Marca'],
                ['key' => 'ano', 'label' => 'Ano Fab.', 'align' => 'center'],
                ['key' => 'propriedade', 'label' => 'Propriedade'],
                ['key' => 'situacao', 'label' => 'Situação Mecânica'],
                ['key' => 'venc_vistoria', 'label' => 'Vistoria DETRAN', 'align' => 'center'],
            ],
            'rows' => [
                ['placa' => 'ABC-1234 (BUS-01)', 'modelo' => 'Marcopolo Volare', 'ano' => '2022', 'propriedade' => 'Próprio (Caminho da Escola)', 'situacao' => 'Operacional', 'venc_vistoria' => '10/06/2025'],
                ['placa' => 'XYZ-9988 (VAN-03)', 'modelo' => 'Renault Master', 'ano' => '2019', 'propriedade' => 'Terceirizado (Empresa X)', 'situacao' => 'Em Manutenção', 'venc_vistoria' => '01/02/2025'],
                ['placa' => 'QWER-7777 (BUS-02)', 'modelo' => 'Mercedes Benz OF-1519', 'ano' => '2024', 'propriedade' => 'Próprio', 'situacao' => 'Operacional', 'venc_vistoria' => '12/12/2025'],
            ],
        ];
    @endphp

    <x-export-table :config="$frotaConfig" />
</x-layouts.report>