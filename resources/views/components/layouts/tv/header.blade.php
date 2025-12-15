<nav class="relative top-0 z-50 w-full bg-slate-100 dark:bg-slate-900 border-b p-2">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-5xl font-bold text-slate-950 dark:text-slate-100">
                    Dashboard Tv
                </h1>
                <!-- This time is static (when the page loaded/data was fetched) -->
                <span class="text-md text-slate-700 dark:text-slate-300">Última atualização dos dados: {{ date('d/m/Y H:i') }}</span>
            </div>

            <div>
                <h2 class="text-3xl text-slate-950 dark:text-slate-100"><b>Relógio: </b><span id="realtime-clock"></span></h2>
                <!-- This text clarifies that the clock is separate from the data update cycle -->
                <span class="text-md text-slate-700 dark:text-slate-300">Dados atualizados a cada 5 minutos</span>
            </div>
        </div>
    </div>
</nav>
@push('scripts')
    <script>
        // Your JavaScript is perfect and requires no changes.
        document.addEventListener('DOMContentLoaded', (event) => {
            const clockElement = document.getElementById('realtime-clock');

            function updateClock() {
                const now = new Date();
                // Get hours, minutes, seconds and ensure they are always 2 digits
                const hours = String(now.getHours()).padStart(2, '0');
                const minutes = String(now.getMinutes()).padStart(2, '0');
                const seconds = String(now.getSeconds()).padStart(2, '0');

                const currentTimeString = `${hours}:${minutes}:${seconds}`;
                clockElement.textContent = currentTimeString;
            }

            updateClock();
            setInterval(updateClock, 1000);
        });
    </script>
@endpush
