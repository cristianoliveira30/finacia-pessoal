<x-layouts.tv :title="__('Painel de Gestão Municipal')">
    {{-- Meta tag para atualizar a página a cada 30 segundos (Simulando TV ao vivo) --}}
    @push('head')
        <meta http-equiv="refresh" content="30">
        <style>
            /* Animação do Letreiro */
            .animate-marquee { animation: marquee 25s linear infinite; }
            @keyframes marquee {
                0% { transform: translateX(100%); }
                100% { transform: translateX(-100%); }
            }
        </style>
    @endpush

    {{-- Ajustei o grid para acomodar o rodapé (auto 1fr auto) --}}
    <div class="h-full grid grid-rows-[auto_1fr_auto] gap-6">
        
        {{-- KPIs do Topo --}}
        <section class="grid grid-cols-5 gap-2">
            <x-cards.box.box-tv-01 />
            <x-cards.box.box-tv-01 />
            <x-cards.box.box-tv-01 />
            <x-cards.box.box-tv-01 />
            <x-cards.box.box-tv-01 />
        </section>

        {{-- Área dos Gráficos --}}
        <section class="grid grid-cols-4 grid-rows-2 gap-6 h-full">
            @php
                // --- SAÚDE (Dados Dinâmicos com rand) ---
                $ocupacaoUPA = rand(60, 95); // Simula entre 60% e 95%
                $chartSaude01 = [
                    'x_label' => 'Status',
                    'categories' => ['Ocupado', 'Livre'],
                    'series' => [['name' => 'Leitos UPA', 'data' => [$ocupacaoUPA, 100 - $ocupacaoUPA]]],
                ];

                $casosDengue = rand(10, 50);
                $casosGripe = rand(40, 80);
                $casosCovid = rand(5, 20);
                $chartSaude02 = [
                    'x_label' => 'Doenças',
                    'categories' => ['Dengue', 'Gripe', 'Covid-19'],
                    'series' => [['name' => 'Casos Hoje', 'data' => [$casosDengue, $casosGripe, $casosCovid]]],
                ];

                // --- EDUCAÇÃO ---
                $presencaAlunos = rand(85, 98);
                $chartEducacao01 = [
                    'x_label' => 'Diário',
                    'categories' => ['Presentes', 'Ausentes'],
                    'series' => [['name' => 'Frequência', 'data' => [$presencaAlunos, 100 - $presencaAlunos]]],
                ];

                $chartEducacao02 = [
                    'x_label' => 'Nível',
                    'categories' => ['Creche', 'Fund. I', 'Fund. II'],
                    'series' => [['name' => 'Matrículas Novas', 'data' => [rand(5,15), rand(10,30), rand(5,20)]]],
                ];

                // --- FINANÇAS ---
                $chartFinancas01 = [
                    'x_label' => 'Impostos',
                    'categories' => ['IPTU', 'ISS', 'ITBI'],
                    'series' => [['name' => 'Arrecadação (mil)', 'data' => [rand(100,200), rand(80,150), rand(20,50)]]],
                ];

                $gastoFolha = rand(40, 48); // Limite prudencial LRF
                $chartFinancas02 = [
                    'x_label' => 'Despesas',
                    'categories' => ['Folha Pagto', 'Custeio', 'Investimento'],
                    'series' => [['name' => '% Orçamento', 'data' => [$gastoFolha, rand(30,40), rand(5,15)]]],
                ];
                
                // --- OBRAS / SOCIAL ---
                $chartObras = [
                    'x_label' => 'Status',
                    'categories' => ['No Prazo', 'Atrasadas', 'Concluídas'],
                    'series' => [['name' => 'Obras', 'data' => [rand(10,20), rand(1,5), rand(5,10)]]],
                ];

                $chartSocial = [
                    'x_label' => 'Benefícios',
                    'categories' => ['Cesta Básica', 'Auxílio', 'Aluguel Social'],
                    'series' => [['name' => 'Entregues', 'data' => [rand(50,100), rand(30,60), rand(10,20)]]],
                ];
            @endphp

            {{-- 
               DICA: Mantive seus componentes. 
               Se quiser mudar a cor do título baseado no valor, podemos fazer lógica aqui depois.
            --}}
            
            <x-cards.card-tv id="saude-01" title="Saúde: Ocupação UPA" :chart="$chartSaude01" chart-type="pie" />
            <x-cards.card-tv id="saude-02" title="Saúde: Vigilância" :chart="$chartSaude02" chart-type="pie" />
            
            <x-cards.card-tv id="edu-01" title="Educação: Frequência Hoje" :chart="$chartEducacao01" chart-type="pie" />
            <x-cards.card-tv id="edu-02" title="Educação: Novas Vagas" :chart="$chartEducacao02" chart-type="pie" />

            <x-cards.card-tv id="fin-01" title="Finanças: Arrecadação Dia" :chart="$chartFinancas01" chart-type="pie" />
            <x-cards.card-tv id="fin-02" title="Finanças: Execução Orç." :chart="$chartFinancas02" chart-type="pie" />

            <x-cards.card-tv id="obras-01" title="Infra: Status de Obras" :chart="$chartObras" chart-type="pie" />
            <x-cards.card-tv id="social-01" title="Social: Benefícios" :chart="$chartSocial" chart-type="pie" />
        </section>

        {{-- RODAPÉ: Letreiro de Notícias (Estilo CNN/GloboNews) --}}
        <div class="bg-blue-900 text-white rounded-lg flex items-center overflow-hidden h-12 shadow-lg border border-blue-700">
            <div class="bg-red-600 text-white font-black px-4 h-full flex items-center z-10 uppercase text-sm tracking-wider shadow-md">
                Ao Vivo
            </div>
            <div class="flex-1 overflow-hidden relative h-full flex items-center bg-blue-900">
                <div class="animate-marquee whitespace-nowrap absolute">
                    <span class="mx-8 font-semibold text-lg">📢 Campanha de Multivacinação atinge 90% da meta no município.</span>
                    <span class="mx-8 font-semibold text-lg text-yellow-300">⚠️ Defesa Civil alerta para chuvas intensas nas próximas 4 horas.</span>
                    <span class="mx-8 font-semibold text-lg">🏥 UPA Central operando com capacidade normal.</span>
                    <span class="mx-8 font-semibold text-lg">📚 Matrículas escolares abertas até o dia 30/01/2026.</span>
                </div>
            </div>
        </div>

    </div>
</x-layouts.tv>