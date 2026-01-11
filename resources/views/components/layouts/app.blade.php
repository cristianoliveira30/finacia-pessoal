<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? config('app.name') }}</title>
    <link rel="icon" href="{{ asset('assets/img/para.png') }}">
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    @stack('head')
    @stack('styles')
    <!-- troca de tema entre claro e escuro -->
    <style>
        /* CSS do Toggle Switch (Uiverse.io) */
        .ui-switch {
            --switch-bg: rgb(135, 150, 165);
            --switch-width: 32px;
            --switch-height: 14px;
            --circle-diameter: 22px;
            --circle-bg: rgb(0, 56, 146);
            --circle-inset: calc((var(--circle-diameter) - var(--switch-height)) / 2);
            position: relative;
            display: inline-block;
            /* Garante que o tamanho do container seja respeitado */
            width: var(--switch-width);
            height: var(--circle-diameter);
        }

        /* Oculta o checkbox nativo */
        .ui-switch input {
            display: none;
        }

        .slider {
            -webkit-appearance: none;
            appearance: none;
            width: var(--switch-width);
            height: var(--switch-height);
            background: var(--switch-bg);
            border-radius: 999px;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            transition: background 0.3s;
        }

        .slider .circle {
            top: calc(var(--circle-inset) * -1);
            left: 0;
            width: var(--circle-diameter);
            height: var(--circle-diameter);
            position: absolute;
            background: var(--circle-bg);
            border-radius: inherit;
            /* Ícone SOL (Light Mode - Unchecked) */
            background-image: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGhlaWdodD0iMjAiIHdpZHRoPSIyMCIgdmlld0JveD0iMCAwIDIwIDIwIj4KICAgIDxwYXRoIGZpbGw9IiNmZmYiCiAgICAgICAgZD0iTTkuMzA1IDEuNjY3VjMuNzVoMS4zODlWMS42NjdoLTEuMzl6bS00LjcwNyAxLjk1bC0uOTgyLjk4Mkw1LjA5IDYuMDcybC45ODItLjk4Mi0xLjQ3My0xLjQ3M3ptMTAuODAyIDBMMTMuOTI3IDUuMDlsLjk4Mi0uOTgyMS40NzMgMS40NzMtLjk4Mi0uOTgyek0xMCA1LjEzOWE0Ljg3MiA0Ljg3MiAwIDAwLTQuODYyIDQuODZBNC44NzIgNC44NzIgMCAwMDEwIDE0Ljg2MiA0Ljg3MiA0Ljg3MiAwIDAwMTQuODYgMTAgNC44NzIgNC44NzIgMCAwMDEwIDUuMTM5em0wIDEuMzg5QTMuNDYyIDMuNDYyIDAgMDExMy40NzEgMTBhMy40NjIgMy40NjIgMCAwMS0zLjQ3MyAzLjQ3MkEzLjQ2MiAzLjQ2MiAwIDAxNi41MjcgMTAgMy40NjIgMy40NjIgMCAwMTEwIDYuNTI4ek0xLjY2NSA5LjMwNXYxLjM5aDIuMDgzdi0xLjM5SDEuNjY2em0xNC41ODMgMHYxLjM5aDIuMDg0di0xLjM5aC0yLjA4NHpNNS4wOSAxMy45MjhMMy42MTYgMTUuNGwuOTgyLjk4MiAxLjQ3My0xLjQ3My0uOTgyLS45ODJ6bTkuODIgMGwtLjk4Mi45ODIgMS40NzMgMS40NzMuOTgyLS45ODItMS40NzMtMS40NzN6TTkuMzA1IDE2LjI1djIuMDgzaDEuMzg5VjE2LjI1aC0xLjM5eiIgLz4KPC9zdmc+");
            background-repeat: no-repeat;
            background-position: center center;
            transition: left 150ms cubic-bezier(0.4, 0, 0.2, 1) 0ms, transform 150ms cubic-bezier(0.4, 0, 0.2, 1) 0ms;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0px 2px 1px -1px rgba(0, 0, 0, 0.2), 0px 1px 1px 0px rgba(0, 0, 0, 0.14), 0px 1px 3px 0px rgba(0, 0, 0, 0.12);
            z-index: 10;
        }

        /* Estado Checked (DARK MODE) */
        .ui-switch input:checked+.slider .circle {
            left: calc(100% - var(--circle-diameter));
            /* Ícone LUA */
            background-image: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGhlaWdodD0iMjAiIHdpZHRoPSIyMCIgdmlld0JveD0iMCAwIDIwIDIwIj4KICAgIDxwYXRoIGZpbGw9IiNmZmYiCiAgICAgICAgZD0iTTQuMiAyLjVsLS43IDEuOC0xLjguNyAxLjguNy43IDEuOC42LTEuOEw2LjcgNWwtMS45LS43LS42LTEuOHptMTUgOC4zYTYuNyA2LjcgMCAxMS02LjYtNi42IDUuOCA1LjggMCAwMDYuNiA2LjZ6IiAvPgo8L3N2Zz4=");
        }
    </style>
