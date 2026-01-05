<x-layouts.report title="Relação de Pagamentos Efetuados">
    @php
        $config = [
            'id' => 'despesas-pagamentos-table',
            'columns' => [
                ['key' => 'data', 'label' => 'Data Pagto', 'align' => 'center'],
                ['key' => 'ordem', 'label' => 'Nº O.B.', 'align' => 'center'],
                ['key' => 'empenho', 'label' => 'Empenho Ref.', 'align' => 'center'],
                ['key' => 'favorecido', 'label' => 'Favorecido'],
                ['key' => 'fonte', 'label' => 'Fonte Rec.', 'align' => 'center'],
                ['key' => 'valor', 'label' => 'Valor Pago', 'align' => 'right'],
            ],
            'rows' => [
                ['data' => '10/01/2025', 'ordem' => '99881', 'empenho' => '250/2025', 'favorecido' => 'Posto de Gasolina Modelo', 'fonte' => '1500', 'valor' => 'R$ 5.340,50'],
                ['data' => '10/01/2025', 'ordem' => '99882', 'empenho' => '251/2025', 'favorecido' => 'Construtora Exemplo', 'fonte' => '1700', 'valor' => 'R$ 45.000,00'],
            ],
        ];
    @endphp
    <x-export-table :config="$config" />
</x-layouts.report>