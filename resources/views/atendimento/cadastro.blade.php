<x-layouts.app :title="__('Cadastro Atendimento')">
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Cadastrar Novo Atendimento</h2>
            <form action="#">
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">

                    <div class="sm:col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome do Atendimento</label>
                        <input type="text" name="name" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Digite o nome completo" required="">
                    </div>

                    <div class="sm:col-span-2">
                        <label 
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descrição</label>
                        <textarea rows="4" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        </textarea>
                    </div>
                </div>

                <button type="submit"
                    class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-gray-800 bg-primary-700 rounded-lg dark:focus:outline-2 dark:focus:outline-offset-2 dark:focus:ring-primary-900 dark:hover:bg-gray-500/50 dark:text-gray-400 dark:hover:text-white">
                    Salvar Atendimento
                </button>
            </form>
        </div>
    </section>
</x-layouts.app>
