<x-layouts.report title="Planejamento de Cardápio Semanal">
    <div class="flex justify-between items-center mb-4 bg-orange-50 p-3 rounded border border-orange-200">
        <span class="font-bold text-orange-800">Semana: 05/01 a 11/01</span>
        <button class="text-xs bg-white border border-orange-300 px-3 py-1 rounded hover:bg-orange-100">Imprimir para Cozinhas</button>
    </div>

    @php
        $cardapioConfig = [
            'id' => 'cardapio-table',
            'columns' => [
                ['key' => 'dia', 'label' => 'Dia da Semana', 'align' => 'left'],
                ['key' => 'refeicao', 'label' => 'Tipo Refeição'],
                ['key' => 'descricao', 'label' => 'Descrição do Prato'],
                ['key' => 'nutricional', 'label' => 'Obs. Nutricional'],
                ['key' => 'faixa', 'label' => 'Faixa Etária'],
            ],
            'rows' => [
                ['dia' => 'Segunda-feira', 'refeicao' => 'Merenda', 'descricao' => 'Arroz com Frango e Cenoura + Suco de Acerola', 'nutricional' => 'Rico em Vitamina A', 'faixa' => 'Fundamental'],
                ['dia' => 'Segunda-feira', 'refeicao' => 'Colação (Manhã)', 'descricao' => 'Mingau de Aveia com Banana', 'nutricional' => 'Fibras', 'faixa' => 'Creche'],
                ['dia' => 'Terça-feira', 'refeicao' => 'Merenda', 'descricao' => 'Macarronada com Carne Moída + Maçã', 'nutricional' => 'Carboidrato + Proteína', 'faixa' => 'Geral'],
                ['dia' => 'Quarta-feira', 'refeicao' => 'Merenda', 'descricao' => 'Feijoada Light (Legumes) + Laranja', 'nutricional' => 'Ferro', 'faixa' => 'Geral'],
            ],
        ];
    @endphp

    <x-export-table :config="$cardapioConfig" />
</x-layouts.report>