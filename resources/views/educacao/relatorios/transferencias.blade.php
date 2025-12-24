<x-layouts.report>
    @php
        $tableConfig = [
            'id' => 'table-transferencias',
            'columns' => [
                ['key' => 'request_date', 'label' => 'Data Solicitação', 'align' => 'center'],
                ['key' => 'student_name', 'label' => 'Nome do Aluno'],
                ['key' => 'origin', 'label' => 'Escola de Origem'],
                ['key' => 'destination', 'label' => 'Escola de Destino'],
                ['key' => 'status', 'label' => 'Status', 'align' => 'center'],
            ],
            'rows' => [
                ['request_date' => '01/12/2025', 'student_name' => 'João Silva', 'origin' => 'E.M. Monteiro Lobato', 'destination' => 'E.M. Paulo Freire', 'status' => 'Concluída'],
                ['request_date' => '03/12/2025', 'student_name' => 'Maria Oliveira', 'origin' => 'Rede Privada', 'destination' => 'C.M.EI. Girassol', 'status' => 'Em Análise'],
                ['request_date' => '05/12/2025', 'student_name' => 'Pedro Santos', 'origin' => 'E.M. Cecília Meireles', 'destination' => 'Mudança de Cidade', 'status' => 'Expedido'],
            ]
        ];
    @endphp
    <x-export-table :config="$tableConfig" />
</x-layouts.report>