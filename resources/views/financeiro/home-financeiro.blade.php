{{-- resources/views/financeiro/home-financeiro.blade.php --}}
<x-layouts.app :title="__('Dashboard Financeiro')">
    <div class="w-full min-h-screen pt-4 px-8 sm:px-4 lg:pl-16 space-y-6">

        {{-- 1) Componente Unificado (KPIs + Módulos) --}}
        <x-cards.box.diretorias id="financeiro" />

        @php
            // -----------------------------
            // GRÁFICOS (dados fakes coerentes)
            // -----------------------------
            $months = ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'];

            // (A) Área/Linha: Receita x Despesa (R$ mi)
            $chartReceitaDespesa = [
                'x_label' => 'Mês',
                'categories' => $months,
                'series' => [
                    ['name' => 'Receitas (R$ mi)', 'data' => [92, 88, 95, 101, 97, 104, 108, 103, 110, 112, 109, 115]],
                    ['name' => 'Despesas (R$ mi)', 'data' => [86, 84, 90, 96, 94, 99, 101, 98, 104, 106, 105, 109]],
                ],
            ];

            // (B) Pizza: Composição de Receita (%)
            $chartComposicaoReceita = [
                'x_label' => 'Fonte',
                'categories' => ['Própria', 'Transferências', 'Convênios', 'Outras'],
                'series' => [
                    ['name' => 'Participação (%)', 'data' => [32, 55, 9, 4]],
                ],
            ];

            // (C) Colunas: Execução por Função (Previsto x Realizado) em R$ mi
            $chartExecucaoFuncao = [
                'x_label' => 'Função',
                'categories' => ['Saúde', 'Educação', 'Infraestrutura', 'Administração', 'Assistência', 'Segurança'],
                'series' => [
                    ['name' => 'Previsto (R$ mi)',  'data' => [180, 210, 140, 120, 80, 60]],
                    ['name' => 'Realizado (R$ mi)', 'data' => [156, 188, 92, 101, 63, 49]],
                ],
            ];

            // (D) Barras: ELP (Empenhos / Liquidações / Pagamentos) comparativo
            $chartELP = [
                'categories' => ['Empenhado', 'Liquidado', 'Pago'],
                'series' => [
                    ['name' => '2024 (R$ mi)', 'data' => [980, 905, 850]],
                    ['name' => '2025 (R$ mi)', 'data' => [1040, 960, 890]],
                ],
            ];

            // (E) Radial: Compliance (quanto % do limite já usado)
            $chartCompliance = [
                'categories' => ['Pessoal/RCL', 'Mín. Saúde', 'Mín. Educação', 'Dívida/RCL'],
                'series' => [
                    ['name' => 'Uso do limite (%)', 'data' => [49.2, 15.8, 26.4, 7.1]],
                ],
            ];
        @endphp

        {{-- 2) Gráficos --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <x-cards.card id="fin-rx-d" title="Receitas x Despesas (R$ mi)" :chart="$chartReceitaDespesa" chart-type="area" />
            <x-cards.card id="fin-rec-fontes" title="Composição de Receita (%)" :chart="$chartComposicaoReceita" chart-type="pie" />
            <x-cards.card id="fin-exec-funcao" title="Empenhos / Liquidações / Pagamentos (Comparativo)" :chart="$chartELP" chart-type="column" />
            <x-cards.card id="fin-elp" title="Execução por Função (Previsto x Realizado)" :chart="$chartExecucaoFuncao" chart-type="bar" />
            <x-cards.card id="fin-compliance" title="Compliance (Uso do limite %)" :chart="$chartCompliance" chart-type="radial" />
        </div>
    </div>
</x-layouts.app>