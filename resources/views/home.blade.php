<x-layouts.app :title="__('Dashboard')">
    {{-- Ajustes realizados: --}}
    {{-- 1. sm:ml-16: Ajustado para a largura da sidebar fechada (64px) em vez de aberta (256px/ml-64). --}}
    {{-- 2. min-h-screen e flex/items-center: Para centralizar verticalmente na tela. --}}
    {{-- 3. padding-top mantido para não ficar atrás do header. --}}


    <a href="#" class="bg-neutral-primary-soft block max-w-sm p-6 border border-default rounded-base shadow-xs hover:bg-neutral-secondary-medium">
        <h5 class="mb-3 text-2xl font-semibold tracking-tight text-heading leading-8">Noteworthy technology acquisitions 2021</h5>
        <p class="text-body">Here are the biggest technology acquisitions of 2025 so far, in reverse chronological order.</p>
    </a>


    <div class="p-4 sm:ml-16 pt-20 min-h-screen flex items-center justify-center">
        {{-- Adicionei max-w-4xl para o box não esticar demais em telas largas, ficando mais centralizado visualmente --}}
        <div class="container max-w-4xl mx-auto p-4 border-1 border-default border-dashed rounded-base w-full">
            <div class="grid grid-cols-3 gap-4 mb-4">
                <div class="flex items-center justify-center h-24 rounded-base bg-neutral-secondary-soft">
                    <p class="text-fg-disabled">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/></svg>
                    </p>
                </div>
                <div class="flex items-center justify-center h-24 rounded-base bg-neutral-secondary-soft">
                    <p class="text-fg-disabled">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/></svg>
                    </p>
                </div>
                <div class="flex items-center justify-center h-24 rounded-base bg-neutral-secondary-soft">
                    <p class="text-fg-disabled">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/></svg>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>