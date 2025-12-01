<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
    <div
        class="flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0">
        <main class="flex max-w-[335px] w-full flex-col-reverse lg:max-w-4xl lg:flex-row">

            <form class="max-w-sm mx-auto">
                <div class="mb-5">
                    <figure class="max-w-lg flex flex-col items-center justify-center">
                        <img class="h-auto max-w-[60%] rounded-base" src="{{asset('assets/img/para.png')}}"
                            alt="image description">
                        <figcaption class="mt-2 text-sm text-center text-body">Bem-vindo, por favor faça seu login</figcaption>
                    </figure>
                </div>
                <div class="mb-5">
                    <label for="text" class="block mb-2.5 text-sm font-medium text-blue-400">Login</label>
                    <input type="text" id="text"
                        class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                        placeholder="Login" required />
                </div>
                <div class="mb-5">
                    <label for="password" class="block mb-2.5 text-sm font-medium text-blue-400">Senha</label>
                    <input type="password" id="password"
                        class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                        placeholder="••••••••" required />
                </div>
                <label for="remember" class="flex items-center mb-5">
                    <input id="remember" type="checkbox" value=""
                        class="w-4 h-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft"
                        required />
                    <p class="ms-2 text-sm font-medium text-gray-800 dark:text-gray-400 select-none">Eu concordo com os
                        <a href="#" class="text-blue-400 hover:underline">termos e condições</a>.</p>
                </label>
                <button type="submit"
                    class="text-white w-full bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">Entrar</button>
            </form>
        </main>
    </div>
</body>

</html>
