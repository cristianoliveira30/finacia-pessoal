<x-layouts.report title="Buscar Alunos">
    <div class="bg-gray-50 p-4 rounded-lg mb-6 border border-gray-200">
        <form class="flex gap-4 items-end">
            <div class="flex-1">
                <label class="block text-xs font-medium text-gray-500">Nome ou CPF</label>
                <input type="text" class="w-full rounded border-gray-300 p-2" placeholder="Digite para buscar...">
            </div>
            <div class="w-48">
                <label class="block text-xs font-medium text-gray-500">Escola</label>
                <select class="w-full rounded border-gray-300 p-2">
                    <option>Todas</option>
                    <option>EMEF Monteiro Lobato</option>
                </select>
            </div>
            <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Filtrar</button>
        </form>
    </div>

    @php
        $buscaAlunosConfig = [
            'id' => 'busca-alunos-table',
            'columns' => [
                ['key' => 'matricula', 'label' => 'Matrícula', 'align' => 'center'],
                ['key' => 'nome', 'label' => 'Nome do Aluno'],
                ['key' => 'turma', 'label' => 'Turma/Ano'],
                ['key' => 'escola', 'label' => 'Escola Atual'],
                ['key' => 'status', 'label' => 'Situação', 'align' => 'center'],
            ],
            'rows' => [
                ['matricula' => '2024001', 'nome' => 'Ana Clara Souza', 'turma' => '5º Ano B', 'escola' => 'EMEF Monteiro Lobato', 'status' => 'Cursando'],
                ['matricula' => '2024045', 'nome' => 'Bruno Alves', 'turma' => '3º Ano A', 'escola' => 'EMEF Tiradentes', 'status' => 'Transferido'],
                ['matricula' => '2024099', 'nome' => 'Carlos Eduardo', 'turma' => 'Berçário II', 'escola' => 'CMEI Pingo de Gente', 'status' => 'Cursando'],
            ],
        ];
    @endphp

    <x-export-table :config="$buscaAlunosConfig" />
</x-layouts.report>