<x-layouts.app title="Educação - Em construção">
    <div class="p-6">
        <h1 class="text-xl font-semibold">Tela em construção</h1>
        <p class="text-sm text-slate-500 mt-2">Esta rota existe para não quebrar o menu.</p>

        @isset($title)
            <div class="mt-4 text-sm">
                <span class="font-medium">Página:</span> {{ $title }}
            </div>
        @endisset
    </div>
</x-layouts.app>
