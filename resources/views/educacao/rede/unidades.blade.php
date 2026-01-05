<x-layouts.report title="Gestão Administrativa das Escolas">
    @php
        $unidadesConfig = [
            'id' => 'unidades-detalhes-table',
            'columns' => [
                ['key' => 'escola', 'label' => 'Unidade Escolar'],
                ['key' => 'diretor', 'label' => 'Diretor(a) Responsável'],
                ['key' => 'contato', 'label' => 'Telefone/Email'],
                ['key' => 'salas', 'label' => 'Salas de Aula', 'align' => 'center'],
                ['key' => 'situacao', 'label' => 'Situação do Alvará', 'align' => 'center'],
            ],
            'rows' => [
                ['escola' => 'EMEF Monteiro Lobato', 'diretor' => 'Ana Maria Braga', 'contato' => '(91) 98888-1234', 'salas' => 12, 'situacao' => 'Regular'],
                ['escola' => 'CMEI Pingo de Gente', 'diretor' => 'Carla Perez', 'contato' => '(91) 98888-5678', 'salas' => 6, 'situacao' => 'Pendente Bombeiros'],
                ['escola' => 'EMEF Tiradentes', 'diretor' => 'Tiririca Silva', 'contato' => '(91) 98888-9012', 'salas' => 8, 'situacao' => 'Regular'],
                ['escola' => 'Escola Técnica Municipal', 'diretor' => 'Fausto Silva', 'contato' => '(91) 99999-0000', 'salas' => 20, 'situacao' => 'Regular'],
            ],
        ];
    @endphp

    <x-export-table :config="$unidadesConfig" />
</x-layouts.report>