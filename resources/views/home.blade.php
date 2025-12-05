<x-layouts.app :title="__('Dashboard')">
    {{-- Ajustes realizados: --}}
    {{-- 1. sm:ml-16: Ajustado para a largura da sidebar fechada (64px) em vez de aberta (256px/ml-64). --}}
    {{-- 2. min-h-screen e flex/items-center: Para centralizar verticalmente na tela. --}}
    {{-- 3. padding-top mantido para não ficar atrás do header. --}}

    <!-- card exemplo -->
    <div class="w-full p-4 md:p-4">
        <div class="w-full max-w-2xl mx-auto">
            <div class="mb-3 w-full">
                <x-cards.box.default :config="[]" />
            </div>
        </div>
    </div>

    <div class="grid grid-cols-2 gap-3">
        <div class="col p-2">
            <x-cards.graph.default :config="[
                'value' => 12423,
                'value_prefix' => 'R$ ',
                'value_suffix' => '',
                'label' => 'Vendas desta semana',
                'variation' => 12,
                'variation_suffix' => '%',
                'date_range_label' => 'Últimos 7 dias',
                'ranges' => ['Hoje', 'Ontem', 'Últimos 7 dias', 'Últimos 30 dias'],
                'progress_label' => 'Relatório detalhado',
                'progress_url' => '#',
            
                'chart' => [
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
                ],
            ]" />
        </div>
    </div>
</x-layouts.app>
