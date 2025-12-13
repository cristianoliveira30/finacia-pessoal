<x-layouts.tv :title="__('Modo Tv')">
    <div class="h-full grid grid-rows-[auto_1fr] gap-8">
        <section class="grid grid-cols-5 gap-6">
            <x-cards.box.box-01 />
            <x-cards.box.box-01 />
            <x-cards.box.box-01 />
            <x-cards.box.box-01 />
            <x-cards.box.box-01 />
        </section>

        <section class="grid grid-cols-4 grid-rows-4 gap-6 h-full">
            @php
                // Pizza: origem/canal de entrada do atendimento
                $pieChartData01 = [
                    'x_label' => 'Canal',
                    'categories' => ['Presencial', 'Telefone', 'Portal/App'],
                    'series' => [['name' => 'Percentual', 'data' => [35, 25, 40]]],
                ];
                $pieChartData02 = [
                    'x_label' => 'Canal',
                    'categories' => ['Presencial', 'Telefone', 'Portal/App'],
                    'series' => [['name' => 'Percentual', 'data' => [35, 25, 40]]],
                ];
                $pieChartData03 = [
                    'x_label' => 'Canal',
                    'categories' => ['Presencial', 'Telefone', 'Portal/App'],
                    'series' => [['name' => 'Percentual', 'data' => [35, 25, 40]]],
                ];
                $pieChartData04 = [
                    'x_label' => 'Canal',
                    'categories' => ['Presencial', 'Telefone', 'Portal/App'],
                    'series' => [['name' => 'Percentual', 'data' => [35, 25, 40]]],
                ];
                $pieChartData05 = [
                    'x_label' => 'Canal',
                    'categories' => ['Presencial', 'Telefone', 'Portal/App'],
                    'series' => [['name' => 'Percentual', 'data' => [35, 25, 40]]],
                ];
                $pieChartData06 = [
                    'x_label' => 'Canal',
                    'categories' => ['Presencial', 'Telefone', 'Portal/App'],
                    'series' => [['name' => 'Percentual', 'data' => [35, 25, 40]]],
                ];
                $pieChartData07 = [
                    'x_label' => 'Canal',
                    'categories' => ['Presencial', 'Telefone', 'Portal/App'],
                    'series' => [['name' => 'Percentual', 'data' => [35, 25, 40]]],
                ];
                $pieChartData08 = [
                    'x_label' => 'Canal',
                    'categories' => ['Presencial', 'Telefone', 'Portal/App'],
                    'series' => [['name' => 'Percentual', 'data' => [35, 25, 40]]],
                ];
            @endphp

            <x-cards.card id="relatorio-teste-01" title="Entrada por Canal" :chart="$pieChartData01" chart-type="pie" />

            <x-cards.card id="relatorio-teste-02" title="Entrada por Canal" :chart="$pieChartData02" chart-type="pie" />

            <x-cards.card id="relatorio-teste-03" title="Entrada por Canal" :chart="$pieChartData03" chart-type="pie" />

            <x-cards.card id="relatorio-teste-04" title="Entrada por Canal" :chart="$pieChartData04" chart-type="pie" />

            <x-cards.card id="relatorio-teste-05" title="Entrada por Canal" :chart="$pieChartData05" chart-type="pie" />

            <x-cards.card id="relatorio-teste-06" title="Entrada por Canal" :chart="$pieChartData06" chart-type="pie" />

            <x-cards.card id="relatorio-teste-07" title="Entrada por Canal" :chart="$pieChartData07" chart-type="pie" />

            <x-cards.card id="relatorio-teste-08" title="Entrada por Canal" :chart="$pieChartData08" chart-type="pie" />
        </section>
    </div>
</x-layouts.tv>
