<x-layouts.app :title="__('Dashboard')">
    {{-- Ajustes realizados: --}}
    {{-- 1. sm:ml-16: Ajustado para a largura da sidebar fechada (64px) em vez de aberta (256px/ml-64). --}}
    {{-- 2. min-h-screen e flex/items-center: Para centralizar verticalmente na tela. --}}
    {{-- 3. padding-top mantido para não ficar atrás do header. --}}

    <!-- card exemplo -->
    <div class="w-full p-2">
        <div class="w-full grid grid-cols-4 gap-2">
            <div class="col-span-2">
                <x-cards.box.default :config="[]"/>
            </div>
            <div class="col-span-2">
                <x-cards.box.default :config="[]"/>
            </div>
        </div>
    </div>

    {{-- teste --}}
    @php
        $chart = [
            'categories' => ['01 Fev', '02 Fev', '03 Fev', '04 Fev', '05 Fev', '06 Fev', '07 Fev'],
            'series' => [
                [
                    'name' => 'Loja Online',
                    'data' => [150, 141, 145, 152, 135, 125, 160],
                ],
                [
                    'name' => 'Loja Física',
                    'data' => [43, 13, 65, 12, 42, 73, 80],
                ],
            ],
        ];
    @endphp
    <div class="grid grid-cols-2 gap-3">
        <div class="col p-2">
            <x-cards.default id="teste-card" title="Relatório de Testes" :chart="$chart"  />
        </div>
    </div>
</x-layouts.app>
