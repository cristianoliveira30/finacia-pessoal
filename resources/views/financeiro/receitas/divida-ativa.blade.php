<x-layouts.report title="Relatório de Dívida Ativa">
    @php
        $config = [
            'id' => 'receitas-divida-ativa-table',
            'columns' => [
                ['key' => 'contribuinte', 'label' => 'Contribuinte'],
                ['key' => 'inscricao', 'label' => 'Nº Inscrição', 'align' => 'center'],
                ['key' => 'origem', 'label' => 'Origem (IPTU/ISS)'],
                ['key' => 'ano', 'label' => 'Ano Débito', 'align' => 'center'],
                ['key' => 'valor_principal', 'label' => 'Valor Principal', 'align' => 'right'],
                ['key' => 'juros_multa', 'label' => 'Juros/Multa', 'align' => 'right'],
                ['key' => 'total', 'label' => 'Total Devido', 'align' => 'right'],
            ],
            'rows' => [
                ['contribuinte' => 'João da Silva', 'inscricao' => '001/2023', 'origem' => 'IPTU', 'ano' => '2023', 'valor_principal' => 'R$ 500,00', 'juros_multa' => 'R$ 50,00', 'total' => 'R$ 550,00'],
            ],
        ];
    @endphp
    <x-export-table :config="$config" />
</x-layouts.report>