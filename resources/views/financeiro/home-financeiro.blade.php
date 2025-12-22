{{-- resources/views/financeiro/home-financeiro.blade.php --}}
<x-layouts.app :title="__('Dashboard Financeiro')">
    <div class="w-full min-h-screen pt-4 px-8 sm:px-4 lg:pl-16 space-y-4">
        @php
            // -----------------------------
            // KPIs Macro (topo)
            // -----------------------------
            $execucaoOrcamentaria = 76.4; // %
            $saldoCaixaMi = 128.6; // R$ mi
            $resultadoPrimarioMi = 24.9; // R$ mi (superávit)
            $pessoalRcl = 49.2; // % (limite LRF 54)

            // formatações (seu box não formata automaticamente)
            $saldoCaixaFmt = number_format($saldoCaixaMi, 1, ',', '.');
            $resultadoFmt = number_format($resultadoPrimarioMi, 1, ',', '.');
            $execucaoFmt = number_format($execucaoOrcamentaria, 1, ',', '.');
            $pessoalFmt = number_format($pessoalRcl, 1, ',', '.');

            // -----------------------------
            // "Módulos" do Financeiro (cards de navegação)
            // -----------------------------
            $modulos = [
                'Receitas' => ['score' => 81, 'link' => route('financeiro.receitas.arrecadacao'), 'hint' => 'Própria 32% | Transferências 68%'],
                'Despesas' => ['score' => 73, 'link' => route('financeiro.despesas.empenhos'), 'hint' => 'Empenhado 68% | Pago 52%'],
                'Tesouraria' => ['score' => 77, 'link' => route('financeiro.tesouraria.saldos'), 'hint' => 'Caixa D+90: confortável'],
                'Orçamento' => ['score' => 79, 'link' => route('financeiro.orcamento.loa'), 'hint' => 'Créditos adicionais: 6,3%'],
                'Investimentos' => ['score' => 69, 'link' => route('financeiro.investimentos.capex'), 'hint' => 'CAPEX executado 41%'],
                'LRF & Compliance' => ['score' => 80, 'link' => route('financeiro.lrf.pessoal'), 'hint' => 'Sem alertas críticos'],
            ];

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

            // (E) Radial: Compliance (quanto % do limite já usado) — menor é melhor em alguns itens, mas aqui é só demo
            $chartCompliance = [
                'categories' => ['Pessoal/RCL', 'Mín. Saúde', 'Mín. Educação', 'Dívida/RCL'],
                'series' => [
                    ['name' => 'Uso do limite (%)', 'data' => [49.2, 15.8, 26.4, 7.1]],
                ],
            ];
        @endphp

        {{-- 1) KPIs Macro (4 boxes no topo) --}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-2">
            <div class="md:col-span-1">
                <x-cards.box.box-02 :config="[
                    'link' => route('financeiro.orcamento.loa'),
                    'prefix' => '',
                    'suffix' => '%',
                    'label' => 'Execução Orçamentária',
                    'value' => $execucaoFmt,
                    'text' => 'realizado / previsto (ano)'
                ]" />
            </div>

            <div class="md:col-span-1">
                <x-cards.box.box-01 :config="[
                    'link' => route('financeiro.tesouraria.saldos'),
                    'prefix' => 'R$ ',
                    'suffix' => ' mi',
                    'label' => 'Saldo em Caixa',
                    'value' => $saldoCaixaFmt,
                    'text' => 'tesouraria (consolidado)'
                ]" />
            </div>

            <div class="md:col-span-1">
                <x-cards.box.box-02 :config="[
                    'link' => route('financeiro.relatorios.rx_d'),
                    'prefix' => 'R$ ',
                    'suffix' => ' mi',
                    'label' => 'Resultado Primário',
                    'value' => $resultadoFmt,
                    'text' => 'superávit no período'
                ]" />
            </div>

            <div class="md:col-span-1">
                <x-cards.box.box-01 :config="[
                    'link' => route('financeiro.lrf.pessoal'),
                    'prefix' => '',
                    'suffix' => '%',
                    'label' => 'Pessoal / RCL',
                    'value' => $pessoalFmt,
                    'text' => 'limite LRF: 54%'
                ]" />
            </div>
        </div>

        {{-- 2) “Módulos” do Financeiro (1 box por área interna) --}}
        <div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-6 gap-2">
            @foreach ($modulos as $nome => $meta)
                <div>
                    <x-cards.box.box-01 :config="[
                        'link' => $meta['link'],
                        'prefix' => '',
                        'suffix' => '/100',
                        'label' => $nome,
                        'value' => $meta['score'],
                        'text' => $meta['hint']
                    ]" />
                </div>
            @endforeach
        </div>

        {{-- 3) Gráficos (painel financeiro) --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <x-cards.card id="fin-rx-d" title="Receitas x Despesas (R$ mi)" :chart="$chartReceitaDespesa" chart-type="area" />
            <x-cards.card id="fin-rec-fontes" title="Composição de Receita (%)" :chart="$chartComposicaoReceita" chart-type="pie" />
            <x-cards.card id="fin-exec-funcao" title="Empenhos / Liquidações / Pagamentos (Comparativo)" :chart="$chartELP" chart-type="column" />
            <x-cards.card id="fin-elp" title="Execução por Função (Previsto x Realizado)" :chart="$chartExecucaoFuncao" chart-type="bar" />
            <x-cards.card id="fin-compliance" title="Compliance (Uso do limite %)" :chart="$chartCompliance" chart-type="radial" />
        </div>
    </div>
</x-layouts.app>
