<x-layouts.app :title="__('Dashboard')">
    {{-- Ajustes realizados: --}}
    {{-- 1. sm:ml-16: Ajustado para a largura da sidebar fechada (64px) em vez de aberta (256px/ml-64). --}}
    {{-- 2. min-h-screen e flex/items-center: Para centralizar verticalmente na tela. --}}
    {{-- 3. padding-top mantido para não ficar atrás do header. --}}
    
    <!-- card exemplo -->
    <div class="grid grid-cols-4 gap-3">
        <div class="col p-2">
            <div class="bg-neutral-primary-soft block max-w-sm p-6 border border-default rounded-base shadow-xs">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-heading dark:text-slate-100">Welcome to the Dashboard</h5>
                <p class="font-normal text-body dark:text-slate-300">This is your main dashboard where you can find an overview of your activities and statistics.</p>
            </div>
        </div>
        <div class="col p-2">
            <div class="bg-neutral-primary-soft block max-w-sm p-6 border border-default rounded-base shadow-xs">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-heading dark:text-slate-100">Welcome to the Dashboard</h5>
                <p class="font-normal text-body dark:text-slate-300">This is your main dashboard where you can find an overview of your activities and statistics.</p>
            </div>
        </div>
        <div class="col p-2">
            <div class="bg-neutral-primary-soft block max-w-sm p-6 border border-default rounded-base shadow-xs">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-heading dark:text-slate-100">Welcome to the Dashboard</h5>
                <p class="font-normal text-body dark:text-slate-300">This is your main dashboard where you can find an overview of your activities and statistics.</p>
            </div>
        </div>
        <div class="col p-2">
            <div class="bg-neutral-primary-soft block max-w-sm p-6 border border-default rounded-base shadow-xs">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-heading dark:text-slate-100">Welcome to the Dashboard</h5>
                <p class="font-normal text-body dark:text-slate-300">This is your main dashboard where you can find an overview of your activities and statistics.</p>
            </div>
        </div>
    </div>
</x-layouts.app>