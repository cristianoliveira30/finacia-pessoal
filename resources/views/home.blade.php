<x-layouts.app :title="__('Painel do Prefeito')">

    <div class="w-full min-h-screen pt-2 px-4 sm:px-4 lg:pl-16 space-y-4" data-page-ai>

        @php
            // Dados Mockados Ajustados para o Novo Contexto
            
            // 1. DTP (Gestão) - Valor percentual
            $dtpValor = 52.1; 
            
            // 2. Resultado Orçamentário (Finanças) - Valor em Milhões
            $resultadoFinanceiro = 24.9; 
            
            // 3. Índice Controle Interno (Pendências) - Valor percentual (Atendimento)
            $indiceControleInterno = 94; 
            
            // 4. NPS
            $nps = 48;
        @endphp

        <div class="pt-01">
            {{-- 1) KPIs Macro (Mainboxes com Tooltips Ricos) --}}
            <div class="grid grid-cols-1 md:grid-cols-4 gap-2 m-3 ">
                
                {{-- Gestão agora exibe DTP --}}
                <div class="md:col-span-1" id="wrapper-card-gestao">
                    <x-cards.box.mainbox id="gestao" :value="$dtpValor" />
                </div>
                
                {{-- Finanças agora exibe Resultado Orçamentário --}}
                <div class="md:col-span-1" id="wrapper-card-financas">
                    <x-cards.box.mainbox id="financas" :value="$resultadoFinanceiro" />
                </div>
                
                {{-- Pendências agora exibe Índice Controle Interno --}}
                <div class="md:col-span-1" id="wrapper-card-pendencias">
                    <x-cards.box.mainbox id="pendencias" :value="$indiceControleInterno" />
                </div>
                
                <div class="md:col-span-1" id="wrapper-card-nps">
                    <x-cards.box.mainbox id="nps" :value="$nps" />
                </div>
            </div>

            {{-- 2) KPIs por Setor (Miniboxes) --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-3 m-3 ">
                <x-cards.box.minibox id="fin_exec" />
                <x-cards.box.minibox id="fin_arr" />
                <x-cards.box.minibox id="saude_esp" />
                <x-cards.box.minibox id="saude_med" />
                <x-cards.box.minibox id="edu_freq" />
                <x-cards.box.minibox id="edu_vagas" />
            </div>

            {{-- 3) Gráficos (Mantidos) --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 m-3">
                @php
                    // Mantendo os dados de gráfico do passo anterior para evitar quebra
                     $chartIndice = ['x_label' => 'Mês','categories' => ['Jan', 'Jun'], 'series' => [['name' => 'Índice', 'data' => [62, 76]]]];
                     $chartDemandas = ['categories' => ['Saúde', 'Obras'], 'series' => [['name' => 'Demandas', 'data' => [35, 25]]], 'colors' => ['#ef4444', '#f59e0b']];
                     $chartPendencias = ['categories' => ['Finanças', 'Obras'], 'series' => [['name' => 'No Prazo', 'data' => [45, 30]], ['name' => 'Atrasadas', 'data' => [5, 12]]]];
                     $chartExecucao = ['categories' => ['Finanças', 'Obras'], 'series' => [['name' => 'Previsto', 'data' => [100, 100]], ['name' => 'Realizado', 'data' => [88, 72]]]];
                     $chartScoreSetor = ['categories' => ['Finanças', 'Saúde'], 'series' => [['name' => 'Score', 'data' => [82, 75]]]];
                @endphp
                
                <x-cards.card id="central-indice" title="Evolução da Gestão Fiscal" :chart="$chartIndice" chart-type="area" />
                <x-cards.card id="central-demandas" title="Demandas por Secretaria" :chart="$chartDemandas" chart-type="pie" />
                <x-cards.card id="central-pendencias" title="Controle Interno (Prazos)" :chart="$chartPendencias" chart-type="bar" />
                <x-cards.card id="central-execucao" title="Execução Orçamentária" :chart="$chartExecucao" chart-type="column" />
                <x-cards.card id="central-scores" title="Performance Setorial" :chart="$chartScoreSetor" chart-type="radial" />
            </div>
        </div>

    </div>

    @push('scripts')
        <script>
             document.addEventListener('DOMContentLoaded', function() { window.CardAI?.init?.(); });
        </script>
    @endpush
</x-layouts.app>