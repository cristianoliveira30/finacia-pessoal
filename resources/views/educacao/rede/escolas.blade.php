<x-layouts.report title="Rede Municipal de Ensino">
    @php
        $escolasConfig = [
            'id' => 'rede-escolas-table',
            'columns' => [
                ['key' => 'inep', 'label' => 'Cód. INEP', 'align' => 'center'],
                ['key' => 'nome', 'label' => 'Unidade Escolar'],
                ['key' => 'tipo', 'label' => 'Tipo', 'align' => 'center'],
                ['key' => 'bairro', 'label' => 'Bairro/Localidade'],
                ['key' => 'alunos', 'label' => 'Matriculados', 'align' => 'center'],
                ['key' => 'capacidade', 'label' => 'Capacidade', 'align' => 'center'],
            ],
            'rows' => [
                ['inep' => '12345678', 'nome' => 'EMEF Monteiro Lobato', 'tipo' => 'Fundamental', 'bairro' => 'Centro', 'alunos' => 450, 'capacidade' => 500],
                ['inep' => '87654321', 'nome' => 'CMEI Pingo de Gente', 'tipo' => 'Infantil (Creche)', 'bairro' => 'Jardim das Flores', 'alunos' => 120, 'capacidade' => 120],
                ['inep' => '11223344', 'nome' => 'EMEF Tiradentes', 'tipo' => 'Fundamental/EJA', 'bairro' => 'Zona Rural - Km 10', 'alunos' => 85, 'capacidade' => 150],
                ['inep' => '55667788', 'nome' => 'Escola Técnica Municipal', 'tipo' => 'Profissionalizante', 'bairro' => 'Distrito Industrial', 'alunos' => 300, 'capacidade' => 300],
            ],
        ];
    @endphp

    <x-export-table :config="$escolasConfig" />
</x-layouts.report>