</head>

<body class="min-h-screen antialiased sidebar-collapsed">
    <div class="min-h-dvh flex flex-col bg-gray-200 text-gray-900 black:bg-zinc-950 dark:bg-gray-900 dark:text-gray-50">
        {{-- HEADER SEMPRE NO TOPO --}}
        @include('components.layouts.app.header')

        {{-- “Shell” da aplicação: onde o sidebar vai ficar absoluto --}}
        <div id="app-shell" class="relative flex-1 overflow-y-auto pt-16">
            @php
                $sidebarView = match (true) {
                    request()->routeIs('geral.*')
                        => 'components.layouts.app.sidebar', // ou uma sidebar própria do dashboard
                    request()->routeIs('financeiro.*')
                        => 'components.layouts.home.financeiro', // ou uma sidebar própria do dashboard
                    request()->routeIs('educacao.*')
                        => 'components.layouts.home.educacao', // ou uma sidebar própria do dashboard
                    request()->routeIs('saude.*')
                        => 'components.layouts.home.saude', // ou uma sidebar própria do dashboard
                    default => 'components.layouts.app.sidebar',
                };

                // Se você quiser saber "onde estou":
                $currentRouteName = optional(request()->route())->getName(); // ex: dashboard.central
                $currentPath = request()->path(); // ex: dashboard/central
            @endphp

            @include($sidebarView, [
                'currentRouteName' => $currentRouteName,
                'currentPath' => $currentPath,
            ])

            {{-- CONTEÚDO PRINCIPAL --}}
            <main class="min-h-full px-2 sm:px-4 lg:px-6 lg:pl-[1.5rem] transition-[padding-left] duration-300">
                {{ $slot ?? '' }}
                @yield('content')
            </main>

            @include('components.layouts.app.footer')
        </div>
    </div>
    @stack('scripts')
    <script>
        // 1. Função principal de troca de tema
        function applyTheme(theme) {
            const html = document.documentElement;
            
            // Remove classes anteriores para evitar conflitos
            html.classList.remove('dark', 'black');

            // Lógica de aplicação
            if (theme === 'dark') {
                html.classList.add('dark'); // Tema Neon
            } else if (theme === 'black') {
                html.classList.add('black'); // Tema Black
                // Opcional: Se componentes do Flowbite quebrarem no black, descomente a linha abaixo:
                // html.classList.add('dark'); 
            }
            
            // Salva a preferência
            localStorage.setItem('color-theme', theme);
            
            // Atualiza visualmente o texto do botão (opcional, para feedback imediato)
            updateDropdownLabel(theme);
        }

        // Função auxiliar para atualizar o label do botão (se existir)
        function updateDropdownLabel(theme) {
            const label = document.getElementById('current-theme-label');
            if (label) {
                const names = { 'light': 'Claro', 'dark': 'Neon', 'black': 'Escuro' };
                label.textContent = names[theme] || 'Tema';
            }
        }

        // 2. Inicialização ao carregar a página
        const savedTheme = localStorage.getItem('color-theme') || 'light';
        applyTheme(savedTheme);

        // 3. Listener para os botões do Dropdown (Adicionaremos as classes .set-theme-btn no HTML)
        document.addEventListener('click', (e) => {
            const btn = e.target.closest('.set-theme-btn');
            if (btn) {
                const selectedTheme = btn.getAttribute('data-theme');
                applyTheme(selectedTheme);
            }
        });
    </script>
</body>

</html>
