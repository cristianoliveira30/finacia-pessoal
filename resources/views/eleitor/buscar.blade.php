<x-layouts.app :title="__('Visualizar Eleitor')">
    <div class="flex flex-col items-center justify-start w-full min-h-screen p-6">

        <div class="w-full max-w-7xl">
            
            <div class="mb-4">
                <h2 class="text-xl font-semibold text-heading">Gerenciar Eleitores</h2>
                <p class="text-sm text-body">Visualize e edite os registros do sistema.</p>
            </div>

            <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default">
                <table class="w-full text-sm text-left rtl:text-right text-body">
                    <thead class="text-sm text-body bg-neutral-secondary-medium border-b border-default-medium">
                        <tr>
                            <th scope="col" class="p-4">
                                <div class="flex items-center">
                                    <input id="table-checkbox-27" type="checkbox" value="" class="w-4 h-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                                    <label for="table-checkbox-27" class="sr-only">Table checkbox</label>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">Product name</th>
                            <th scope="col" class="px-6 py-3">Color</th>
                            <th scope="col" class="px-6 py-3">Category</th>
                            <th scope="col" class="px-6 py-3">Price</th>
                            <th scope="col" class="px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-neutral-primary-soft border-b border-default hover:bg-neutral-secondary-medium">
                            <td class="w-4 p-4">
                                <div class="flex items-center">
                                    <input id="table-checkbox-28" type="checkbox" value="" class="w-4 h-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                                </div>
                            </td>
                            <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">Apple MacBook Pro 17"</th>
                            <td class="px-6 py-4">Silver</td>
                            <td class="px-6 py-4">Laptop</td>
                            <td class="px-6 py-4">$2999</td>
                            <td class="px-6 py-4"><a href="#" class="font-medium text-fg-brand hover:underline">Edit</a></td>
                        </tr>
                        </tbody>
                </table>
                
                <nav class="flex items-center flex-column flex-wrap md:flex-row justify-between p-4" aria-label="Table navigation">
                    <span class="text-sm font-normal text-body mb-4 md:mb-0 block w-full md:inline md:w-auto">Showing <span class="font-semibold text-heading">1-10</span> of <span class="font-semibold text-heading">1000</span></span>
                    <ul class="flex -space-x-px text-sm">
                        <li><a href="#" class="flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading font-medium rounded-s-base text-sm px-3 h-9 focus:outline-none">Previous</a></li>
                        <li><a href="#" class="flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading font-medium text-sm w-9 h-9 focus:outline-none">1</a></li>
                        <li><a href="#" class="flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading font-medium rounded-e-base text-sm px-3 h-9 focus:outline-none">Next</a></li>
                    </ul>
                </nav>
            </div>
            </div>
    </div>
</x-layouts.app>