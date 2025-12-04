<x-layouts.app :title="__('Dashboard')">
    {{-- Ajustes realizados: --}}
    {{-- 1. sm:ml-16: Ajustado para a largura da sidebar fechada (64px) em vez de aberta (256px/ml-64). --}}
    {{-- 2. min-h-screen e flex/items-center: Para centralizar verticalmente na tela. --}}
    {{-- 3. padding-top mantido para não ficar atrás do header. --}}

    <!-- card exemplo -->
    <div class="grid grid-cols-5 md:grid-cols-4 gap-3 justify-items-center">
        <div class="col p-2">
            <div
                class="dark:bg-indigo-500 dark:border-gray-900 bg-sky-200 block max-w-xs p-6 border border-default rounded-base shadow-xs">
                <h5 class="mb-2 text-l font-bold tracking-tight text-heading dark:text-slate-100">Welcome to the
                    Dashboard</h5>
                <p class="font-normal text-body dark:text-slate-300">This is your main dashboard where you can find an
                    overview of your activities and statistics.</p>
            </div>
        </div>
        <div class="col p-2">
            <div
                class="dark:bg-indigo-500 dark:border-gray-900 bg-sky-200 block max-w-xs p-6 border border-default rounded-base shadow-xs">
                <h5 class="mb-2 text-l font-bold tracking-tight text-heading dark:text-slate-100">Welcome to the
                    Dashboard</h5>
                <p class="font-normal text-body dark:text-slate-300">This is your main dashboard where you can find an
                    overview of your activities and statistics.</p>
            </div>
        </div>
        <div class="col p-2">
            <div
                class="dark:bg-indigo-500 dark:border-gray-900 bg-sky-200 block max-w-xs p-6 border border-default rounded-base shadow-xs">
                <h5 class="mb-2 text-l font-bold tracking-tight text-heading dark:text-slate-100">Welcome to the
                    Dashboard</h5>
                <p class="font-normal text-body dark:text-slate-300">This is your main dashboard where you can find an
                    overview of your activities and statistics.</p>
            </div>
        </div>
        <div class="col p-2">
            <div
                class="dark:bg-indigo-500 dark:border-gray-900 bg-sky-200 block max-w-xs p-6 border border-default rounded-base shadow-xs">
                <h5 class="mb-2 text-l font-bold tracking-tight text-heading dark:text-slate-100">Welcome to the
                    Dashboard</h5>
                <p class="font-normal text-body dark:text-slate-300">This is your main dashboard where you can find an
                    overview of your activities and statistics.</p>
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
