<!DOCTYPE html>
<html lang="pt-BR" class="h-full">

<head>
    <meta charset="UTF-8">
    <title>Ops! Algo deu errado</title>
    <script>
        (function () {
            try {
                const stored = localStorage.getItem('color-theme');

                if (
                    stored === 'dark' ||
                    (!stored && window.matchMedia('(prefers-color-scheme: dark)').matches)
                ) {
                    document.documentElement.classList.add('dark');
                } else {
                    document.documentElement.classList.remove('dark');
                }
            } catch (e) { }
        })();
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen h-full flex items-center justify-center px-4
             bg-slate-50 text-slate-900
             dark:bg-slate-950 dark:text-slate-50
             black:bg-zinc-950 black:text-zinc-50
             text-base md:text-lg">

    <div class="max-w-xl w-full
                bg-white/90 dark:bg-slate-900/70 black:bg-zinc-900/70
                border border-slate-200/80 dark:border-slate-700/70 black:border-zinc-800/70
                rounded-2xl shadow-xl p-10 md:p-12 text-center backdrop-blur">

        <div class="inline-flex items-center justify-center
                   w-20 h-20 rounded-full
                   bg-red-100 dark:bg-red-900/30 black:bg-red-900/30
                   border border-red-200 dark:border-red-700 black:border-red-700 mb-6">
            <svg class="w-10 h-10 text-red-500 dark:text-red-400 black:text-red-400" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 9v4m0 4h.01M10.29 4.86 3.82 16a1.8 1.8 0 0 0 1.54 2.7h13.28A1.8 1.8 0 0 0 20.18 16L13.71 4.86a1.8 1.8 0 0 0-3.42 0Z" />
            </svg>
        </div>

        <h1 class="text-3xl md:text-4xl font-semibold mb-4">
            Ops! Algo inesperado aconteceu
        </h1>

        @isset($status)
        <p class="text-sm md:text-base text-slate-500 dark:text-slate-400 black:text-zinc-400 mb-2">
            Código do erro:
            <span class="font-mono font-semibold">{{ $status }}</span>
        </p>
        @endisset

        <p class="text-base md:text-lg text-slate-600 dark:text-slate-300 black:text-zinc-300 mb-10">
            Já registramos esse problema ou ele será analisado pela equipe.
            Você pode tentar voltar para a página anterior.
        </p>

        <button type="button" onclick="window.history.back()" class="inline-flex items-center justify-center gap-3 px-7 py-3.5
                   rounded-2xl text-base md:text-lg font-medium
                   text-white
                   bg-sky-600 hover:bg-sky-500
                   dark:bg-sky-500 dark:hover:bg-sky-400
                   focus:outline-none focus:ring-2 focus:ring-sky-400
                   focus:ring-offset-2 focus:ring-offset-slate-50
                   dark:focus:ring-offset-slate-950
                   black:focus:ring-offset-zinc-950
                   transition
                   btn btn-primary">
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="1.8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
            </svg>
            <span>Voltar</span>
        </button>

    </div>

</body>

</html>