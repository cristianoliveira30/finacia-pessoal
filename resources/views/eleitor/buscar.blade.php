<x-layouts.app :title="__('Visualizar Eleitor')">
    <div class="flex flex-col items-center justify-start w-full min-h-screen p-6 bg-gray-50 dark:bg-gray-900">

        <div class="w-full max-w-7xl">
            
            {{-- CABEÇALHO E BARRA DE AÇÕES --}}
            <div class="flex flex-col md:flex-row items-center justify-between mb-4 gap-4">
                <div>
                    <h2 class="text-xl font-bold text-gray-900 dark:text-white">Gerenciar Eleitores</h2>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Visualize e edite os registros do sistema.</p>
                </div>
                
                <div class="flex w-full md:w-auto gap-2">
                    <div class="relative w-full md:w-64">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                        </div>
                        <input type="text" id="table-search-eleitores" class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Buscar eleitor...">
                    </div>
                    
                    <a href="{{ route('eleitor/cadastro' )}}" class="text-gray-600 bg-primary-700 hover:bg-primary-800 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-gray-500/50 dark:hover:text-white focus:outline-2 focus:outline-offset-2 dark:focus:ring-primary-800 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                        Novo Eleitor
                    </a>
                </div>
            </div>

            {{-- TABELA --}}
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg border border-gray-200 dark:border-gray-700">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase dark:bg-slate-950 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="p-4">
                            </th>
                            <th scope="col" class="px-6 py-3">Nome Completo</th>
                            <th scope="col" class="px-6 py-3">CPF</th>
                            <th scope="col" class="px-6 py-3">WhatsApp</th>
                            <th scope="col" class="px-6 py-3">Zona / Seção</th>
                            <th scope="col" class="px-6 py-3">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="w-4 p-4">
                                <div class="flex items-center">
                                    <input id="table-checkbox-eleitor" type="checkbox" value="" class="w-4 h-4 text-primary-600 bg-gray-100 border-gray-300 rounded focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                </div>
                            </td>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">João da Silva</th>
                            <td class="px-6 py-4">123.456.789-00</td>
                            <td class="px-6 py-4">(91) 98888-7777</td>
                            <td class="px-6 py-4">025 / 0101</td>
                            <td class="px-6 py-4 flex gap-2">
                                <button type="button" data-modal-target="editEleitorModal" data-modal-toggle="editEleitorModal" class="font-medium text-primary-600 dark:text-primary-500 hover:underline">Editar</button>
                                <button type="button" class="font-medium text-red-600 dark:text-red-500 hover:underline">Excluir</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                
                {{-- PAGINAÇÃO COM DROPDOWN --}}
                <nav class="flex flex-col md:flex-row items-center justify-between p-4 gap-4 dark:bg-slate-950" aria-label="Table navigation">
                    <div class="flex flex-col sm:flex-row items-center gap-4 w-full md:w-auto">
                        <span class="text-sm font-normal text-gray-500 dark:text-gray-400 text-center sm:text-left">
                            Mostrando <span class="font-semibold text-gray-900 dark:text-white">1-10</span> de <span class="font-semibold text-gray-900 dark:text-white">1000</span>
                        </span>
                    </div>
                    <ul class="inline-flex -space-x-px rtl:space-x-reverse text-sm h-8">
                        <li>
                            <a href="#" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Anterior</a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Próximo</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        {{-- MODAL DE EDIÇÃO DE ELEITOR --}}
        <div id="editEleitorModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
            <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                    <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Editar Eleitor
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="editEleitorModal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Fechar</span>
                        </button>
                    </div>
                    <form action="#">
                        <div class="grid gap-4 mb-4 sm:grid-cols-2">
                            {{-- Nome --}}
                            <div class="sm:col-span-2">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome Completo</label>
                                <input type="text" name="name" id="name" value="João da Silva" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Nome do eleitor" required="">
                            </div>
                            
                            {{-- CPF --}}
                            <div>
                                <label for="cpf" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CPF</label>
                                <input type="text" name="cpf" id="cpf" value="123.456.789-00" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="000.000.000-00">
                            </div>
                            
                            {{-- Data Nascimento --}}
                            <div>
                                <label for="birth_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Data de Nascimento</label>
                                <input type="date" name="birth_date" id="birth_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            </div>

                            {{-- Telefone --}}
                            <div class="sm:col-span-2">
                                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">WhatsApp / Telefone</label>
                                <input type="tel" name="phone" id="phone" value="(91) 98888-7777" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="(00) 00000-0000">
                            </div>

                            {{-- Zona e Seção --}}
                            <div>
                                <label for="zone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Zona Eleitoral</label>
                                <input type="text" name="zone" id="zone" value="025" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            </div>
                            <div>
                                <label for="section" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seção</label>
                                <input type="text" name="section" id="section" value="0101" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            </div>
                        </div>
                        
                        <div class="flex items-center space-x-4">
                            <button type="submit" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:focus:outline-2 dark:focus:outline-offset-2 dark:focus:ring-primary-900 dark:hover:bg-gray-500/50 dark:text-gray-200 dark:hover:text-white">
                                Salvar Alterações
                            </button>
                            <button type="button" class="text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                                <svg class="mr-1 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                Excluir
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>