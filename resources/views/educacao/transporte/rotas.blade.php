<x-layouts.report title="Gestão de Rotas - Transporte Escolar">
    @php
        $transporteConfig = [
            'id' => 'transporte-rotas-table',
            'columns' => [
                ['key' => 'codigo', 'label' => 'Cód. Rota', 'align' => 'center'],
                ['key' => 'itinerario', 'label' => 'Itinerário / Região'],
                ['key' => 'motorista', 'label' => 'Motorista'],
                ['key' => 'veiculo', 'label' => 'Veículo/Placa'],
                ['key' => 'km', 'label' => 'Km Diário', 'align' => 'center'],
                ['key' => 'turno', 'label' => 'Turno'],
            ],
            'rows' => [
                ['codigo' => 'R-01', 'itinerario' => 'Fazenda Boa Vista -> Centro', 'motorista' => 'Sr. João', 'veiculo' => 'Ônibus Amarelo (ABC-1234)', 'km' => '45km', 'turno' => 'Matutino'],
                ['codigo' => 'R-02', 'itinerario' => 'Vila Nova -> EMEF Tiradentes', 'motorista' => 'Dona Maria', 'veiculo' => 'Van Escolar (XYZ-9876)', 'km' => '12km', 'turno' => 'Integral'],
                ['codigo' => 'R-03', 'itinerario' => 'Rota Universitária (Noturna)', 'motorista' => 'Pedro Santos', 'veiculo' => 'Micro-ônibus (DEF-5678)', 'km' => '80km', 'turno' => 'Noturno'],
            ],
        ];
    @endphp

    <x-export-table :config="$transporteConfig" />
</x-layouts.report>