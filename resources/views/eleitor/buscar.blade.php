<x-layouts.app :title="__('Visualizar Eleitor')">
    <div class="flex flex-col items-center justify-start w-full min-h-screen p-6 transition-colors duration-300">

        <div class="w-full max-w-7xl">
            
            {{-- CABEÇALHO E BARRA DE AÇÕES --}}
            <div class="flex flex-col gap-4 mb-6">
                
                {{-- Título e Botão Novo --}}
                <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                    <div>
                        <h2 class="text-xl font-bold text-slate-900 dark:text-white">Gerenciar Eleitores</h2>
                        <p class="text-sm text-slate-500 dark:text-slate-400">Visualize e edite os registros do sistema.</p>
                    </div>
                    
                    <a href="{{ route('eleitor/cadastro' )}}" class="text-gray-600 bg-primary-700 hover:bg-primary-800 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-gray-500/50 dark:hover:text-white focus:outline-2 focus:outline-offset-2 dark:focus:ring-primary-800 flex items-center gap-2 shadow-sm transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                        Novo Eleitor
                    </a>
                </div>

                {{-- CARD DE PESQUISA E FILTROS --}}
                <div class="p-4 bg-white border border-slate-200 rounded-xl shadow-sm dark:border-slate-700 sm:p-6 dark:bg-gray-800 transition-colors duration-300">
                    <div class="flex items-center gap-2 mb-4">
                        <svg class="w-5 h-5 text-indigo-500 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        <h3 class="text-lg font-medium text-slate-900 dark:text-white">Pesquisar Eleitores</h3>
                    </div>

                    <form action="#" method="GET">
                        <div class="flex flex-col md:flex-row gap-3">
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-slate-400 dark:text-slate-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                                </div>
                                <input type="text" name="name" class="bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-lg shadow-sm focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 p-2.5 dark:bg-gray-900 dark:border-slate-600 dark:placeholder-slate-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500 transition-colors" placeholder="Digite o nome completo do eleitor">
                            </div>

                            <div class="flex gap-2 shrink-0">
                                <button type="button" class="p-2.5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-red-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-700 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-600 transition-colors" title="Limpar Filtros">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                                
                                <button type="button" onclick="toggleFilter('filterContainer', 'filterButton')" id="filterButton" class="p-2.5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-700 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-600 transition-all" title="Filtros Avançados">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>
                                </button>

                                <button type="submit" class="p-2.5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-600 dark:bg-gray-700 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 transition-all">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                </button>
                            </div>
                        </div>

                        {{-- ÁREA EXPANSÍVEL --}}
                        <div id="filterContainer" class="hidden mt-4 border-t border-slate-100 dark:border-slate-700 pt-4 transition-all duration-300 ease-in-out">
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                                {{-- LINHA 1 --}}
                                <div>
                                    <label class="block mb-1.5 text-sm font-medium text-slate-700 dark:text-slate-300">CEP</label>
                                    <input type="text" name="zip_code" class="bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-lg shadow-sm focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-900 dark:border-slate-600 dark:placeholder-slate-400 dark:text-white" placeholder="00000-000">
                                </div>
                                <div>
                                    <label class="block mb-1.5 text-sm font-medium text-slate-700 dark:text-slate-300">Data Início</label>
                                    <input type="date" name="date_start" class="bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-lg shadow-sm focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-900 dark:border-slate-600 dark:placeholder-slate-400 dark:text-white">
                                </div>
                                <div>
                                    <label class="block mb-1.5 text-sm font-medium text-slate-700 dark:text-slate-300">Data Fim</label>
                                    <input type="date" name="date_end" class="bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-lg shadow-sm focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-900 dark:border-slate-600 dark:placeholder-slate-400 dark:text-white">
                                </div>
                                <div>
                                    <label class="block mb-1.5 text-sm font-medium text-slate-700 dark:text-slate-300">Status</label>
                                    <select name="action_status" class="bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-lg shadow-sm focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-900 dark:border-slate-600 dark:placeholder-slate-400 dark:text-white">
                                        <option value="">Selecione...</option>
                                        <option value="AG">Aguardando</option>
                                        <option value="AT">Atendido</option>
                                    </select>
                                </div>

                                {{-- LINHA 2 --}}
                                <div>
                                    <label class="block mb-1.5 text-sm font-medium text-slate-700 dark:text-slate-300">CPF</label>
                                    <input type="text" name="cpf" class="bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-lg shadow-sm focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-900 dark:border-slate-600 dark:placeholder-slate-400 dark:text-white" placeholder="000.000.000-00">
                                </div>
                                <div class="col-span-1 md:col-span-2">
                                    <label class="block mb-1.5 text-sm font-medium text-slate-700 dark:text-slate-300">Bairro</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg class="w-4 h-4 text-slate-400 dark:text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                                        </div>
                                        <input type="text" name="neighborhood" class="bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-lg shadow-sm focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 pl-10 dark:bg-gray-900 dark:border-slate-600 dark:placeholder-slate-400 dark:text-white" placeholder="Ex: Marco">
                                    </div>
                                </div>
                                <div>
                                    <label class="block mb-1.5 text-sm font-medium text-slate-700 dark:text-slate-300">Município</label>
                                    <input type="text" name="city" class="bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-lg shadow-sm focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-900 dark:border-slate-600 dark:placeholder-slate-400 dark:text-white" placeholder="Belém">
                                </div>

                                {{-- LINHA 3 --}}
                                <div>
                                    <label class="block mb-1.5 text-sm font-medium text-slate-700 dark:text-slate-300">Sexo</label>
                                    <select name="gender" class="bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-lg shadow-sm focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-900 dark:border-slate-600 dark:placeholder-slate-400 dark:text-white">
                                        <option value="">Todos</option>
                                        <option value="M">Masculino</option>
                                        <option value="F">Feminino</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block mb-1.5 text-sm font-medium text-slate-700 dark:text-slate-300">RG</label>
                                    <input type="text" name="rg" class="bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-lg shadow-sm focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-900 dark:border-slate-600 dark:placeholder-slate-400 dark:text-white" placeholder="Digite o RG">
                                </div>
                                
                                {{-- LINHA 4 - AÇÕES (DROPDOWN + BOTÃO DE FILTRO) --}}
                                <div class="col-span-1 md:col-span-2 lg:col-span-2 flex items-end justify-end gap-3 mt-2">
                                    
                                    {{-- DROPDOWN DE EXPORTAÇÃO --}}
                                    <div class="relative">
                                        <button id="dropdownExportButton" data-dropdown-toggle="dropdownExport" class="flex items-center justify-center px-4 py-2.5 text-sm font-medium text-white bg-emerald-600 rounded-lg hover:bg-emerald-700 focus:ring-4 focus:outline-none focus:ring-emerald-200 dark:bg-green-600 dark:hover:bg-emerald-700 dark:focus:ring-emerald-900 transition-colors shadow-sm" type="button">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 011.414.586l5.414 5.414a1 1 0 01.586 1.414V19a2 2 0 01-2 2z"></path></svg>
                                                Exportar
                                            <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                            </svg>
                                        </button>
                                        
                                        <div id="dropdownExport" class="z-50 hidden bg-white divide-y divide-slate-100 rounded-lg shadow-lg w-44 border border-slate-100 dark:border-slate-700 dark:bg-slate-700">
                                            <ul class="py-2 text-sm text-slate-700 dark:text-slate-200" aria-labelledby="dropdownExportButton">
                                                <li>
                                                    <button type="button" onclick="baixarCSV(window.viewData)" class="block w-full px-4 py-2 text-left hover:bg-slate-50 dark:hover:bg-slate-600 dark:hover:text-white">
                                                        CSV
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" onclick="baixarXLSX(window.viewData)" class="block w-full px-4 py-2 text-left hover:bg-slate-50 dark:hover:bg-slate-600 dark:hover:text-white">
                                                        Excel (XLSX)
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" onclick="baixarPDF(window.viewData)" class="block w-full px-4 py-2 text-left hover:bg-slate-50 dark:hover:bg-slate-600 dark:hover:text-white">
                                                        PDF
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <button type="submit" name="action" value="filter" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-gray-500/50 dark:hover:text-white focus:outline-2 focus:outline-offset-2 dark:focus:ring-primary-800 flex items-center gap-2">
                                        Aplicar Filtros
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{-- TABELA --}}
            <div class="relative overflow-x-auto shadow-sm sm:rounded-lg border border-slate-200 dark:border-slate-700 mb-20">
                <table class="w-full text-sm text-left text-slate-500 dark:text-slate-400">
                    <thead class="text-xs text-slate-700 uppercase bg-slate-100 dark:bg-gray-800 dark:text-slate-400">
                        <tr>
                            <th scope="col" class="p-4">
                            </th>
                            <th scope="col" class="px-6 py-3 font-semibold">Nome Completo</th>
                            <th scope="col" class="px-6 py-3 font-semibold">CPF</th>
                            <th scope="col" class="px-6 py-3 font-semibold">WhatsApp</th>
                            <th scope="col" class="px-6 py-3 font-semibold">Zona / Seção</th>
                            <th scope="col" class="px-6 py-3 font-semibold">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b border-slate-200 dark:bg-gray-900 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-700 transition-colors">
                            <td class="w-4 p-4">
                                <div class="flex items-center">
                                    <input id="table-checkbox-eleitor" type="checkbox" value="" class="w-4 h-4 text-indigo-600 bg-white border-slate-300 rounded focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:ring-offset-slate-800 dark:focus:ring-offset-slate-800 focus:ring-2 dark:bg-gray-900 dark:border-slate-600">
                                </div>
                            </td>
                            <th scope="row" class="px-6 py-4 font-medium text-slate-900 whitespace-nowrap dark:text-white">João da Silva</th>
                            <td class="px-6 py-4">123.456.789-00</td>
                            <td class="px-6 py-4">(91) 98888-7777</td>
                            <td class="px-6 py-4">025 / 0101</td>
                            <td class="px-6 py-4 flex gap-3">
                                <button type="button" data-modal-target="editEleitorModal" data-modal-toggle="editEleitorModal" class="font-medium text-indigo-600 dark:text-blue-400 hover:underline hover:text-indigo-800">Editar</button>
                                <button type="button" class="font-medium text-rose-600 dark:text-red-500  hover:underline hover:text-rose-800">Excluir</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                
                {{-- PAGINAÇÃO --}}
                <nav class="flex flex-col md:flex-row items-center justify-between p-4 gap-4 bg-slate-50 border-t border-slate-200 dark:bg-gray-800 dark:border-slate-700" aria-label="Table navigation">
                    <div class="flex flex-col sm:flex-row items-center gap-4 w-full md:w-auto">
                        <span class="text-sm font-normal text-slate-500 dark:text-slate-400 text-center sm:text-left">
                            Mostrando <span class="font-semibold text-slate-900 dark:text-white">1-10</span> de <span class="font-semibold text-slate-900 dark:text-white">1000</span>
                        </span>
                    </div>
                    <ul class="inline-flex -space-x-px rtl:space-x-reverse text-sm h-8">
                        <li>
                            <a href="#" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-slate-500 bg-white border border-slate-300 rounded-s-lg hover:bg-slate-100 hover:text-slate-700 dark:bg-gray-900 dark:border-slate-700 dark:text-slate-400 dark:hover:bg-slate-700 dark:hover:text-white">Anterior</a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-white bg-indigo-600 border border-indigo-600 hover:bg-indigo-700 hover:text-white dark:bg-gray-900 dark:border-slate-700 dark:text-slate-400 dark:hover:bg-slate-700 dark:hover:text-white">1</a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-slate-500 bg-white border border-slate-300 rounded-e-lg hover:bg-slate-100 hover:text-slate-700 dark:bg-gray-900 dark:border-slate-700 dark:text-slate-400 dark:hover:bg-slate-700 dark:hover:text-white">Próximo</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        {{-- MODAL DE EDIÇÃO DE ELEITOR --}}
        <div id="editEleitorModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full backdrop-blur-sm bg-gray-800/50">
            <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                <div class="relative p-4 bg-white rounded-xl shadow-lg dark:bg-gray-800 sm:p-5 border border-slate-200 dark:border-slate-700">
                    <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b border-slate-100 sm:mb-5 dark:border-slate-700">
                        <h3 class="text-lg font-semibold text-slate-900 dark:text-white">
                            Editar Eleitor
                        </h3>
                        <button type="button" class="text-slate-400 bg-transparent hover:bg-slate-100 hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-slate-700 dark:hover:text-white" data-modal-toggle="editEleitorModal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Fechar</span>
                        </button>
                    </div>
                    <form action="#">
                        <div class="grid gap-4 mb-4 sm:grid-cols-2">
                            {{-- Nome --}}
                            <div class="sm:col-span-2">
                                <label for="name" class="block mb-1.5 text-sm font-medium text-slate-700 dark:text-slate-300">Nome Completo</label>
                                <input type="text" name="name" id="name" value="João da Silva" class="bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-lg shadow-sm focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-900 dark:border-slate-600 dark:placeholder-slate-400 dark:text-white" placeholder="Nome do eleitor" required="">
                            </div>
                            
                            {{-- CPF --}}
                            <div>
                                <label for="cpf" class="block mb-1.5 text-sm font-medium text-slate-700 dark:text-slate-300">CPF</label>
                                <input type="text" name="cpf" id="cpf" value="123.456.789-00" class="bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-lg shadow-sm focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-900 dark:border-slate-600 dark:placeholder-slate-400 dark:text-white" placeholder="000.000.000-00">
                            </div>
                            
                            {{-- Data Nascimento --}}
                            <div>
                                <label for="birth_date" class="block mb-1.5 text-sm font-medium text-slate-700 dark:text-slate-300">Data de Nascimento</label>
                                <input type="date" name="birth_date" id="birth_date" class="bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-lg shadow-sm focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-900 dark:border-slate-600 dark:placeholder-slate-400 dark:text-white">
                            </div>

                            {{-- Telefone --}}
                            <div class="sm:col-span-2">
                                <label for="phone" class="block mb-1.5 text-sm font-medium text-slate-700 dark:text-slate-300">WhatsApp / Telefone</label>
                                <input type="tel" name="phone" id="phone" value="(91) 98888-7777" class="bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-lg shadow-sm focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-900 dark:border-slate-600 dark:placeholder-slate-400 dark:text-white" placeholder="(00) 00000-0000">
                            </div>

                            {{-- Zona e Seção --}}
                            <div>
                                <label for="zone" class="block mb-1.5 text-sm font-medium text-slate-700 dark:text-slate-300">Zona Eleitoral</label>
                                <input type="text" name="zone" id="zone" value="025" class="bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-lg shadow-sm focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-900 dark:border-slate-600 dark:placeholder-slate-400 dark:text-white">
                            </div>
                            <div>
                                <label for="section" class="block mb-1.5 text-sm font-medium text-slate-700 dark:text-slate-300">Seção</label>
                                <input type="text" name="section" id="section" value="0101" class="bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-lg shadow-sm focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-900 dark:border-slate-600 dark:placeholder-slate-400 dark:text-white">
                            </div>
                        </div>
                        
                        <div class="flex items-center space-x-3 border-t border-slate-100 dark:border-slate-700 pt-4 mt-4">
                            <button type="submit" class="text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:outline-none focus:ring-indigo-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:focus:ring-indigo-900 shadow-sm transition-colors">
                                Salvar Alterações
                            </button>
                            <button type="button" class="text-rose-600 inline-flex items-center hover:text-white border border-rose-600 hover:bg-rose-600 focus:ring-4 focus:outline-none focus:ring-rose-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-rose-500 dark:text-rose-500 dark:hover:text-white dark:hover:bg-rose-600 dark:focus:ring-rose-900 transition-colors">
                                <svg class="mr-1 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                Excluir
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- SCRIPT PARA GARANTIR FUNCIONAMENTO DO FILTRO E EXPORTAÇÃO --}}
    <script>
        // DADOS FAKE PARA QUE A EXPORTAÇÃO FUNCIONE NA DEMONSTRAÇÃO
        window.viewData = [
            {
                'Nome Completo': 'João da Silva',
                'CPF': '123.456.789-00',
                'WhatsApp': '(91) 98888-7777',
                'Zona': '025',
                'Seção': '0101'
            }
        ];
    </script>
</x-layouts.app>