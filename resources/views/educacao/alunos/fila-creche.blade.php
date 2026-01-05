<x-layouts.report title="Fila de Espera - Creches">
    @php
        $filaCrecheConfig = [
            'id' => 'fila-creche-table',
            'columns' => [
                ['key' => 'posicao', 'label' => 'Posição', 'align' => 'center'],
                ['key' => 'nome', 'label' => 'Criança'],
                ['key' => 'responsavel', 'label' => 'Responsável'],
                ['key' => 'data_inscricao', 'label' => 'Data Inscrição', 'align' => 'center'],
                ['key' => 'prioridade', 'label' => 'Critério Prioridade'],
            ],
            'rows' => [
                ['posicao' => '1º', 'nome' => 'Enzo Gabriel', 'responsavel' => 'Maria Oliveira', 'data_inscricao' => '10/01/2025', 'prioridade' => 'Mãe Trabalhadora'],
                ['posicao' => '2º', 'nome' => 'Valentina Dias', 'responsavel' => 'Joana Dias', 'data_inscricao' => '12/01/2025', 'prioridade' => 'Bolsa Família'],
                ['posicao' => '3º', 'nome' => 'Miguel Pereira', 'responsavel' => 'Carlos Pereira', 'data_inscricao' => '15/01/2025', 'prioridade' => 'Baixa Renda'],
            ],
        ];
    @endphp
    <x-export-table :config="$filaCrecheConfig" />
</x-layouts.report>