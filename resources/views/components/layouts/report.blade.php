<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? config('report.name') }}</title>
    <link rel="icon" href="{{ asset('assets/img/para.png') }}">
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    @stack('head')
    @stack('styles')
</head>

<body class="min-h-screen antialiased">
    <div class="min-h-dvh lg:flex bg-gray-50 text-gray-900 dark:bg-gray-900 dark:text-gray-50">
        @include('components.layouts.report.sidebar')

        <div class="flex-1 min-w-0 flex flex-col">
            @include('components.layouts.app.header')

            <main class="flex-1 min-w-0">
                {{ $slot ?? '' }}
                @yield('content')
            </main>
            @include('components.layouts.app.footer')
        </div>
    </div>
    @stack('scripts')
    <script>
        // Seleciona todos os inputs do toggle (Mobile e Desktop)
        const themeToggles = document.querySelectorAll('.theme-toggle-input');

        function applyTheme(isDark) {
            if (isDark) {
                // Ativar MODO ESCURO
                document.documentElement.classList.add('dark');
                localStorage.setItem('color-theme', 'dark');
                // Checkbox Marcado (Lua/Azul)
                themeToggles.forEach(el => el.checked = true);
            } else {
                // Ativar MODO CLARO (Branco)
                document.documentElement.classList.remove('dark');
                localStorage.setItem('color-theme', 'light');
                // Checkbox Desmarcado (Sol/Cinza)
                themeToggles.forEach(el => el.checked = false);
            }
        }

        // 1. Inicialização:
        // Se o usuário já escolheu 'light' antes, respeita.
        // Caso contrário (primeira visita ou 'dark'), força o tema ESCURO.
        if (localStorage.getItem('color-theme') === 'light') {
            applyTheme(false);
        } else {
            applyTheme(true); // Padrão Dark
        }

        // 2. Evento de Clique
        themeToggles.forEach(toggle => {
            toggle.addEventListener('change', (e) => {
                // Se marcou -> Dark. Se desmarcou -> Light.
                applyTheme(e.target.checked);
            });
        });
    </script>
</body>

</html>
