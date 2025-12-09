<x-layouts.app :title="__('Dashboard')">

    {{-- Wrapper geral do conteúdo da página --}}
    <div class="w-full min-h-screen pt-4 px-8 sm:px-4 lg:pl-16 space-y-4">
        <!-- cards de cima -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-2">
            <div class="md:col-span-1">
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

        @php
            $chartData = [
                'x_label' => 'Data',
                'categories' => ['01 Fev', '02 Fev', '03 Fev', '04 Fev', '05 Fev', '06 Fev', '07 Fev'],
                'series' => [
                    ['name' => 'Loja Online', 'data' => [150, 141, 145, 152, 135, 125, 160]],
                    ['name' => 'Loja Física', 'data' => [43, 13, 65, 12, 42, 73, 80]],
                ],
            ];

            $pieChartData = [
                'x_label'   => 'Canal',
                'categories'=> ['Desktop', 'Mobile', 'Outros'],
                'series'    => [
                    ['name' => 'Percentual', 'data' => [60, 30, 10]],
                ],
            ];

            $columnChartData = [
                'x_label'   => 'Dia',
                'categories'=> ['Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
                'series'    => [
                    ['name' => 'Orgânico', 'data' => [231, 122, 63, 421, 122, 323, 111]],
                    ['name' => 'Social media', 'data' => [232, 113, 341, 224, 522, 411, 243]],
                ],
            ];

            $barChartData = [
                'categories'=> ['Jul', 'Aug', 'Sep', 'Out', 'Nov', 'Dez'],
                'series'    => [
                    ['name' => 'Income',  'data' => [1420, 1620, 1820, 1420, 1650, 2120]],
                    ['name' => 'Expense', 'data' => [788, 810, 866, 788, 1100, 1200]],
                ],
            ];

            $radialChartData = [
                ['name' => 'To do',       'data' => [90]],
                ['name' => 'In progress', 'data' => [85]],
                ['name' => 'Done',        'data' => [70]],
            ];
        @endphp

        {{-- grid dos gráficos --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <x-cards.card id="relatorio-vendas" title="Vendas da Semana" :chart="$chartData" />

            <x-cards.card id="relatorio-canais" title="Distribuição por Canal"
                :chart="$pieChartData" chart-type="pie" />

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-4">
        <x-cards.card id="progresso-time" title="Progresso do Time" :chart="$radialChartData" chart-type="radial" />

            <x-cards.card id="relatorio-mes" title="Distribuição por Mês"
                :chart="$barChartData" chart-type="bar" />

        <x-cards.card id="relatorio-vendas" title="Vendas da Semana" :chart="$chartData" />

        <x-cards.card id="relatorio-dias" title="Distribuição por Dia" :chart="$columnChartData" chart-type="column" />

        <x-cards.card id="relatorio-mes" title="Distribuição por Mês" :chart="$barChartData" chart-type="bar" />
    </div>

</x-layouts.app>
