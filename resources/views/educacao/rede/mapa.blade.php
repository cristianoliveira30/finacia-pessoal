<x-layouts.report title="Georreferenciamento das Unidades">
    <div class="bg-blue-50 border border-blue-200 p-4 rounded mb-4">
        <p class="text-sm text-blue-800">
            <strong>Dica:</strong> Exporte esta tabela para CSV para importar no Google Maps ou QGIS.
        </p>
    </div>

    @php
        $mapaConfig = [
            'id' => 'rede-mapa-table',
            'columns' => [
                ['key' => 'inep', 'label' => 'Cód. INEP', 'align' => 'center'],
                ['key' => 'nome', 'label' => 'Unidade Escolar'],
                ['key' => 'latitude', 'label' => 'Latitude'],
                ['key' => 'longitude', 'label' => 'Longitude'],
                ['key' => 'zona', 'label' => 'Zona', 'align' => 'center'],
                ['key' => 'rota', 'label' => 'Acesso Principal'],
            ],
            'rows' => [
                ['inep' => '12345678', 'nome' => 'EMEF Monteiro Lobato', 'latitude' => '-1.45502', 'longitude' => '-48.5024', 'zona' => 'Urbana', 'rota' => 'Av. Principal (Asfalto)'],
                ['inep' => '87654321', 'nome' => 'CMEI Pingo de Gente', 'latitude' => '-1.45889', 'longitude' => '-48.4900', 'zona' => 'Urbana', 'rota' => 'Rua das Flores (Paralelepípedo)'],
                ['inep' => '11223344', 'nome' => 'EMEF Tiradentes', 'latitude' => '-1.30005', 'longitude' => '-48.4000', 'zona' => 'Rural', 'rota' => 'Estrada do Ramal Km 10 (Terra)'],
            ],
        ];
    @endphp

    <x-export-table :config="$mapaConfig" />
</x-layouts.report>