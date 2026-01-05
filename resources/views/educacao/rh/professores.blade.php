<x-layouts.report title="Quadro de Professores">
    @php
        $rhConfig = [
            'id' => 'rh-professores-table',
            'columns' => [
                ['key' => 'matricula', 'label' => 'Matrícula', 'align' => 'center'],
                ['key' => 'nome', 'label' => 'Servidor'],
                ['key' => 'cargo', 'label' => 'Cargo/Função'],
                ['key' => 'lotacao', 'label' => 'Lotação Atual'],
                ['key' => 'vinculo', 'label' => 'Vínculo', 'align' => 'center'],
            ],
            'rows' => [
                ['matricula' => '9901', 'nome' => 'Roberto Carlos', 'cargo' => 'Prof. Matemática', 'lotacao' => 'EMEF Monteiro Lobato', 'vinculo' => 'Efetivo'],
                ['matricula' => '9905', 'nome' => 'Erasmo Silva', 'cargo' => 'Prof. História', 'lotacao' => 'EMEF Tiradentes', 'vinculo' => 'Contratado (PSS)'],
                ['matricula' => '9910', 'nome' => 'Wanderléa Souza', 'cargo' => 'Pedagoga', 'lotacao' => 'Secretaria de Educação', 'vinculo' => 'Comissionado'],
            ],
        ];
    @endphp

    <x-export-table :config="$rhConfig" />
</x-layouts.report>