<!DOCTYPE html>
<html lang="pt-BR" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ops! Algo deu errado</title>

    {{-- Script de Tema Crítico (Executado antes do render para evitar piscada) --}}
    <script>
        (function () {
            try {
                const stored = localStorage.getItem('color-theme');
                const html = document.documentElement;

                // 1. Limpa todas as classes de tema primeiro para garantir o reset
                html.classList.remove('dark', 'black');

                // 2. Aplica a classe correta baseada no storage
                if (stored === 'black') {
                    html.classList.add('black');
                } else if (stored === 'dark') {
                    html.classList.add('dark');
                } else if (!stored && window.matchMedia('(prefers-color-scheme: dark)').matches) {
                    // Fallback para preferência do sistema se não houver nada salvo
                    html.classList.add('dark');
                }
                // Se for 'light', as classes já foram removidas no passo 1.
            } catch (e) {
                console.error('Erro ao aplicar tema:', e);
            }
        })();
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

{{--
Classes aplicadas diretamente aqui para garantir independência do layout.
O CSS do Tailwind (app.css) precisa estar compilado corretamente com as variantes.
--}}

<body class="min-h-screen h-full flex items-center justify-center px-4
             bg-slate-50 text-slate-900
             dark:bg-slate-950 dark:text-slate-50
             black:bg-zinc-950 black:text-zinc-50
             text-base md:text-lg antialiased">

    <div class="max-w-xl w-full
                bg-white/90 dark:bg-slate-900/70 black:bg-zinc-900/70
                border border-slate-200/80 dark:border-slate-700/70 black:border-zinc-800/70
                rounded-2xl shadow-xl p-10 md:p-12 text-center backdrop-blur-sm">

        {{-- Ícone --}}
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

        {{-- Botão Voltar --}}
        <button type="button" onclick="window.history.back()" class="inline-flex items-center justify-center gap-3 px-7 py-3.5
                   rounded-2xl text-base md:text-lg font-medium
                   text-white
                   bg-sky-600 hover:bg-sky-500
                   dark:bg-sky-500 dark:hover:bg-sky-400
                   focus:outline-none focus:ring-2 focus:ring-sky-400
                   focus:ring-offset-2 focus:ring-offset-slate-50
                   dark:focus:ring-offset-slate-950
                   black:focus:ring-offset-zinc-950
                   transition transform active:scale-95">
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="1.8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
            </svg>
            <span>Voltar</span>
        </button>

    </div>

</body>

</html>