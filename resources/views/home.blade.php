<x-layouts.app :title="__('Dashboard')">
    {{-- Ajustes realizados: --}}
    {{-- 1. sm:ml-16: Ajustado para a largura da sidebar fechada (64px) em vez de aberta (256px/ml-64). --}}
    {{-- 2. min-h-screen e flex/items-center: Para centralizar verticalmente na tela. --}}
    {{-- 3. padding-top mantido para não ficar atrás do header. --}}

    <!-- card exemplo -->
    <div class="w-full p-2">
        <div class="w-full grid grid-cols-1 md:grid-cols-4 gap-2">
            <div class="md:col-span-2 ">
                <x-cards.box.default :config="[]" />
            </div>
            <div class="md:col-span-2">
                <x-cards.box.default :config="[]" />
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
    @endphp

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-4">
        <x-cards.card id="relatorio-vendas" title="Vendas da Semana" :chart="$chartData" />

        {{-- Exemplo sem totais, só gráfico --}}
        <x-cards.card id="relatorio-visitas" title="Tráfego do Site" :chart="$chartData" />
    </div>
</x-layouts.app>
