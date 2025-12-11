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
                    <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                        <tr>
                            <th scope="col" class="p-4">
                            </th>
                            <th scope="col" class="px-6 py-3">Product name</th>
                            <th scope="col" class="px-6 py-3">Color</th>
                            <th scope="col" class="px-6 py-3">Category</th>
                            <th scope="col" class="px-6 py-3">Price</th>
                            <th scope="col" class="px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="w-4 p-4">
                                <div class="flex items-center">
                                    <input id="table-checkbox-eleitor" type="checkbox" value="" class="w-4 h-4 text-primary-600 bg-gray-100 border-gray-300 rounded focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                </div>
                            </td>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">Apple MacBook Pro 17"</th>
                            <td class="px-6 py-4">Silver</td>
                            <td class="px-6 py-4">Laptop</td>
                            <td class="px-6 py-4">$2999</td>
                            <td class="px-6 py-4"><a href="#" class="font-medium text-primary-600 dark:text-primary-500 hover:underline">Edit</a></td>
                        </tr>
                    </tbody>
                </table>
                
                {{-- PAGINAÇÃO --}}
                <nav class="flex items-center flex-column flex-wrap md:flex-row justify-between p-4" aria-label="Table navigation">
                    <span class="text-sm font-normal text-gray-500 dark:text-gray-400 mb-4 md:mb-0 block w-full md:inline md:w-auto">Mostrando <span class="font-semibold text-gray-900 dark:text-white">1-10</span> de <span class="font-semibold text-gray-900 dark:text-white">1000</span></span>
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
    </div>
</x-layouts.app>