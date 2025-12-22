{{-- resources/views/educacao/home-educacao.blade.php --}}
<x-layouts.app :title="__('Dashboard Educação')">
    <div class="w-full min-h-screen pt-4 px-8 sm:px-4 lg:pl-16 space-y-4">
        @php
            // -----------------------------
            // KPIs Macro (topo) - dados fakes
            // -----------------------------
            $matriculasAtivas = 58420;         // alunos
            $frequenciaMedia = 92.6;           // %
            $evasaoAno = 2.4;                  // %
            $filaCreche = 1260;                // crianças
            $aprovacao = 89.1;                 // %
            $notaAprendizagem = 6.4;           // índice 0-10 (simulado)

            $matFmt = number_format($matriculasAtivas, 0, ',', '.');
            $freqFmt = number_format($frequenciaMedia, 1, ',', '.');
            $evasaoFmt = number_format($evasaoAno, 1, ',', '.');
            $filaFmt = number_format($filaCreche, 0, ',', '.');
            $aprovFmt = number_format($aprovacao, 1, ',', '.');
            $notaFmt = number_format($notaAprendizagem, 1, ',', '.');

            // -----------------------------
            // Módulos (score 0-100) - navegação rápida
            // -----------------------------
            $modulos = [
                'Rede Escolar' => [
                    'score' => 80,
                    'link'  => route('educacao.rede.escolas'),
                    'hint'  => '118 escolas | 9 distritos'
                ],
                'Alunos/Matrículas' => [
                    'score' => 77,
                    'link'  => route('educacao.matriculas.gestao'),
                    'hint'  => 'transferências: 312/mês'
                ],
                'Frequência' => [
                    'score' => 83,
                    'link'  => route('educacao.relatorios.frequencia'),
                    'hint'  => '92,6% média geral'
                ],
                'Merenda' => [
                    'score' => 74,
                    'link'  => route('educacao.merenda.estoque'),
                    'hint'  => 'rupturas: 3 itens'
                ],
                'Transporte' => [
                    'score' => 69,
                    'link'  => route('educacao.transporte.rotas'),
                    'hint'  => 'atrasos: 8% rotas'
                ],
                'FUNDEB' => [
                    'score' => 78,
                    'link'  => route('educacao.fundeb.indicadores'),
                    'hint'  => 'aplicação: 84%'
                ],
            ];

            // -----------------------------
            // GRÁFICOS - dados fakes coerentes
            // -----------------------------
            $meses = ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'];

            // (A) Área/Linha: Matrículas (entrada/saída) - variação mês a mês
            $chartMatriculas = [
                'x_label' => 'Mês',
                'categories' => $meses,
                'series' => [
                    ['name' => 'Entradas', 'data' => [420, 380, 510, 460, 390, 350, 310, 290, 330, 360, 410, 460]],
                    ['name' => 'Saídas',   'data' => [210, 190, 240, 220, 205, 180, 170, 165, 175, 185, 200, 215]],
                ],
            ];

            // (B) Barras: Frequência média por distrito (%)
            $chartFrequenciaDistrito = [
                'categories' => ['D1','D2','D3','D4','D5','D6','D7','D8','D9'],
                'series' => [
                    ['name' => 'Frequência (%)', 'data' => [93.4, 91.8, 92.6, 90.9, 94.1, 92.2, 93.0, 91.5, 92.8]],
                ],
            ];

            // (C) Pizza: Motivos de evasão (%)
            $chartEvasaoMotivos = [
                'x_label' => 'Motivo',
                'categories' => ['Mudança', 'Trabalho', 'Saúde', 'Desinteresse', 'Outros'],
                'series' => [
                    ['name' => 'Participação (%)', 'data' => [28, 22, 17, 21, 12]],
                ],
            ];

            // (D) Colunas: Aprendizagem por etapa (0-10)
            $chartAprendizagem = [
                'x_label' => 'Etapa',
                'categories' => ['Anos Iniciais', 'Anos Finais', 'EJA', 'Educação Infantil'],
                'series' => [
                    ['name' => 'Índice (0-10)', 'data' => [6.8, 6.1, 5.7, 6.5]],
                ],
            ];

            // (E) Barras: Fila de creche por bairro (top 8)
            $chartFilaCreche = [
                'categories' => ['Jurunas','Guamá','Terra Firme','Marambaia','Icoaraci','Sacramenta','Tapanã','Benguí'],
                'series' => [
                    ['name' => 'Fila (crianças)', 'data' => [180, 165, 150, 140, 135, 120, 110, 95]],
                ],
            ];

            // (F) Colunas: Merenda - estoque crítico (% itens abaixo do mínimo)
            $chartMerendaCritico = [
                'x_label' => 'Mês',
                'categories' => $meses,
                'series' => [
                    ['name' => 'Itens críticos (%)', 'data' => [6.0, 5.4, 4.9, 6.2, 7.1, 6.6, 5.8, 5.1, 4.7, 5.3, 6.0, 5.6]],
                ],
            ];

            // (G) Linha: Transporte - atrasos (% rotas)
            $chartTransporteAtraso = [
                'x_label' => 'Mês',
                'categories' => $meses,
                'series' => [
                    ['name' => 'Atraso (%)', 'data' => [9.1, 8.6, 8.2, 7.9, 8.4, 8.1, 7.6, 7.3, 7.5, 7.8, 8.0, 8.2]],
                ],
            ];

            // (H) Radial: Metas do mês (atingimento %)
            $chartMetas = [
                'categories' => ['Frequência', 'Evasão (meta)', 'Merenda (ruptura)', 'Transporte (atraso)', 'Aprendizagem'],
                'series' => [
                    ['name' => 'Atingimento (%)', 'data' => [93, 78, 81, 74, 86]],
                ],
            ];

            // (I) Barras: FUNDEB - aplicação (simulado)
            $chartFundeb = [
                'categories' => ['Receitas', 'Aplicado', 'Pessoal Magistério', 'Manutenção'],
                'series' => [
                    ['name' => '2025 (R$ mi)', 'data' => [210, 176, 128, 48]],
                ],
            ];
        @endphp

        {{-- 1) KPIs Macro (topo) --}}
        <div class="grid grid-cols-1 md:grid-cols-6 gap-2">
            <div class="md:col-span-1">
                <x-cards.box.box-02 :config="[
                    'link' => route('educacao.relatorios.matriculas'),
                    'prefix' => '',
                    'suffix' => '',
                    'label' => 'Matrículas Ativas',
                    'value' => $matFmt,
                    'text' => 'rede municipal'
                ]" />
            </div>

            <div class="md:col-span-1">
                <x-cards.box.box-01 :config="[
                    'link' => route('educacao.relatorios.frequencia'),
                    'prefix' => '',
                    'suffix' => '%',
                    'label' => 'Frequência Média',
                    'value' => $freqFmt,
                    'text' => 'presença no período'
                ]" />
            </div>

            <div class="md:col-span-1">
                <x-cards.box.box-02 :config="[
                    'link' => route('educacao.relatorios.evasao'),
                    'prefix' => '',
                    'suffix' => '%',
                    'label' => 'Evasão (Ano)',
                    'value' => $evasaoFmt,
                    'text' => 'estimativa anual'
                ]" />
            </div>

            <div class="md:col-span-1">
                <x-cards.box.box-01 :config="[
                    'link' => route('educacao.matriculas.fila_creche'),
                    'prefix' => '',
                    'suffix' => '',
                    'label' => 'Fila de Creche',
                    'value' => $filaFmt,
                    'text' => 'demanda reprimida'
                ]" />
            </div>

            <div class="md:col-span-1">
                <x-cards.box.box-02 :config="[
                    'link' => route('educacao.relatorios.aprendizagem'),
                    'prefix' => '',
                    'suffix' => '%',
                    'label' => 'Aprovação',
                    'value' => $aprovFmt,
                    'text' => 'média da rede'
                ]" />
            </div>

            <div class="md:col-span-1">
                <x-cards.box.box-01 :config="[
                    'link' => route('educacao.relatorios.aprendizagem'),
                    'prefix' => '',
                    'suffix' => '/10',
                    'label' => 'Índice Aprendizagem',
                    'value' => $notaFmt,
                    'text' => 'simulado (0-10)'
                ]" />
            </div>
        </div>

        {{-- 2) Módulos (score por área) --}}
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

        {{-- 3) Gráficos (ordem variada + mais gráficos) --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <x-cards.card id="edu-frequencia" title="Frequência Média por Distrito (%)" :chart="$chartFrequenciaDistrito" chart-type="bar" />

            <x-cards.card id="edu-matriculas" title="Fluxo de Matrículas (Entradas x Saídas)" :chart="$chartMatriculas" chart-type="area" />

            <x-cards.card id="edu-aprendizagem" title="Aprendizagem por Etapa (0-10)" :chart="$chartAprendizagem" chart-type="column" />

            <x-cards.card id="edu-evasao" title="Motivos de Evasão (%)" :chart="$chartEvasaoMotivos" chart-type="pie" />

            <x-cards.card id="edu-fila-creche" title="Fila de Creche (Top 8 Bairros)" :chart="$chartFilaCreche" chart-type="bar" />

            <x-cards.card id="edu-merenda" title="Merenda: Itens em Nível Crítico (%)" :chart="$chartMerendaCritico" chart-type="area" />

            <x-cards.card id="edu-transporte" title="Transporte: Rotas com Atraso (%)" :chart="$chartTransporteAtraso" chart-type="area" />

            <x-cards.card id="edu-fundeb" title="FUNDEB (Resumo Simulado)" :chart="$chartFundeb" chart-type="bar" />

            <x-cards.card id="edu-metas" title="Metas do Mês (Atingimento %)" :chart="$chartMetas" chart-type="radial" />
        </div>
    </div>
</x-layouts.app>
