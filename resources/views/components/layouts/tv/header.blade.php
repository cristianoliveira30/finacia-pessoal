@php
    // Título dinâmico vindo do <x-layouts.tv :title="...">
    $tvTitle = $title ?? $attributes['title'] ?? 'Dashboard TV';
@endphp

<nav class="relative top-0 z-50 w-full bg-slate-100 black:bg-zinc-900 dark:bg-slate-900 border-b p-2">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-4xl font-bold text-slate-950 dark:text-slate-100 black:text-zinc-50">
                    {{ $tvTitle }}
                </h1>
                <span class="text-md text-slate-700 dark:text-slate-300 black:text-zinc-400">
                    Última atualização dos dados: {{ date('d/m/Y H:i') }}
                </span>
            </div>

            <div class="text-right">
                <h2 class="text-3xl text-slate-950 dark:text-slate-100">
                    <b>Relógio: </b><span id="realtime-clock"></span>
                </h2>
                <span class="text-md text-slate-700 black:text-zinc-50 dark:text-slate-300 black:text-zinc-400">
                    Dados atualizados a cada 30 segundos
                </span>
            </div>
        </div>
    </div>
</nav>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const clockElement = document.getElementById('realtime-clock');
            function updateClock() {
                const now = new Date();
                const hours = String(now.getHours()).padStart(2, '0');
                const minutes = String(now.getMinutes()).padStart(2, '0');
                const seconds = String(now.getSeconds()).padStart(2, '0');
                clockElement.textContent = `${hours}:${minutes}:${seconds}`;
            }
            updateClock();
            setInterval(updateClock, 1000);
        });
    </script>
@endpush
