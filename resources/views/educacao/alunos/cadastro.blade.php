<x-layouts.report title="Novo Aluno">
    {{-- Card Container: Adicionado dark:bg-slate-800 e dark:border --}}
    <div class="bg-white dark:bg-slate-800 p-6 rounded-lg shadow-sm border border-transparent dark:border-slate-700">
        
        {{-- Título: text-gray-700 -> dark:text-gray-100 --}}
        <h2 class="text-lg font-semibold mb-4 text-gray-700 dark:text-gray-100">Ficha de Matrícula</h2>
        
        <form action="#" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @csrf
            
            {{-- Divisor de Seção: Border e Text ajustados --}}
            <div class="col-span-2">
                <h3 class="text-sm font-bold text-gray-500 dark:text-gray-400 uppercase border-b dark:border-gray-700 mb-3 pb-1">
                    Dados Pessoais
                </h3>
            </div>

            {{-- Campo Nome --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nome Completo</label>
                <input type="text" 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2 border
                              dark:bg-slate-900 dark:border-slate-600 dark:text-white dark:placeholder-gray-400" 
                       placeholder="Ex: João da Silva">
            </div>

            {{-- Campo Data --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Data de Nascimento</label>
                {{-- Adicionado [color-scheme:light] dark:[color-scheme:dark] para o ícone do calendário ficar correto --}}
                <input type="date" 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2 border
                              dark:bg-slate-900 dark:border-slate-600 dark:text-white dark:[color-scheme:dark]">
            </div>

            {{-- Campo CPF --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">CPF</label>
                <input type="text" 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2 border
                              dark:bg-slate-900 dark:border-slate-600 dark:text-white dark:placeholder-gray-400" 
                       placeholder="000.000.000-00">
            </div>

            {{-- Campo Mãe --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nome da Mãe</label>
                <input type="text" 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2 border
                              dark:bg-slate-900 dark:border-slate-600 dark:text-white dark:placeholder-gray-400">
            </div>

            {{-- Botões --}}
            <div class="col-span-2 flex justify-end gap-2 mt-4">
                {{-- Botão Cancelar: bg-gray-200 -> dark:bg-slate-700 --}}
                <button type="button" 
                        class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 
                               dark:bg-slate-700 dark:text-gray-200 dark:hover:bg-slate-600 transition-colors">
                    Cancelar
                </button>
                
                {{-- Botão Salvar: Mantido azul, apenas ajustado hover se necessário --}}
                <button type="submit" 
                        class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 
                               dark:hover:bg-blue-500 transition-colors">
                    Salvar Cadastro
                </button>
            </div>
        </form>
    </div>
</x-layouts.report>