<x-layouts.app :title="__('Dashboard')">
    {{-- Ajustes realizados: --}}
    {{-- 1. sm:ml-16: Ajustado para a largura da sidebar fechada (64px) em vez de aberta (256px/ml-64). --}}
    {{-- 2. min-h-screen e flex/items-center: Para centralizar verticalmente na tela. --}}
    {{-- 3. padding-top mantido para não ficar atrás do header. --}}

    <!-- card exemplo -->
    <div class="w-full p-2 justify-center">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-2">
            <div class="md:col-span-1 ">
                <x-cards.box.month-card :config="[]" />
            </div>
            <div class="md:col-span-1">
                <x-cards.box.week-card :config="[]" />
            </div>
            <div class="md:col-span-1">
                <x-cards.box.week-card :config="[]" />
            </div>
            <div class="md:col-span-1">
                <x-cards.box.week-card :config="[]" />
            </div>
        </div>
    </div>

    {{-- teste --}}
    @php
        $chartData = [
            'categories' => ['01 Fev', '02 Fev', '03 Fev', '04 Fev', '05 Fev', '06 Fev', '07 Fev'],
            'series' => [
                ['name' => 'Loja Online', 'data' => [150, 141, 145, 152, 135, 125, 160]],
                ['name' => 'Loja Física', 'data' => [43, 13, 65, 12, 42, 73, 80]],
            ],
        ];
        $pieChartData = [
            'labels' => ['Desktop', 'Mobile', 'Tablet'],
            'series' => [60, 30, 10],
        ];
    @endphp

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-4">
        <x-cards.card id="relatorio-vendas" title="Vendas da Semana" :chart="$chartData" />

        {{-- Pizza --}}
        <x-cards.card id="relatorio-canais" title="Distribuição por canal" :chart="$pieChartData" chart-type="pie" />
    </div>
</x-layouts.app>
