<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? config('report.name') }}</title>
    <link rel="icon" href="{{ asset('assets/img/belem.png') }}">
    
    {{-- Carrega o Vite (CSS/JS da aplicação) --}}
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    
    @stack('head')
    @stack('styles')

    <style>
        /* --- CSS DO LOADER (Crítico) --- */
        #page-loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999; /* Fica acima de tudo */
            background-color: #f9fafb; /* gray-50 (Light Mode) */
            display: flex;
            justify-content: center;
            align-items: center;
            transition: opacity 0.5s ease, visibility 0.5s ease;
        }

        /* Suporte a Dark Mode no Loader (baseado na classe .dark no html) */
        html.dark #page-loader {
            background-color: #030712; /* gray-950 (Dark Mode) */
        }

        /* --- IMPLEMENTAÇÃO TEMA BLACK --- */
        /* Suporte a Black Mode no Loader (baseado na classe .black no html) */
        html.black #page-loader {
            background-color: #09090b; /* zinc-950 (Black Mode) */
        }

        /* Spinner Animado */
        .loader-spinner {
            width: 48px;
            height: 48px;
            border: 5px solid #cbd5e1; /* slate-300 */
            border-bottom-color: rgb(0, 56, 146); /* Cor Principal */
            border-radius: 50%;
            display: inline-block;
            box-sizing: border-box;
            animation: rotation 1s linear infinite;
        }

        @keyframes rotation {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Classe para esconder o loader */
        .loader-hidden {
            opacity: 0;
            visibility: hidden;
            pointer-events: none; /* Permite clicar no site mesmo se a animação travar */
        }

        /* --- SEU CSS EXISTENTE DO TOGGLE SWITCH --- */
        .ui-switch {
            /* ... mantenha seu CSS do switch aqui ... */
            --switch-bg: rgb(135, 150, 165);
            --switch-width: 32px;
            --switch-height: 14px;
            --circle-diameter: 22px;
            --circle-bg: rgb(0, 56, 146);
            --circle-inset: calc((var(--circle-diameter) - var(--switch-height)) / 2);
            position: relative;
            display: inline-block;
            width: var(--switch-width);
            height: var(--circle-diameter);
        }
        /* ... restante do css do switch ... */
        .ui-switch input { display: none; }
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
            background-repeat: no-repeat;
            background-position: center center;
            transition: left 150ms cubic-bezier(0.4, 0, 0.2, 1) 0ms, transform 150ms cubic-bezier(0.4, 0, 0.2, 1) 0ms;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0px 2px 1px -1px rgba(0, 0, 0, 0.2), 0px 1px 1px 0px rgba(0, 0, 0, 0.14), 0px 1px 3px 0px rgba(0, 0, 0, 0.12);
            z-index: 10;
        }
        .ui-switch input:checked+.slider .circle {
            left: calc(100% - var(--circle-diameter));
        }
    </style>
</head>

<body class="min-h-screen antialiased overflow-hidden"> 
    
    <div id="page-loader">
        <div class="flex flex-col items-center gap-4">
            <span class="loader-spinner"></span>
            {{-- ADICIONADO: black:text-zinc-300 --}}
            <span class="text-sm font-semibold text-slate-700 dark:text-slate-300 black:text-zinc-300 animate-pulse">
                Carregando dados...
            </span>
        </div>
    </div>

    {{-- Conteúdo Principal --}}
    {{-- ADICIONADO: black:bg-zinc-950 black:text-zinc-50 --}}
    <div class="min-h-dvh lg:flex bg-gray-50 text-gray-900 dark:bg-gray-900 dark:text-gray-50 black:bg-zinc-950 black:text-zinc-50">
        @include('components.layouts.report.sidebar')

        <div class="flex-1 min-w-0 flex flex-col">
            @include('components.layouts.report.header')

            <main class="flex-1 min-w-0 p-1">
                {{ $slot ?? '' }}
                @yield('content')
            </main>

            @include('components.layouts.report.footer')
        </div>
    </div>

    @stack('scripts')
    
    <script>
        // --- LÓGICA DO LOADER ---
        window.addEventListener('load', function() {
            const loader = document.getElementById('page-loader');
            const body = document.body;
            loader.classList.add('loader-hidden');
            body.classList.remove('overflow-hidden');
            setTimeout(() => {
                loader.remove();
            }, 500);
        });

        // --- LÓGICA DO TEMA (ATUALIZADA PARA SUPORTAR BLACK) ---
        const themeToggles = document.querySelectorAll('.theme-toggle-input');

        function applyTheme(theme) {
            // Limpa classes anteriores
            document.documentElement.classList.remove('dark', 'black');
            
            // Lógica para Boolean (compatibilidade com toggle antigo) ou String
            let themeName = theme;
            
            // Se vier do Toggle Switch (true/false), converte para dark/light
            if (theme === true) themeName = 'dark';
            if (theme === false) themeName = 'light';

            if (themeName === 'black') {
                document.documentElement.classList.add('black');
                localStorage.setItem('color-theme', 'black');
                // Checkbox pode ficar marcado ou indefinido, dependendo da UX desejada
                themeToggles.forEach(el => el.checked = true); 
            } else if (themeName === 'dark') {
                document.documentElement.classList.add('dark');
                localStorage.setItem('color-theme', 'dark');
                themeToggles.forEach(el => el.checked = true);
            } else {
                // Light
                localStorage.setItem('color-theme', 'light');
                themeToggles.forEach(el => el.checked = false);
            }
        }

        // Inicialização: Verifica localStorage
        const storedTheme = localStorage.getItem('color-theme');
        if (storedTheme) {
            applyTheme(storedTheme);
        } else {
            // Fallback padrão se nada estiver salvo (Light)
            applyTheme('light');
        }

        // Event Listeners dos Toggles existentes (Apenas Light/Dark)
        themeToggles.forEach(toggle => {
            toggle.addEventListener('change', (e) => {
                // Se o usuário usar o switch, alterna entre Dark e Light apenas
                applyTheme(e.target.checked ? 'dark' : 'light');
            });
        });
        
        // Listener para Botões personalizados de tema (caso existam na sidebar)
        const setThemeBtns = document.querySelectorAll('.set-theme-btn');
        setThemeBtns.forEach(btn => {
            btn.addEventListener('click', (e) => {
                const theme = btn.getAttribute('data-theme');
                applyTheme(theme);
            });
        });
    </script>
</body>
</html>