<x-layouts.report title="Acompanhamento FUNDEB">
    @php
        $fundebConfig = [
            'id' => 'fundeb-receitas-table',
            'columns' => [
                ['key' => 'mes', 'label' => 'Mês Ref.', 'align' => 'center'],
                ['key' => 'origem', 'label' => 'Origem do Recurso'],
                ['key' => 'data_credito', 'label' => 'Data Crédito', 'align' => 'center'],
                ['key' => 'valor', 'label' => 'Valor Recebido', 'type' => 'currency'],
                ['key' => 'acumulado', 'label' => 'Acumulado Ano', 'type' => 'currency'],
            ],
            'rows' => [
                ['mes' => 'Janeiro', 'origem' => 'Transferência FUNDEB (União)', 'data_credito' => '10/01/2025', 'valor' => 1250000.00, 'acumulado' => 1250000.00],
                ['mes' => 'Janeiro', 'origem' => 'ICMS (Estado)', 'data_credito' => '15/01/2025', 'valor' => 450000.00, 'acumulado' => 1700000.00],
                ['mes' => 'Janeiro', 'origem' => 'FPM (União)', 'data_credito' => '20/01/2025', 'valor' => 320000.00, 'acumulado' => 2020000.00],
            ],
        ];
    @endphp

    <div class="mb-4 grid grid-cols-3 gap-4">
        <div class="bg-blue-100 p-4 rounded text-center">
            <h3 class="text-sm text-blue-800">Mínimo 70% (Professores)</h3>
            <p class="text-2xl font-bold text-blue-900">72.5%</p>
        </div>
        <div class="bg-green-100 p-4 rounded text-center">
            <h3 class="text-sm text-green-800">Saldo em Conta</h3>
            <p class="text-2xl font-bold text-green-900">R$ 450.200,50</p>
        </div>
        <div class="bg-yellow-100 p-4 rounded text-center">
            <h3 class="text-sm text-yellow-800">Total Receitas (Ano)</h3>
            <p class="text-2xl font-bold text-yellow-900">R$ 2.020.000,00</p>
        </div>
    </div>

    <x-export-table :config="$fundebConfig" />
</x-layouts.report>