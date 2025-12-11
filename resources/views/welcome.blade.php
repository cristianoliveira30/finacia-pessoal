<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            // Alterado de 'media' para 'class' para aceitar o controle manual
            darkMode: 'class',
        }
    </script>
    <script>
        if (localStorage.getItem('color-theme') === 'light') {
            document.documentElement.classList.remove('dark');
        } else {
            document.documentElement.classList.add('dark');
        }
    </script>
</head>

<body class="min-h-screen flex items-center justify-center p-4 lg:p-6
    bg-gray-50 text-gray-900
    dark:bg-[#0b0b0b] dark:text-white">

    <!-- LADO ESQUERDO: Imagem -->
    <div class="hidden lg:flex w-1/2 items-center justify-end p-12 pr-16 relative">
        <div class="text-center">
            <img src="assets/img/belem.png" alt="logo" class="mx-auto h-72 w-auto object-contain drop-shadow-2xl" />
            
            <h1 class="mt-8 text-4xl font-semibold tracking-tight">Prefeitura Municipal</h1>
            <p class="mt-3 text-lg text-gray-500 dark:text-gray-400">Educação, Saúde e Finanças</p>
        </div>
    </div>

        <form action="{{ route('api.login') }}" method="POST" class="space-y-3">
            <div>
                <label for="login" class="block text-xs font-medium mb-1 text-gray-700 dark:text-gray-300">Login</label>

                <input id="login" name="login" type="text" placeholder="Seu usuário" value="" required
                    class="w-full px-3 py-2 rounded-md border text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500
                    bg-white border-gray-300 text-gray-900 placeholder:text-gray-400
                    dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:placeholder:text-gray-500" />
            </div>

            <form action="#" method="post" class="space-y-5">
                <div>
                    <label for="login" class="block text-sm font-medium mb-2 text-gray-700 dark:text-gray-300">Login</label>
                    
                    <input id="login" name="login" type="text" placeholder="Seu usuário" required
                        class="w-full px-4 py-3 rounded-lg border text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all
                        bg-white border-gray-300 text-gray-900 placeholder:text-gray-400
                        dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:placeholder:text-gray-500" />

                    <button type="button" id="toggle-pass" class="absolute right-2 top-1/2 -translate-y-1/2 transition-colors
                        text-gray-500 hover:text-gray-700
                        dark:text-gray-400 dark:hover:text-gray-200" aria-label="Mostrar senha">
                        <svg id="eye-open" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-4 h-4">
                            <path fill="currentColor" d="M12 5C7 5 2.73 8.11 1 12c1.73 3.89 6 7 11 7s9.27-3.11 11-7c-1.73-3.89-6-7-11-7zm0 12a5 5 0 110-10 5 5 0 010 10z" />
                            <path fill="currentColor" d="M12 9a3 3 0 100 6 3 3 0 000-6z" />
                        </svg>
                    </button>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium mb-2 text-gray-700 dark:text-gray-300">Senha</label>
                    <div class="relative">
                        <input id="password" name="password" type="password" placeholder="Senha" required
                            class="w-full px-4 py-3 rounded-lg border text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all
                            bg-white border-gray-300 text-gray-900 placeholder:text-gray-400
                            dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:placeholder:text-gray-500" />
                        
                        <button type="button" id="toggle-pass" class="absolute right-3 top-1/2 -translate-y-1/2 transition-colors
                            text-gray-500 hover:text-gray-700
                            dark:text-gray-400 dark:hover:text-gray-200" aria-label="Mostrar senha">
                            <svg id="eye-open" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                                <path fill="currentColor" d="M12 5C7 5 2.73 8.11 1 12c1.73 3.89 6 7 11 7s9.27-3.11 11-7c-1.73-3.89-6-7-11-7zm0 12a5 5 0 110-10 5 5 0 010 10z" />
                                <path fill="currentColor" d="M12 9a3 3 0 100 6 3 3 0 000-6z" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- MUDANÇA AQUI: Alterado de justify-end para justify-start (esquerda) -->
                <div class="flex items-center justify-start">
                    <a href="#" class="text-sm font-medium hover:underline transition-colors
                        text-sky-600 hover:text-sky-700
                        dark:text-sky-400 dark:hover:text-sky-300">
                        Esqueceu sua senha?
                    </a>
                </div>

                <button type="submit" class="w-full mt-2 py-3 rounded-lg text-sm font-semibold transition-colors
                    bg-neutral-900 text-white hover:bg-neutral-700
                    dark:bg-white dark:text-black dark:hover:bg-gray-200">
                    Entrar
                </button>
            </form>
        </div>
    </div>

    <script>
        (function() {
            const btn = document.getElementById('toggle-pass');
            const input = document.getElementById('password');
            if (!btn || !input) return;
            let shown = false;
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                shown = !shown;
                input.type = shown ? 'text' : 'password';
                // Lógica de toggle visual mantida e adaptada
                if (shown) {
                    btn.classList.add('text-indigo-600', 'dark:text-white');
                    btn.classList.remove('text-gray-500', 'dark:text-gray-400');
                } else {
                    btn.classList.remove('text-indigo-600', 'dark:text-white');
                    btn.classList.add('text-gray-500', 'dark:text-gray-400');
                }
            });
        })();
    </script>
</body>

</html>
