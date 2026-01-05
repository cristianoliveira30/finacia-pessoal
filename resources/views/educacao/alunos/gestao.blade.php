<x-layouts.report title="Movimentação de Matrículas (Últimos 30 dias)">
    @php
        $gestaoMatriculaConfig = [
            'id' => 'gestao-matriculas-table',
            'columns' => [
                ['key' => 'data', 'label' => 'Data Mov.', 'align' => 'center'],
                ['key' => 'aluno', 'label' => 'Nome do Aluno'],
                ['key' => 'tipo', 'label' => 'Tipo Movimentação'],
                ['key' => 'origem_destino', 'label' => 'Origem / Destino'],
                ['key' => 'usuario', 'label' => 'Realizado por'],
            ],
            'rows' => [
                ['data' => '04/01/2025', 'aluno' => 'Lucas Gabriel', 'tipo' => 'Nova Matrícula', 'origem_destino' => 'Rede Privada -> EMEF Monteiro', 'usuario' => 'Sec. João'],
                ['data' => '03/01/2025', 'aluno' => 'Mariana Ximenes', 'tipo' => 'Transferência Interna', 'origem_destino' => 'EMEF Tiradentes -> EMEF Monteiro', 'usuario' => 'Dir. Ana'],
                ['data' => '02/01/2025', 'aluno' => 'Pedro Bial', 'tipo' => 'Abandono', 'origem_destino' => 'EJA Noturno', 'usuario' => 'Sistema'],
            ],
        ];
    @endphp

    <x-export-table :config="$gestaoMatriculaConfig" />
</x-layouts.report>