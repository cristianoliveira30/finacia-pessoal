<x-layouts.app :title="__('Envio de Mensagem')">
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Envio de Mensagem</h2>
            <form action="#">
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">

                    <div class="sm:col-span-2">                        
                        <label for="message" class="block mb-2.5 text-sm font-medium text-heading">Mensagem</label>
                        <textarea id="message" rows="4" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full p-3.5 shadow-xs placeholder:text-body" placeholder="Escreva a mensagem aqui..."></textarea>
                    </div>

                <button type="submit"
                    class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-gray-800 bg-primary-700 rounded-lg dark:focus:outline-2 dark:focus:outline-offset-2 dark:focus:ring-primary-900 dark:hover:bg-gray-500/50 dark:text-gray-400 dark:hover:text-white">
                    Enviar
                </button>
            </form>
        </div>
    </section>
</x-layouts.app>
