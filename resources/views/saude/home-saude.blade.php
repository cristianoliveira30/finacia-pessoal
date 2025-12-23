{{-- resources/views/saude/home-saude.blade.php --}}
<x-layouts.app :title="__('Dashboard Saúde')">
    <div class="w-full min-h-screen pt-4 px-8 sm:px-4 lg:pl-16 space-y-6">

        {{-- 1) Componente Unificado (KPIs + Módulos) --}}
        <x-cards.box.diretorias id="saude" />

        @php
            // -----------------------------
            // GRÁFICOS - dados fakes coerentes
            // -----------------------------

            // (A) Linha/Área: Atendimentos por dia (últimos 14 dias)
            $dias = ['D-13','D-12','D-11','D-10','D-9','D-8','D-7','D-6','D-5','D-4','D-3','D-2','D-1','Hoje'];
            $chartAtendDia = [
                'x_label' => 'Dia',
                'categories' => $dias,
                'series' => [
                    ['name' => 'UBS (APS)', 'data' => [6800, 7020, 6950, 7100, 7350, 7480, 7600, 7420, 7580, 7700, 7900, 8120, 7980, 8250]],
                    ['name' => 'UPA/Emergência', 'data' => [2100, 1980, 2050, 2200, 2300, 2250, 2400, 2350, 2280, 2500, 2460, 2550, 2600, 2680]],
                ],
            ];

            // (B) Barras: Tempo médio de espera por unidade (min)
            $chartEsperaUnidade = [
                'categories' => ['UBS Marambaia','UBS Jurunas','UBS Icoaraci','UPA Sacramenta','UPA Icoaraci','Hospital Municipal'],
                'series' => [
                    ['name' => 'Espera (min)', 'data' => [32, 41, 36, 58, 62, 45]],
                ],
            ];

            // (C) Pizza: Classificação de risco (Urgência)
            $chartClassificacao = [
                'x_label' => 'Risco',
                'categories' => ['Vermelho', 'Amarelo', 'Verde', 'Azul'],
                'series' => [
                    ['name' => 'Participação (%)', 'data' => [6, 22, 54, 18]],
                ],
            ];

            // (D) Colunas: Cobertura vacinal por campanha (%)
            $chartCoberturaCampanha = [
                'x_label' => 'Campanha',
                'categories' => ['Influenza', 'Covid', 'Tríplice Viral', 'HPV', 'Polio'],
                'series' => [
                    ['name' => 'Cobertura (%)', 'data' => [79.5, 84.2, 91.1, 76.8, 88.4]],
                ],
            ];

            // (E) Barras: Fila de regulação (Consultas x Exames)
            $chartFilaRegulacao = [
                'categories' => ['Cardio', 'Ortopedia', 'Oftalmo', 'Endócrino', 'USG', 'Ressonância', 'Tomografia', 'Eco'],
                'series' => [
                    ['name' => 'Consultas (fila)', 'data' => [420, 610, 540, 380, 0, 0, 0, 0]],
                    ['name' => 'Exames (fila)',    'data' => [0, 0, 0, 0, 720, 460, 510, 200]],
                ],
            ];

            // (F) Colunas: Disponibilidade por categoria de medicamento (%)
            $chartDispMedicamentos = [
                'x_label' => 'Categoria',
                'categories' => ['Antibióticos', 'Hipertensão', 'Diabetes', 'Analgésicos', 'Saúde Mental', 'Insumos'],
                'series' => [
                    ['name' => 'Disponibilidade (%)', 'data' => [89, 96, 93, 97, 85, 92]],
                ],
            ];

            // (G) Linha: No-show (faltas) % por mês
            $meses = ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'];
            $chartNoShow = [
                'x_label' => 'Mês',
                'categories' => $meses,
                'series' => [
                    ['name' => 'No-show (%)', 'data' => [12.1, 11.5, 11.9, 12.4, 13.2, 12.8, 12.0, 11.7, 11.9, 12.6, 13.0, 12.3]],
                ],
            ];

            // (H) Radial: Metas do mês (exemplo)
            $chartMetas = [
                'categories' => ['Cobertura Vacinal', 'Disp. Medicamentos', 'Tempo Espera (meta)', 'SLA Regulação (meta)'],
                'series' => [
                    ['name' => 'Atingimento (%)', 'data' => [87, 92, 76, 68]],
                ],
            ];
        @endphp

        {{-- 2) Gráficos --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <x-cards.card id="saude-atend-dia" title="Atendimentos por Dia (APS x Urgência)" :chart="$chartAtendDia" chart-type="area" />
            <x-cards.card id="saude-espera" title="Tempo Médio de Espera por Unidade (min)" :chart="$chartEsperaUnidade" chart-type="bar" />
            <x-cards.card id="saude-classificacao" title="Classificação de Risco (Urgência)" :chart="$chartClassificacao" chart-type="pie" />
            <x-cards.card id="saude-regulacao" title="Fila da Regulação (Consultas x Exames)" :chart="$chartFilaRegulacao" chart-type="bar" />
            <x-cards.card id="saude-cobertura" title="Cobertura Vacinal por Campanha (%)" :chart="$chartCoberturaCampanha" chart-type="column" />
            <x-cards.card id="saude-medicamentos" title="Disponibilidade por Categoria de Medicamentos (%)" :chart="$chartDispMedicamentos" chart-type="column" />
            <x-cards.card id="saude-noshow" title="No-show (Faltas em Consultas) (%)" :chart="$chartNoShow" chart-type="area" />
            <x-cards.card id="saude-metas" title="Metas do Mês (Atingimento %)" :chart="$chartMetas" chart-type="radial" />
        </div>
    </div>
</x-layouts.app>